<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

    <!-- Auth CSS -->
    <link rel="stylesheet"
        href="{{ asset('assets/css/frontend/auth/auth.css') }}">

    @stack('styles')

</head>

<body>

<div class="auth-wrapper">

    <div class="container">

        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-lg-10">

                <div class="auth-card">

                    <div class="row g-0">

                        <!-- Left Side -->
                        <div class="col-lg-6 d-none d-lg-flex">

                            <div class="auth-left">

                                <img src="{{ asset('assets/images/logo.png') }}"
                                    class="logo mb-4"
                                    alt="Logo">

                                <h2>Welcome Back</h2>

                                <p>

                                    Fresh Products from Kodaikanal.

                                    Fast Delivery.

                                    Secure Shopping.

                                </p>

                                <img src="{{ asset('assets/images/auth-shopping.png') }}"
                                    class="img-fluid auth-image"
                                    alt="Shopping">

                            </div>

                        </div>

                        <!-- Right Side -->

                        <div class="col-lg-6">

                            <div class="auth-right">

                                @yield('content')

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

@stack('scripts')

</body>

</html>