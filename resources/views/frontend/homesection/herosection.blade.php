<section class="hero-section">

    <div class="container">

        <div id="heroSlider"
             class="carousel slide carousel-fade"
             data-bs-ride="carousel"
             data-bs-interval="3500">

            <!-- Indicators -->
            <div class="carousel-indicators">

                <button type="button"
                        data-bs-target="#heroSlider"
                        data-bs-slide-to="0"
                        class="active"
                        aria-current="true"></button>

                <button type="button"
                        data-bs-target="#heroSlider"
                        data-bs-slide-to="1"></button>

                <button type="button"
                        data-bs-target="#heroSlider"
                        data-bs-slide-to="2"></button>

            </div>

            <!-- Slides -->
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">

                    <img src="{{ asset('assets/images/banner1.png') }}"
                         class="hero-image"
                         alt="Aura Curations Banner">

                    <div class="hero-overlay">

                        <span class="hero-tag">
                            NEW ARRIVAL
                        </span>

                        <h1>
                            Elegant Women's Accessories
                        </h1>

                        <p>
                            Premium Chains, Jewellery & Fashion Accessories.
                        </p>

                        <a href="" class="btn hero-btn">
                            Shop Now
                        </a>

                    </div>

                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">

                    <img src="{{ asset('assets/images/banner2.png') }}"
                         class="hero-image"
                         alt="Jewellery Collection">

                    <div class="hero-overlay">

                        <span class="hero-tag">
                            EXCLUSIVE
                        </span>

                        <h1>
                            Premium Jewellery Collection
                        </h1>

                        <p>
                            Beautiful collections crafted to complement your style.
                        </p>

                        <a href="#" class="btn hero-btn">
                            Explore
                        </a>

                    </div>

                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">

                    <img src="{{ asset('assets/images/banner3.png') }}"
                         class="hero-image"
                         alt="Fashion Accessories">

                    <div class="hero-overlay">

                        <span class="hero-tag">
                            BEST SELLERS
                        </span>

                        <h1>
                            Trending Fashion Accessories
                        </h1>

                        <p>
                            Discover the latest premium accessories for every occasion.
                        </p>

                        <a href="#" class="btn hero-btn">
                            Shop Collection
                        </a>

                    </div>

                </div>

            </div>

            <!-- Controls -->

            <button class="carousel-control-prev"
                    type="button"
                    data-bs-target="#heroSlider"
                    data-bs-slide="prev">

                <span class="carousel-control-prev-icon"></span>

            </button>

            <button class="carousel-control-next"
                    type="button"
                    data-bs-target="#heroSlider"
                    data-bs-slide="next">

                <span class="carousel-control-next-icon"></span>

            </button>

        </div>

    </div>

</section>