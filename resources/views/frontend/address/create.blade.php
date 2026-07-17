@extends('layouts.frontend')

@section('title','Add Address')

@section('content')

<div class="container py-5">

    <h3 class="mb-4">Add Delivery Address</h3>

    <form action="{{ route('address.store') }}" method="POST">

        @csrf

        @include('frontend.address.form')

        <button class="btn btn-success mt-3">
            Save Address
        </button>

    </form>

</div>

@endsection