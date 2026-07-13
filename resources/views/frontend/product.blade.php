<section class="container my-5">

    <h3 class="mb-4">

        Latest Products

    </h3>

    <div class="row">

        @foreach($products as $product)

        <div class="col-lg-3 col-md-4 col-6 mb-4">

            <div class="card h-100">

                <img src="{{ asset('uploads/products/'.$product->thumbnail) }}"
                     class="card-img-top">

                <div class="card-body">

                    <h6>

                        {{ $product->product_name }}

                    </h6>

                    <h5>

                        ₹{{ $product->price }}

                    </h5>

                    <a href="{{ route('product.details',$product->slug) }}"
                       class="btn btn-primary w-100">

                        View Details

                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</section>