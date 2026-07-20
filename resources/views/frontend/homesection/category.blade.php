<section class="category-section py-2">

    <div class="container">

        <div class="section-heading">

            <span>SHOP COLLECTION</span>

            <h2>Shop By Category</h2>

            <p>
                Discover premium jewellery & fashion accessories.
            </p>

        </div>

        <div class="row g-4">

            @foreach($categories as $category)

            <div class="col-6 col-md-4 col-lg-2">

                <a href="{{ route('category.products',$category->slug) }}"
                    class="category-card">

                    <div class="category-image">

                        <img
                            src="{{ asset('uploads/category/'.$category->image) }}"
                            alt="{{ $category->category_name }}"
                            loading="lazy">

                    </div>

                    <div class="category-content">

                        <h6>
                            {{ $category->category_name }}
                        </h6>

                    </div>

                </a>

            </div>

            @endforeach

        </div>

    </div>

</section>
