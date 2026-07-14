@extends('layouts.frontend')

@section('content')

<div class="container py-5">

<h3>Shopping Cart</h3>

<table class="table">

<thead>

<tr>

<th>Image</th>

<th>Name</th>

<th>Price</th>

<th>Qty</th>

<th>Total</th>

<th>Action</th>

</tr>

</thead>

<tbody>

@php

$grand=0;

@endphp

@foreach($carts as $cart)

@php

$total=$cart->quantity*$cart->product->price;

$grand+=$total;

@endphp

<tr>

<td>

<img src="{{ asset('uploads/products/'.$cart->product->thumbnail) }}"
width="80">

</td>

<td>

{{ $cart->product->product_name }}

</td>

<td>

₹{{ number_format($cart->product->price) }}

</td>

<td>

<form action="{{ route('cart.update') }}" method="POST">

@csrf

<input type="hidden"
name="cart_id"
value="{{ $cart->id }}">

<input
type="number"
name="quantity"
value="{{ $cart->quantity }}"
min="1">

<button class="btn btn-primary btn-sm">

Update

</button>

</form>

</td>

<td>

₹{{ number_format($total) }}

</td>

<td>

<form action="{{ route('cart.remove',$cart->id) }}"
method="POST">

@csrf

@method('DELETE')

<button
class="btn btn-danger">

Remove

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

<tfoot>

<tr>

<th colspan="4">

Grand Total

</th>

<th>

₹{{ number_format($grand) }}

</th>

<th></th>

</tr>

</tfoot>

</table>

</div>

@endsection