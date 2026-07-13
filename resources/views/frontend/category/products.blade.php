<!-- Categories -->

<section class="container my-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            Shop By Category
        </h3>

        <a href="#" class="text-decoration-none">
            View All
        </a>

    </div>

    <div class="category-scroll d-flex">

       @foreach($categories as $category)

<a href="{{ route('category.products',$category->slug) }}">

    <div class="category-card">

        <img src="{{ asset('uploads/category/'.$category->image) }}">

        <h5>{{ $category->category_name }}</h5>

    </div>

</a>

@endforeach
    </div>

</section>