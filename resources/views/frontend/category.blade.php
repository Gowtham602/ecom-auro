<section class="container my-5">

    <h3 class="mb-4">

        Shop By Category

    </h3>

    <div class="row">

        @foreach($categories as $category)

        <div class="col-lg-2 col-md-3 col-6 mb-4">

            <a href="{{ route('category.products',$category->slug) }}">

                <div class="category-card text-center">

                    <img src="{{ asset('uploads/category/'.$category->image) }}"
                         class="img-fluid">

                    <h6 class="mt-2">

                        {{ $category->category_name }}

                    </h6>

                </div>

            </a>

        </div>

        @endforeach

    </div>

</section>