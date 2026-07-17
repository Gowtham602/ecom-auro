@extends('layouts.frontend')

@section('title','Order Success')

@section('content')

<div class="container py-5">

    <div class="card shadow rounded-4 border-0 text-center">

        <div class="card-body py-5">

            <h2 class="text-success">
                ✅ Order Placed Successfully
            </h2>

            <p class="mt-3">
                Thank you for shopping with us.
            </p>

            <h5>
                Order No :
                {{ $order->order_no }}
            </h5>

            <a href="{{ url('/') }}" class="btn btn-warning mt-4">
                Continue Shopping
            </a>

        </div>

    </div>

</div>

@endsection