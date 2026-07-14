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

                    <img src="{{ asset('uploads/products/'.$product->thumbnail) }}"
                         class="img-fluid"
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

                        <input type="text"
                               value="1"
                               class="qty-input">

                        <button class="qty-btn plus">+</button>

                    </div>

                </div>

                <div class="mt-4 d-grid gap-3">

                    <button class="btn-cart">
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

</section>
<script>
document.querySelector(".plus").onclick = function () {
    let qty = document.querySelector(".qty-input");
    qty.value = parseInt(qty.value) + 1;
};

document.querySelector(".minus").onclick = function () {
    let qty = document.querySelector(".qty-input");
    if (parseInt(qty.value) > 1) {
        qty.value = parseInt(qty.value) - 1;
    }
};
</script>
@endsection