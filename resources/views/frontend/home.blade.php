@extends('layouts.frontend')

@section('title','Aura Curations')
@push('styles')

<!-- <link rel="stylesheet" href="{{ asset('assets/css/frontend/categrory/categories.css') }}"> -->
<link rel="stylesheet" href="{{ asset('assets/css/frontend/product/products.css') }}">

@endpush
@section('content')

<!-- ================= HERO SECTION ================= -->

<section class="hero-section py-4">

    <div class="container">

        <div class="row g-4 align-items-stretch">

            <!-- Banner -->

            <div class="col-lg-8">

                <div class="hero-banner">

                    <img src="{{ asset('assets/images/banner.png') }}"
                         alt="Aura Curations"
                         class="img-fluid w-100">

                </div>

            </div>

            <!-- Welcome Card -->

            <div class="col-lg-4">

                <div class="hero-card">

                    <span class="hero-badge">

                        ✨ Premium Collection

                    </span>

                    <h2>

                        Welcome to

                        <span>Aura Curations</span>

                    </h2>

                    <p>

                        Discover premium gifts, handcrafted collections and
                        exclusive products designed for every occasion.

                    </p>

                    <div class="d-grid">

                        <a href="#"
                           class="btn hero-btn">

                            Shop Now

                            <i class="fas fa-arrow-right ms-2"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<section class="category-section py-5">

    <div class="container">

        <div class="section-title text-center mb-5">

            <h2>Shop By Category</h2>

            <p>Discover our beautiful jewellery collections for every occasion.</p>

        </div>

        <div class="row g-4">

            @foreach($categories as $category)

            <div class="col-6 col-md-4 col-lg-2">

                <a href="{{ route('category.products',$category->slug) }}"
                    class="category-card">

                    <div class="category-image">

                        <img
                            src="{{ asset('uploads/category/'.$category->image) }}"
                            alt="{{ $category->category_name }}"
                            loading="lazy">

                    </div>

                    <div class="category-content">

                        <h6>
                            {{ $category->category_name }}
                        </h6>

                    </div>

                </a>

            </div>

            @endforeach

        </div>

    </div>

</section>

@endsection