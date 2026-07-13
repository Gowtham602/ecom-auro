@extends('layouts.frontend')

@section('title','Home')

@push('styles')

<link rel="stylesheet" href="{{ asset('assets/css/frontend/category/categories.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/frontend/product/products.css') }}">

@endpush

@section('content')

<!-- Hero Banner -->

<section class="container mt-4">

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

@include('frontend.category')

@include('frontend.product')

@endsection

@push('scripts')

<script src="{{ asset('assets/js/frontend/category/categories.js') }}"></script>

<script src="{{ asset('assets/js/frontend/product/products.js') }}"></script>

@endpush