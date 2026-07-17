@extends('layouts.frontend')

@section('title','Order Success')

@section('content')

<div class="container py-5">

    <div class="card shadow border-0 rounded-4 text-center">

        <div class="card-body py-5">

            <i class="fas fa-check-circle text-success fa-5x mb-4"></i>

            <h2>Order Placed Successfully</h2>

            <p class="text-muted">

                Thank you for your purchase.

            </p>

            <h5>

                Order No :
                {{ $order->order_no }}

            </h5>

            <a href="{{ route('orders.index') }}"
               class="btn btn-warning mt-4">

                My Orders

            </a>

        </div>

    </div>

</div>

@endsection