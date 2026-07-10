<!-- ================= HEADER ================= -->
<header class="main-header">

    <div class="container-fluid">

        <div class="row align-items-center">

            <!-- Mobile Menu -->
            <div class="col-2 d-lg-none">

                <button
                    class="btn p-0 border-0 shadow-none"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#mobileMenu">

                    <i class="fas fa-bars text-white fs-3"></i>

                </button>

            </div>

            <!-- Logo -->
            <div class="col-8 col-lg-3">

    <a href="{{ route('home') }}" class="logo">

        <img src="{{ asset('assets/images/logo.png') }}"
             alt="The Aura">

        <div class="logo-text">

            <h5 class="logo-text-main">AURA</h5>

            <span>Curations</span>

        </div>

    </a>

</div>

            <!-- Desktop Search -->
            <div class="col-lg-5 d-none d-lg-block">

                <form action="#" method="GET">

                    <div class="input-group">

                        <input
                            type="text"
                            class="form-control search-box"
                            placeholder="Search Chocolates...">

                        <button
                            class="btn btn-warning"
                            type="submit">

                            <i class="fas fa-search"></i>

                        </button>

                    </div>

                </form>

            </div>

            <!-- Right Side -->
            <div class="col-2 col-lg-4">

                <div class="header-right">

                    <!-- Wishlist -->
                    <a href="#"
                        class="header-icon d-none d-lg-flex">

                        <i class="far fa-heart"></i>

                        <span class="badge-count">0</span>

                    </a>

                    <!-- Cart -->
                    <a href="#"
                        class="header-icon">

                        <i class="fas fa-shopping-cart"></i>

                        <span class="badge-count">0</span>

                    </a>

                    <!-- Desktop Login -->
                    @guest

                        <a href="{{ route('login') }}"
                            class="btn btn-light rounded-pill px-3 d-none d-lg-inline">

                            Login

                        </a>

                    @else

                    <div class="dropdown d-none d-lg-block">

<a href="#"
   class="text-white text-decoration-none dropdown-toggle"
   data-bs-toggle="dropdown"
   aria-expanded="false">

    {{ Auth::user()->name }}

</a>

<ul class="dropdown-menu dropdown-menu-end">

    <li>
        <a class="dropdown-item" href="#">
            <i class="fas fa-user me-2"></i>
            My Profile
        </a>
    </li>

    <li>
        <a class="dropdown-item" href="#">
            <i class="fas fa-shopping-bag me-2"></i>
            My Orders
        </a>
    </li>

    <li><hr class="dropdown-divider"></li>

    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="dropdown-item text-danger">
                <i class="fas fa-right-from-bracket me-2"></i>
                Logout
            </button>
        </form>
    </li>

</ul>

</div>

                    @endguest

                </div>

            </div>

        </div>

    </div>

</header>

<!-- ================= MOBILE SEARCH ================= -->

<div class="mobile-search d-lg-none">

    <div class="container-fluid">

        <form action="#" method="GET">

            <div class="input-group">

                <input
                    type="text"
                    class="form-control search-box"
                    placeholder="Search Products">

                <button
                    class="btn btn-warning"
                    type="submit">

                    <i class="fas fa-search"></i>

                </button>

            </div>

        </form>

    </div>

</div>

<!-- ================= MOBILE SIDEBAR ================= -->

<div
    class="offcanvas offcanvas-start"
    tabindex="-1"
    id="mobileMenu">

    <div class="offcanvas-header">

        <h5 class="mb-0">

            Kodai Choco

        </h5>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="offcanvas">

        </button>

    </div>

    <div class="offcanvas-body">

        <ul class="list-group list-group-flush">

            <a
                href="{{ route('home') }}"
                class="list-group-item">

                <i class="fas fa-house me-2"></i>

                Home

            </a>

            <a
                href="#"
                class="list-group-item">

                <i class="fas fa-layer-group me-2"></i>

                Categories

            </a>

            <a
                href="#"
                class="list-group-item">

                <i class="fas fa-box me-2"></i>

                Products

            </a>

            <a
                href="#"
                class="list-group-item">

                <i class="fas fa-phone me-2"></i>

                Contact Us

            </a>

            @guest

                <a
                    href="{{ route('login') }}"
                    class="list-group-item">

                    <i class="fas fa-right-to-bracket me-2"></i>

                    Login

                </a>

                <a
                    href="{{ route('register') }}"
                    class="list-group-item">

                    <i class="fas fa-user-plus me-2"></i>

                    Register

                </a>

            @else

                <a
                    href="#"
                    class="list-group-item">

                    <i class="fas fa-user me-2"></i>

                    {{ Auth::user()->name }}

                </a>

                <form
                    action="{{ route('logout') }}"
                    method="POST">

                    @csrf

                    <button
                        class="list-group-item w-100 text-start border-0 bg-white">

                        <i class="fas fa-right-from-bracket me-2"></i>

                        Logout

                    </button>

                </form>

            @endguest

        </ul>

    </div>

</div>