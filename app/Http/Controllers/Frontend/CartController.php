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
        $carts = Cart::with('product')
            ->where('user_id',Auth::id())
            ->get();

        return view('frontend.cart.index',compact('carts'));
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
        'cart_id' => 'required',
        'quantity' => 'required|integer|min:1',
    ]);

    $cart = Cart::where('id', $request->cart_id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $cart->quantity = $request->quantity;
    $cart->save();

    return back();
}

    public function remove($id)
{
    Cart::where('id', $id)
        ->where('user_id', Auth::id())
        ->delete();

    return back();
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