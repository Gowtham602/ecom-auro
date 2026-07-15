<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
  
class CartController extends Controller
{
   public function index()
{
    $carts = Cart::with('product.category')
                ->where('user_id', auth()->id())
                ->get();

    $grand = $carts->sum(function ($cart) {
        return $cart->quantity * $cart->product->price;
    });

    return view('frontend.cart.index', compact('carts', 'grand'));
}

  

public function add(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity'   => 'required|integer|min:1',
    ]);

    $cart = Cart::where('user_id', Auth::id())
        ->where('product_id', $request->product_id)
        ->first();

    if ($cart) {

        $cart->quantity += $request->quantity;
        $cart->save();

    } else {

        Cart::create([
            'user_id'    => Auth::id(),
            'product_id' => $request->product_id,
            'quantity'   => $request->quantity,
        ]);

    }

    $items = Cart::where('user_id', Auth::id())->sum('quantity');

    $total = Cart::where('user_id', Auth::id())
        ->join('products', 'products.id', '=', 'carts.product_id')
        ->selectRaw('SUM(carts.quantity * products.price) as total')
        ->value('total');

    return response()->json([
        'status'  => true,
        'message' => 'Product added successfully.',
        'items'   => $items,
        'total'   => $total ?? 0,
    ]);
}
 public function update(Request $request)
{
    $request->validate([
        'cart_id'  => 'required|exists:carts,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $cart = Cart::with('product')
        ->where('id', $request->cart_id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $cart->quantity = $request->quantity;
    $cart->save();

    $itemTotal = $cart->quantity * $cart->product->price;

    $grand = Cart::where('user_id', Auth::id())
        ->join('products', 'products.id', '=', 'carts.product_id')
        ->selectRaw('COALESCE(SUM(carts.quantity * products.price),0) as total')
        ->value('total');

    $count = Cart::where('user_id', Auth::id())->sum('quantity');

    return response()->json([
        'status'    => true,
        'itemTotal' => $itemTotal,
        'grand'     => $grand,
        'count'     => $count,
    ]);
}

public function remove($id)
{
    $cart = Cart::where('id', $id)
        ->where('user_id', Auth::id())
        ->first();

    if (!$cart) {
        return response()->json([
            'status' => false,
            'message' => 'Cart item not found.'
        ], 404);
    }

    $cart->delete();

    $grand = Cart::where('user_id', Auth::id())
        ->join('products', 'products.id', '=', 'carts.product_id')
        ->selectRaw('COALESCE(SUM(carts.quantity * products.price),0) as total')
        ->value('total');

    $count = Cart::where('user_id', Auth::id())->sum('quantity');

    return response()->json([
        'status' => true,
        'grand'  => $grand,
        'count'  => $count
    ]);
}

    public function count()
    {
        return Cart::where('user_id',Auth::id())->sum('quantity');
    }


    public function summary()
{
    $items = Cart::where('user_id', auth()->id())->sum('quantity');

    $total = Cart::where('user_id', auth()->id())
        ->join('products', 'products.id', '=', 'carts.product_id')
        ->selectRaw('SUM(carts.quantity * products.price) as total')
        ->value('total');

    return response()->json([
        'items' => $items,
        'total' => $total ?? 0
    ]);
}

private function cartSummary()
{
    return [
        'grand' => Cart::where('user_id', Auth::id())
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->selectRaw('COALESCE(SUM(carts.quantity * products.price),0) as total')
            ->value('total'),

        'count' => Cart::where('user_id', Auth::id())->sum('quantity')
    ];
}

//guest not login but add to card login and stored in session 
public function storePendingCart(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity'   => 'required|integer|min:1',
    ]);

    session([
        'pending_cart' => [
            'product_id' => $request->product_id,
            'quantity'   => $request->quantity,
            'url'        => $request->url,
        ]
    ]);

    return response()->json([
        'status' => true
    ]);
}

}