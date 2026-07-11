<!-- Sidebar -->
<aside id="sidebar" class="sidebar">

    <!-- Logo -->
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="logo text-decoration-none">
            <i class="fa-solid fa-store me-2"></i>
            <span>Kodai Choco</span>
        </a>
    </div>

    <!-- Menu -->
    <ul class="sidebar-menu">

        <li class="menu-title">MAIN</li>

        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-gauge-high"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="menu-title">PRODUCT</li>

        <li>
            <a href="{{ route('category.index') }}">
                <i class="fa-solid fa-layer-group"></i>
                <span>Categories</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fa-solid fa-box-open"></i>
                <span>Products</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fa-solid fa-image"></i>
                <span>Banners</span>
            </a>
        </li>

        <li class="menu-title">SALES</li>

        <li>
            <a href="#">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>Orders</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fa-solid fa-credit-card"></i>
                <span>Payments</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fa-solid fa-ticket"></i>
                <span>Coupons</span>
            </a>
        </li>

        <li class="menu-title">USERS</li>

        <li>
            <a href="#">
                <i class="fa-solid fa-users"></i>
                <span>Customers</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fa-solid fa-user-shield"></i>
                <span>Admins</span>
            </a>
        </li>

        <li class="menu-title">REPORTS</li>

        <li>
            <a href="#">
                <i class="fa-solid fa-chart-line"></i>
                <span>Sales Report</span>
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fa-solid fa-chart-pie"></i>
                <span>Analytics</span>
            </a>
        </li>

        <li class="menu-title">SETTINGS</li>

        <li>
            <a href="#">
                <i class="fa-solid fa-gear"></i>
                <span>Settings</span>
            </a>
        </li>

        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout-btn">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </button>
            </form>
        </li>

    </ul>

</aside>

<style>

:root{
    --primary:#8B5CF6;
    --primary-dark:#6D28D9;
    --bg:#F5F3FF;
    --white:#ffffff;
    --text:#374151;
    --border:#E5E7EB;
}

body{
    background:var(--bg);
}

.sidebar{

    width:260px;
    height:100vh;

    position:fixed;
    left:0;
    top:0;

    overflow-y:auto;

    background:#fff;

    border-right:1px solid var(--border);

    box-shadow:0 5px 20px rgba(0,0,0,.08);

    z-index:999;
}

.sidebar-header{

    padding:22px;

    background:linear-gradient(135deg,#8B5CF6,#A855F7);

}

.logo{

    color:#fff;

    font-size:24px;

    font-weight:700;
}

.logo:hover{

    color:#fff;
}

.sidebar-menu{

    list-style:none;

    margin:0;

    padding:15px;
}

.menu-title{

    font-size:12px;

    font-weight:700;

    color:#9CA3AF;

    margin-top:18px;

    margin-bottom:10px;

    text-transform:uppercase;
}

.sidebar-menu li{

    margin-bottom:8px;
}

.sidebar-menu li a{

    display:flex;

    align-items:center;

    gap:15px;

    padding:13px 15px;

    color:#374151;

    text-decoration:none;

    border-radius:10px;

    transition:.3s;
}

.sidebar-menu li a:hover{

    background:#8B5CF6;

    color:#fff;
}

.sidebar-menu i{

    width:22px;

    text-align:center;

    font-size:18px;
}

.logout-btn{

    width:100%;

    display:flex;

    align-items:center;

    gap:15px;

    border:none;

    background:#EF4444;

    color:#fff;

    padding:13px 15px;

    border-radius:10px;

    cursor:pointer;
}

.logout-btn:hover{

    background:#DC2626;
}

#content-wrapper{
    margin-left:260px;
    min-height:100vh;
    display:flex;
    flex-direction:column;
}

@media(max-width:991px){

.sidebar{

    left:-260px;

    transition:.3s;
}

.sidebar.active{

    left:0;
}

#content-wrapper{

    margin-left:0;
}

}

</style>