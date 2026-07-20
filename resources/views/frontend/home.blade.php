@extends('layouts.frontend')

@section('title','Aura Curations')
@push('styles')

<!-- welcome-modal. -->

<link rel="stylesheet" href="{{ asset('assets/css/frontend/homesection/welcome-modal.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/frontend/product/products.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/frontend/homesection/herosection.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/frontend/homesection/category.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/frontend/homesection/whychoose.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/frontend/homesection/customer-reviews.css') }}">

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
<!-- why chse  -->
@include('frontend.homesection.whychoose');


<!-- customer-reviews -->
@include('frontend.homesection.customer-reviews');



<!-- model showing  -->

@include('frontend.homesection.welcome-modal');

@endsection

@push('scripts')

<script>

document.addEventListener("DOMContentLoaded",function(){

    // if(localStorage.getItem("welcomeShown")){
    //     return;
    // }

    const modalElement=document.getElementById("welcomeModal");

    if(!modalElement) return;

    const modal=new bootstrap.Modal(modalElement,{
        backdrop:'static',
        keyboard:false
    });

    modal.show();
        setTimeout(function () {

        modal.hide();

        // Remember that the user has seen it
        // localStorage.setItem("welcomeShown", "true");

    }, 3000);


    modalElement.addEventListener("hidden.bs.modal",function(){

        localStorage.setItem("welcomeShown","true");

    });

});

</script>

@endpush