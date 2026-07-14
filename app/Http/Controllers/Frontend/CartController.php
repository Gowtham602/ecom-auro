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
    $cart = Cart::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->first();

    if ($cart) {
        $cart->quantity += $request->quantity;
        $cart->save();
    } else {
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);
    }

    $items = Cart::where('user_id', Auth::id())->sum('quantity');

    $total = Cart::where('user_id', Auth::id())
        ->join('products', 'products.id', '=', 'carts.product_id')
        ->selectRaw('SUM(carts.quantity * products.price) as total')
        ->value('total');

    return response()->json([
        'status' => true,
        'message' => 'Product added successfully',
        'items' => $items,
        'total' => $total ?? 0,
    ]);
}

    public function update(Request $request)
    {
        $cart = Cart::findOrFail($request->cart_id);

        $cart->quantity = $request->quantity;

        $cart->save();

        return back();
    }

    public function remove($id)
    {
        Cart::findOrFail($id)->delete();

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
}