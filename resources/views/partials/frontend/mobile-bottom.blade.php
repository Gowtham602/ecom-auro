<!-- Mobile Bottom Navigation -->

<div class="mobile-bottom-nav d-lg-none">

    <a href="{{ route('home') }}"
       class="{{ request()->routeIs('home') ? 'active' : '' }}">

        <i class="fa-solid fa-house"></i>

        <span>Home</span>

    </a>

    <a href="#"
       class="{{ request()->routeIs('category.*') ? 'active' : '' }}">

        <i class="fa-solid fa-layer-group"></i>

        <span>Category</span>

    </a>

    <a href="#"
       class="position-relative">

        <i class="fa-solid fa-cart-shopping"></i>

        <span>Cart</span>

        <span class="cart-count">0</span>

    </a>

    @guest

        <a href="{{ route('login') }}">

            <i class="fa-solid fa-right-to-bracket"></i>

            <span>Login</span>

        </a>

    @else

        <a href="#">

            <i class="fa-solid fa-user"></i>

            <span>Profile</span>

        </a>

    @endguest

</div>

<style>

.mobile-bottom-nav{

    position:fixed;

    bottom:0;

    left:0;

    width:100%;

    height:70px;

    background:#ffffff;

    display:flex;

    justify-content:space-around;

    align-items:center;

    border-top:1px solid #E5E7EB;

    box-shadow:0 -5px 15px rgba(0,0,0,.08);

    z-index:1050;

}

.mobile-bottom-nav a{

    flex:1;

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:center;

    color:#6B7280;

    text-decoration:none;

    font-size:12px;

    transition:.3s;

    position:relative;

}

.mobile-bottom-nav a i{

    font-size:22px;

    margin-bottom:4px;

}

.mobile-bottom-nav a.active{

    color:#7C3AED;

}

.mobile-bottom-nav a:hover{

    color:#7C3AED;

}

.cart-count{

    position:absolute;

    top:4px;

    right:28%;

    background:#EF4444;

    color:#fff;

    width:18px;

    height:18px;

    border-radius:50%;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:10px;

    font-weight:bold;

}

body{

    padding-bottom:75px;

}

</style>