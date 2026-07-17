<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
{
    $request->validate([
        'address_id' => 'required|exists:addresses,id'
    ]);

    // Next step:
    // Create pending order
    // Return Razorpay Order ID

}
}
