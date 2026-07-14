@extends('layouts.frontend')

@section('title',$category->category_name)

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/frontend/product/products.css') }}">
@endpush

@section('content')

<section class="category-header py-5">

    <div class="container text-center">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb justify-content-center">

                <li class="breadcrumb-item">

                    <a href="{{ url('/') }}">Home</a>

                </li>

                <li class="breadcrumb-item active">

                    {{ $category->category_name }}

                </li>

            </ol>

        </nav>

        <h2 class="category-title">

            {{ $category->category_name }}

        </h2>

        @if($category->description)

        <p class="category-description">

            {{ $category->description }}

        </p>

        @endif

    </div>

</section>

<section class="container py-5">

    <div class="row g-4">

        @forelse($products as $product)

        <div class="col-6 col-md-4 col-lg-3">

            <div class="product-card">

                <a href="{{ route('product.details',$product->slug) }}">

                    <div class="product-image">

                        <img src="{{ asset('uploads/products/'.$product->thumbnail) }}"
                             alt="{{ $product->product_name }}">

                    </div>

                </a>

                <div class="product-content">

                    <h6 class="product-title">

                        {{ Str::limit($product->product_name,40) }}

                    </h6>

                    <div class="price">

                        <span class="current-price">

                            ₹{{ number_format($product->price) }}

                        </span>

                    </div>

                    <a href="{{ route('product.details',$product->slug) }}"
                       class="btn-view">

                        Shop Now

                    </a>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12 text-center">

            <h3>No Products Found</h3>

        </div>

        @endforelse

    </div>

</section>

@endsection