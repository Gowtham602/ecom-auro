@extends('layouts.frontend')

@section('title',$category->category_name)

@section('content')

<section class="container py-5">

    <h2 class="mb-4">

        {{ $category->category_name }}

    </h2>

    <div class="row">

        @forelse($products as $product)

        <div class="col-lg-3 col-md-4 col-6 mb-4">

            <div class="card h-100">

                <img src="{{ asset('uploads/products/'.$product->thumbnail) }}"
                     class="card-img-top">

                <div class="card-body">

                    <h5>{{ $product->product_name }}</h5>

                    <h6>₹{{ $product->price }}</h6>

                    <a href="{{ route('product.details',$product->slug) }}"
                       class="btn btn-primary">

                        View Details

                    </a>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12 text-center">

            <h3>No Products Found</h3>

        </div>

        @endforelse

    </div>

</section>

@endsection