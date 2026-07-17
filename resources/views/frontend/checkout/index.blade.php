@extends('layouts.frontend')

@section('title', 'Checkout')

@push('styles')
<style>
    @media (max-width: 991px) {

        body {
            padding-bottom: 75px;
        }

        .container-fluid {
            padding-left: 10px !important;
            padding-right: 10px !important;
        }

        .card {
            border-radius: 12px;
        }

        .order-summary,
        .sticky-top {
            position: static !important;
            top: auto !important;
        }

        .card-header{
            flex-direction: column;
            align-items: flex-start !important;
            gap: 10px;
        }

        .card-header .btn{
            width: 100%;
        }

        .form-check-label h6{
            font-size: 15px;
        }

        .form-check-label p{
            font-size: 13px;
        }
    }
</style>
@endpush

@section('content')

<div class="container-fluid px-2 px-md-3 py-3">

    <!-- Checkout Steps -->
    @include('frontend.partials.checkout-steps')

    <div class="row g-3 mt-2">

        <div class="col-12 col-lg-8">

            @include('frontend.partials.address-card')

            @include('frontend.partials.payment')

        </div>

        <div class="col-12 col-lg-4">

            @include('frontend.partials.order-summary')

        </div>

    </div>

</div>

@include('frontend.address.modal')

@endsection

@push('scripts')


<!-- //razorpay -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    window.appConfig = {
    placeOrderUrl: "{{ route('place.order') }}",
    verifyPaymentUrl: "{{ route('verify.payment') }}",
    csrfToken: "{{ csrf_token() }}",
    appName: "{{ config('app.name') }}"
};
</script>

<script src="{{ asset('assets/js/frontend/address/address.js') }}"></script>
<script src="{{ asset('assets/js/frontend/checkout/checkout.js') }}"></script>

@endpush