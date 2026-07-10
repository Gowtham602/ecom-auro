<!-- Top Bar -->
<div class="top-bar d-none d-lg-block">
    <div class="container">

        <div class="row align-items-center">

            <!-- Left -->
            <div class="col-lg-6">

                <div class="top-left">

                    <a href="tel:+919876543210">
                        <i class="fa-solid fa-phone"></i>
                        +91 98765 43210
                    </a>

                    <span class="mx-3 text-white-50">|</span>

                    <a href="mailto:info@kodaichoco.com">
                        <i class="fa-solid fa-envelope"></i>
                        info@kodaichoco.com
                    </a>

                </div>

            </div>

            <!-- Right -->
            <div class="col-lg-6">

                <div class="top-right">

                    <a href="#">
                        <i class="fa-solid fa-truck-fast"></i>
                        Free Shipping Above ₹999
                    </a>

                    @guest

                        <a href="{{ route('login') }}">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            Login
                        </a>

                        <a href="{{ route('register') }}">
                            <i class="fa-solid fa-user-plus"></i>
                            Register
                        </a>

                    @endguest

                    @auth

                        <div class="dropdown d-inline">

                            <a class="dropdown-toggle"
                               href="#"
                               role="button"
                               data-bs-toggle="dropdown">

                                <i class="fa-solid fa-user"></i>

                                {{ Auth::user()->name }}

                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">

                                <li>

                                    <a class="dropdown-item"
                                       href="#">

                                        <i class="fa-solid fa-user me-2"></i>

                                        My Profile

                                    </a>

                                </li>

                                <li>

                                    <a class="dropdown-item"
                                       href="#">

                                        <i class="fa-solid fa-box me-2"></i>

                                        My Orders

                                    </a>

                                </li>

                                <li>

                                    <hr class="dropdown-divider">

                                </li>

                                <li>

                                    <form action="{{ route('logout') }}"
                                          method="POST">

                                        @csrf

                                        <button class="dropdown-item">

                                            <i class="fa-solid fa-right-from-bracket me-2"></i>

                                            Logout

                                        </button>

                                    </form>

                                </li>

                            </ul>

                        </div>

                    @endauth

                </div>

            </div>

        </div>

    </div>
</div>

<style>

.top-bar{

    background:#6D28D9;

    color:#fff;

    font-size:14px;

    padding:10px 0;

}

.top-left,
.top-right{

    display:flex;

    align-items:center;

}

.top-right{

    justify-content:end;

    gap:20px;

}

.top-left{

    gap:20px;

}

.top-bar a{

    color:#fff;

    text-decoration:none;

    transition:.3s;

}

.top-bar a:hover{

    color:#FFD54F;

}

.top-bar i{

    margin-right:6px;

}

.dropdown-menu{

    border:none;

    border-radius:12px;

    box-shadow:0 5px 20px rgba(0,0,0,.15);

}

.dropdown-item{

    padding:10px 15px;

}

.dropdown-item:hover{

    background:#F5F3FF;

    color:#6D28D9;

}

</style>