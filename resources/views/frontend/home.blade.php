@extends('layouts.frontend')

@section('title','Aura Curations')
@push('styles')

<!-- <link rel="stylesheet" href="{{ asset('assets/css/frontend/categrory/categories.css') }}"> -->
<link rel="stylesheet" href="{{ asset('assets/css/frontend/product/products.css') }}">

@endpush
@section('content')

<section class="container mt-0">

    <div class="row">

        <div class="col-lg-8">

            <img src="{{ asset('assets/images/banner.png') }}"
                 class="img-fluid rounded-4">

        </div>

        <div class="col-lg-4">

            <div class="card h-100 shadow">

                <div class="card-body text-center d-flex flex-column justify-content-center">

                    <h2>Welcome to Auro Creation</h2>

                    <p>Premium Gifts & Collections</p>

                    <a href="#" class="btn btn-warning">

                        Shop Now

                    </a>

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