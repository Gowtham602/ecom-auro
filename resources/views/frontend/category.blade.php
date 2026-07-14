<section class="category-header py-5">

    <div class="container">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-2">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    {{ $categories->category_name }}
                </li>
            </ol>
        </nav>

        <!-- Title -->
        <h2 class="category-title">
            {{ $categories->category_name }}
        </h2>

        <!-- Description -->
        @if($categories->description)
            <div class="category-description">
                {{ $categories->description }}
            </div>
        @endif

    </div>

</section>