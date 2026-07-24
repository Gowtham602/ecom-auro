<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Razorpay\Api\Errors\SignatureVerificationError;
class OrderController extends Controller
{

    public function index()
    {
    $orders = Order::where('user_id', auth()->id())
                    ->latest()
                    ->paginate(10);

    return view('frontend.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
    if ($order->user_id != auth()->id()) {
        abort(403);
    }

    $order->load('items.product');

    return view('frontend.orders.show', compact('order'));
    }


    public function placeOrder(Request $request)
    {
        $request->validate([
            'address_id' => 'required|exists:addresses,id',
        ]);

        // Address should belong to logged in user
        $address = Address::where('id', $request->address_id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$address) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid delivery address.'
            ], 422);
        }

        // Get user's cart
        $carts = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($carts->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Your cart is empty.'
            ], 422);
        }

        // Calculate total from DB
        $subtotal = 0;

        foreach ($carts as $cart) {

            if (!$cart->product) {
                continue;
            }

            $subtotal += $cart->product->price * $cart->quantity;
        }

        // Create Pending Order
        $order = Order::create([

            'user_id' => Auth::id(),

            'order_no' => 'ORD' . now()->format('YmdHis'),

            'subtotal' => $subtotal,

            'delivery_charge' => 0,

            'total' => $subtotal,

            'payment_method' => 'Razorpay',

            'payment_status' => 'pending',

            'order_status' => 'pending',

            'address' =>
                $address->house_no . ', ' .
                $address->street . ', ' .
                $address->area . ', ' .
                $address->city . ', ' .
                $address->state . ' - ' .
                $address->pincode,

            'phone' => $address->phone,

        ]);

        // Razorpay API
        $api = new Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );

        // Create Razorpay Order
        $razorpayOrder = $api->order->create([

            'receipt' => $order->order_no,

            'amount' => $subtotal * 100,

            'currency' => 'INR'

        ]);

        // Save Razorpay Order ID
        $order->update([
            'razorpay_order_id' => $razorpayOrder['id']
        ]);

        // Return JSON
        return response()->json([

            'status' => true,

            'message' => 'Order created successfully.',

            'order_id' => $order->id,

            'razorpay_order_id' => $razorpayOrder['id'],

            'amount' => $subtotal * 100,

            'currency' => 'INR',

            'key' => config('services.razorpay.key'),

            'name' => Auth::user()->name,

            'email' => Auth::user()->email,

            'contact' => $address->phone,

        ]);
    }

    public function verifyPayment(Request $request)
{
    $request->validate([
        'order_id'             => 'required|exists:orders,id',
        'razorpay_order_id'    => 'required',
        'razorpay_payment_id'  => 'required',
        'razorpay_signature'   => 'required',
    ]);

    $order = Order::where('id', $request->order_id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    
    if ($order->payment_status === 'paid') {
        return response()->json([
            'status' => true,
            'redirect' => route('orders.success', $order)
        ]);
    }

    $api = new Api(
        config('services.razorpay.key'),
        config('services.razorpay.secret')
    );

    try {

        $api->utility->verifyPaymentSignature([
            'razorpay_order_id'   => $request->razorpay_order_id,
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature'  => $request->razorpay_signature,
        ]);

    } catch (SignatureVerificationError $e) {

        $order->update([
        'payment_status' => 'failed',
        'order_status'   => 'pending'
    ]);
        return response()->json([
            'status' => false,
            'message' => 'Payment verification failed.'
        ], 400);

    }

    DB::transaction(function () use ($order, $request) {

        $order->update([
            'payment_status'       => 'paid',
            'order_status'         => 'processing',
             'razorpay_order_id' => $request->razorpay_order_id,
            'razorpay_payment_id'  => $request->razorpay_payment_id,
            'razorpay_signature'   => $request->razorpay_signature,
        ]);

        $carts = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        foreach ($carts as $cart) {

            OrderItem::create([

                'order_id'   => $order->id,

                'product_id' => $cart->product_id,

                'quantity'   => $cart->quantity,

                'price'      => $cart->product->price,

                'total'      => $cart->quantity * $cart->product->price,

            ]);

            // Optional:
            // Reduce product stock here
        }

        Cart::where('user_id', auth()->id())->delete();

    });

    // return response()->json([
    //     'status'   => true,
    //     'redirect' => route('orders.success', $order->id),
    // ]);
    if ($order->payment_status === 'paid') {
    return response()->json([
        'status' => true,
        'redirect' => route('orders.success', $order)
    ]);
}
}

public function webhook(Request $request)
{
    $payload = $request->getContent();

    $signature = $request->header('X-Razorpay-Signature');

    $secret = config('services.razorpay.webhook_secret');

    $api = new Api(
        config('services.razorpay.key'),
        config('services.razorpay.secret')
    );

    try {

        $api->utility->verifyWebhookSignature(
            $payload,
            $signature,
            $secret
        );

    } catch (\Exception $e) {

        return response()->json([
            'status' => false
        ], 400);

    }

    $data = json_decode($payload, true);

    if ($data['event'] == 'payment.captured') {

        $payment = $data['payload']['payment']['entity'];

        $order = Order::where(
            'razorpay_order_id',
            $payment['order_id']
        )->first();

        if ($order && $order->payment_status != 'paid') {

            DB::transaction(function () use ($order, $payment) {

                $order->update([

                    'payment_status' => 'paid',

                    'order_status' => 'processing',

                    'razorpay_payment_id' => $payment['id'],

                ]);

                $carts = Cart::with('product')
                    ->where('user_id', $order->user_id)
                    ->get();

                foreach ($carts as $cart) {

                    OrderItem::create([

                        'order_id' => $order->id,

                        'product_id' => $cart->product_id,

                        'quantity' => $cart->quantity,

                        'price' => $cart->product->price,

                        'total' => $cart->quantity * $cart->product->price,

                    ]);

                }

                Cart::where('user_id', $order->user_id)->delete();

            });

        }

    }

    return response()->json([
        'status' => true
    ]);
}

public function success(Order $order)
{
    abort_unless($order->user_id == auth()->id(), 403);

    return view('frontend.orders.success', compact('order'));
}


}