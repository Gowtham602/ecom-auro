@extends('layouts.frontend')

@section('title', 'Shopping Cart')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/frontend/cart/cart.css') }}">
@endpush

@section('content')

<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

        <div class="d-flex align-items-center">

            <div class="cart-icon-box me-3">
                <i class="fas fa-shopping-bag"></i>
            </div>

            <div>
                <h2 class="fw-bold mb-0">Your Bag</h2>
                <small class="text-muted">
                    Review your selected items
                </small>
            </div>

        </div>

        <a href="{{ route('home') }}" class="btn btn-back">
            <i class="fas fa-arrow-left me-2"></i>
            Back to Shop
        </a>

    </div>

    <div class="row">

        {{-- Cart Items --}}
        <div class="col-lg-8">

            @forelse($carts as $cart)

            @php
                $itemTotal = $cart->quantity * $cart->product->price;
            @endphp

            <div class="cart-card mb-4">

                <div class="row align-items-center">

                    {{-- Product Image --}}
                    <div class="col-lg-2 col-md-3 col-4">

                        <img
                            src="{{ asset('uploads/products/'.$cart->product->thumbnail) }}"
                            class="cart-image"
                            alt="{{ $cart->product->product_name }}">

                    </div>

                    {{-- Product Details --}}
                    <div class="col-lg-5 col-md-5 col-8">

                        <h5 class="fw-bold mb-2">

                            {{ $cart->product->product_name }}

                        </h5>

                        <div class="text-muted small mb-2">

                            {{ $cart->product->category->category_name }}

                        </div>

                        <h6 class="price">

                            ₹{{ number_format($cart->product->price) }}

                        </h6>

                    </div>

                    {{-- Quantity --}}
                    <div class="col-lg-3 col-md-4 mt-md-0 mt-3">

                        <div class="qty-box">

                            <button
                                class="qty-btn decreaseQty"
                                data-id="{{ $cart->id }}">
                                -
                            </button>

                           <input
                            type="text"
                            class="qty-input"
                            data-id="{{ $cart->id }}"
                            value="{{ $cart->quantity }}"
                            readonly>

                            <button
                                class="qty-btn increaseQty"
                                data-id="{{ $cart->id }}">
                                +
                            </button>

                        </div>

                    </div>

                    {{-- Total & Delete --}}
                    <div class="col-lg-2 text-lg-end text-start mt-lg-0 mt-3">

                        <h5 class="fw-bold mb-3 item-total">

                            ₹{{ number_format($itemTotal) }}

                        </h5>

                        
                        <button
    class="btn-remove"
    data-url="{{ route('cart.remove',$cart->id) }}"> <i class="fas fa-trash-alt"></i></button>

                    </div>

                </div>

            </div>

            @empty

            <div class="empty-cart text-center">

                <img
                    src="{{ asset('assets/images/empty-cart.png') }}"
                    class="img-fluid mb-4"
                    width="250">

                <h3>Your Cart is Empty</h3>

                <p class="text-muted">

                    Looks like you haven't added anything yet.

                </p>

                <a href="{{ route('home') }}" class="btn btn-warning px-5">

                    Continue Shopping

                </a>

            </div>

            @endforelse

        </div>

        {{-- Price Summary --}}
        <div class="col-lg-4">

            <div class="summary-card">

                <h5 class="summary-title">

                    PRICE DETAILS

                </h5>

                <hr>

                <div class="summary-row">

                    <span>
                        Price
                    </span>

                    <strong id="subTotal">

                        ₹{{ number_format($grand) }}

                    </strong>

                </div>

                <div class="summary-row">

                    <span>
                        Delivery Charges
                    </span>

                    <span class="text-success">

                        FREE

                    </span>

                </div>

                <hr>

                <div class="summary-row total">

                    <span>

                        Total Amount

                    </span>

                    <strong id="grandTotal">

                        ₹{{ number_format($grand) }}

                    </strong>

                </div>

                @if($carts->count())

<a href="{{ route('checkout.index') }}"
    class="btn btn-place-order w-100">

    PLACE ORDER 2

</a>

@endif

                <div class="secure-payment">

                    <i class="fas fa-lock"></i>

                    Safe & Secure Payments

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')
<script>
    const csrfToken = "{{ csrf_token() }}";

    const cartRoutes = {
        update: "{{ route('cart.update') }}",
        remove: "{{ url('/cart/remove') }}",
        summary: "{{ route('cart.summary') }}",
        count: "{{ route('cart.count') }}"
    };
</script>

<script src="{{ asset('assets/js/frontend/cart/cart.js') }}"></script>
@endpush