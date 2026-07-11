@extends('layouts.frontend')

@section('title', 'Home')

@section('content')

<!-- Hero Banner -->
<section class="container mt-4">

    <div class="row">

        <div class="col-lg-8 mb-3">

            <div class="card border-0 shadow rounded-4 overflow-hidden">

                <img src="{{ asset('assets/images/banner.png') }}"
                     class="img-fluid w-100"
                     alt="Banner">

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card border-0 shadow rounded-4 h-100">

                <div class="card-body d-flex flex-column justify-content-center text-center">

                    <h2 class="fw-bold text-primary">
                        Welcome to Auro Creation
                    </h2>

                    <p class="text-muted mt-3">
                        Premium
                     Gifts & Special Collections.
                    </p>

                    <a href="#"
                       class="btn btn-warning btn-lg mt-3">

                        Shop Now

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Categories -->

<section class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            Shop By Category
        </h3>

        <a href="#" class="text-decoration-none">
            View All →
        </a>

    </div>

    <div class="row g-4">

        <div class="col-6 col-md-4 col-lg-2">

            <div class="card border-0 shadow-sm rounded-4 text-center p-3">

                <img src="{{ asset('assets/images/category/chocolate.png') }}"
                     class="img-fluid mx-auto"
                     style="height:80px">

                <h6 class="mt-3 mb-0">
                    Chocolates
                </h6>

            </div>

        </div>

        <div class="col-6 col-md-4 col-lg-2">

            <div class="card border-0 shadow-sm rounded-4 text-center p-3">

                <img src="{{ asset('assets/images/category/cake.png') }}"
                     class="img-fluid mx-auto"
                     style="height:80px">

                <h6 class="mt-3 mb-0">
                    Cakes
                </h6>

            </div>

        </div>

        <div class="col-6 col-md-4 col-lg-2">

            <div class="card border-0 shadow-sm rounded-4 text-center p-3">

                <img src="{{ asset('assets/images/category/dryfruit.png') }}"
                     class="img-fluid mx-auto"
                     style="height:80px">

                <h6 class="mt-3 mb-0">
                    Dry Fruits
                </h6>

            </div>

        </div>

        <div class="col-6 col-md-4 col-lg-2">

            <div class="card border-0 shadow-sm rounded-4 text-center p-3">

                <img src="{{ asset('assets/images/category/gift.png') }}"
                     class="img-fluid mx-auto"
                     style="height:80px">

                <h6 class="mt-3 mb-0">
                    Gift Packs
                </h6>

            </div>

        </div>

        <div class="col-6 col-md-4 col-lg-2">

            <div class="card border-0 shadow-sm rounded-4 text-center p-3">

                <img src="{{ asset('assets/images/category/sweets.png') }}"
                     class="img-fluid mx-auto"
                     style="height:80px">

                <h6 class="mt-3 mb-0">
                    Sweets
                </h6>

            </div>

        </div>

        <div class="col-6 col-md-4 col-lg-2">

            <div class="card border-0 shadow-sm rounded-4 text-center p-3">

                <img src="{{ asset('assets/images/category/more.png') }}"
                     class="img-fluid mx-auto"
                     style="height:80px">

                <h6 class="mt-3 mb-0">
                    More
                </h6>

            </div>

        </div>

    </div>

</section>

@endsection