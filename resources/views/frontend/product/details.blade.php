@extends('layouts.frontend')

@section('title', $product->product_name)

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/frontend/product/details.css') }}">
@endpush

@section('content')

    <section class="product-details py-5">

        <div class="container">
            <!-- Breadcrumb -->
            <div class="row mb-">

                <div class="col-12">

                    <nav aria-label="breadcrumb">

                        <ol class="breadcrumb custom-breadcrumb">

                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">
                                    <i class="fas fa-home me-1"></i> Home
                                </a>
                            </li>

                            <li class="breadcrumb-item">
                                <a href="{{ route('category.products', $product->category->slug) }}">
                                    {{ $product->category->category_name }}
                                </a>
                            </li>

                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $product->product_name }}
                            </li>

                        </ol>

                    </nav>

                </div>

            </div>
            <div class="row g-5">

                <!-- Product Image -->
                <div class="col-lg-6">

                    <div class="product-image-card">

                        <img src="{{ asset('uploads/products/' . $product->thumbnail) }}" class="img-fluid"
                            alt="{{ $product->product_name }}">

                    </div>

                </div>

                <!-- Product Info -->
                <div class="col-lg-6">

                    <span class="product-category">
                        {{ $product->category->category_name }}
                    </span>

                    <h2 class="product-title mt-2">
                        {{ $product->product_name }}
                    </h2>

                    <div class="price-box">

                        <span class="price">
                            ₹{{ number_format($product->price) }}
                        </span>

                    </div>

                    <p class="product-description">
                        {{ $product->description }}
                    </p>

                    <div class="quantity-box">

                        <label class="fw-semibold mb-2">
                            Quantity
                        </label>

                        <div class="qty-control">

                            <button class="qty-btn minus">−</button>

                            <input type="text" value="1" class="qty-input">

                            <button class="qty-btn plus">+</button>

                        </div>

                    </div>

                    <div class="mt-4 d-grid gap-3">

                        <button class="btn-cart addToCart" data-id="{{ $product->id }}">
                            🛒 Add to Cart
                        </button>

                        <button class="btn-buy">
                            ⚡ Buy Now
                        </button>

                    </div>

                    <hr>

                    <div class="product-meta">

                        <p><strong>Category :</strong> {{ $product->category->category_name }}</p>

                        <p><strong>Availability :</strong>
                            <span class="text-success">
                                In Stock
                            </span>
                        </p>

                    </div>

                </div>

            </div>

        </div>
        <div id="floatingCart" class="floating-cart">
            <div>
                <p>View Cart</p>
                <small>
                    <span id="cartItems">0</span> item(s) • ₹<span id="cartTotal">0</span>
                </small>
            </div>

            <a href="{{ route('cart.index') }}" class="btn">
                Open 
            </a>
        </div>

    </section>

@endsection
@push('scripts')

    <script>
        const csrfToken = "{{ csrf_token() }}";
        const cartAddUrl = "{{ route('cart.add') }}";
        const cartCountUrl = "{{ route('cart.count') }}";
        const cartSummaryUrl = "{{ route('cart.summary') }}";
        const loginUrl = "{{ route('login') }}";

        const storePendingCartUrl = "{{ route('cart.store.pending') }}";
        const isAuthenticated = @json(auth()->check());
    </script>

    <script src="{{ asset('assets/js/frontend/product/details.js') }}"></script>

@endpush