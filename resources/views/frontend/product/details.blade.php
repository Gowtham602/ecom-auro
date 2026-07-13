@extends('layouts.frontend')

@section('title',$product->product_name)

@section('content')

<div class="container py-5">

    <div class="row">

        <div class="col-lg-6">

            <img src="{{ asset('uploads/products/'.$product->thumbnail) }}"
                 class="img-fluid rounded">

        </div>

        <div class="col-lg-6">

            <h2>{{ $product->product_name }}</h2>

            <h3 class="text-success">

                ₹{{ $product->price }}

            </h3>

            <p>

                {{ $product->description }}

            </p>

            <button class="btn btn-primary">

                Add To Cart

            </button>

        </div>

    </div>

</div>

@endsection