<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // public function index()
    // {
    //     $carts = Cart::with('product')
    //         ->where('user_id', Auth::id())
    //         ->get();

    //     if ($carts->count() == 0) {
    //         return redirect()->route('cart.index')
    //             ->with('error', 'Your cart is empty.');
    //     }

    //     $grand = 0;

    //     foreach ($carts as $cart) {
    //         $grand += $cart->product->price * $cart->quantity;
    //     }

    //     return view('frontend.checkout.index', compact(
    //         'carts',
    //         'grand'
    //     ));
    // }

    public function index()
{
    $carts = Cart::with('product')
        ->where('user_id', auth()->id())
        ->get();

    if ($carts->isEmpty()) {
        return redirect()->route('cart.index');
    }

    $addresses = Address::where('user_id', auth()->id())
        ->orderByDesc('is_default')
        ->latest()
        ->get();

    $subtotal = $carts->sum(function ($cart) {
        return $cart->quantity * $cart->product->price;
    });

    return view('frontend.checkout.index', compact(
        'carts',
        'addresses',
        'subtotal'
    ));
}
}