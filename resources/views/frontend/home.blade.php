@extends('layouts.frontend')

@section('title','Aura Curations')
@push('styles')

<!-- <link rel="stylesheet" href="{{ asset('assets/css/frontend/categrory/categories.css') }}"> -->
<link rel="stylesheet" href="{{ asset('assets/css/frontend/product/products.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/frontend/homesection/herosection.css') }}">

@endpush
@section('content')



<!-- Your homepage can be structured like this:
Hero Slider
Shop by Category
New Arrivals
Best Sellers
Featured Collection
Why Choose Aura Curations
Customer Reviews
Instagram Gallery
Newsletter
Footer -->




<!-- ================= HERO SECTION ================= -->

@include('frontend.homesection.herosection')

<!-- //category product  -->
@include('frontend.homesection.category');

@endsection