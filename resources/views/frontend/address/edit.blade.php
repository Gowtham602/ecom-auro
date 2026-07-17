@extends('layouts.frontend')

@section('title','Edit Address')

@section('content')

<div class="container py-5">

    <h3 class="mb-4">Edit Address</h3>

    <form action="{{ route('address.update',$address->id) }}" method="POST">

        @csrf
        @method('PUT')

        @include('frontend.address.form')

        <button class="btn btn-primary mt-3">
            Update Address
        </button>

    </form>

</div>

@endsection