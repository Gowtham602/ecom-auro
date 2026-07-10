<!-- Navbar -->
<nav class="navbar navbar-expand-lg admin-navbar">

    <div class="container-fluid">

        <!-- Sidebar Toggle -->
        <button class="btn btn-light me-3 d-lg-none" id="sidebarToggle">
            <i class="fa-solid fa-bars"></i>
        </button>

        <!-- Search -->
        <form class="d-none d-md-flex w-50">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>

                <input
                    type="text"
                    class="form-control border-start-0"
                    placeholder="Search products, orders...">
            </div>
        </form>

        <div class="ms-auto d-flex align-items-center">

            <!-- Notification -->
            <div class="dropdown me-3">

                <a href="#"
                    class="nav-icon"
                    data-bs-toggle="dropdown">

                    <i class="fa-regular fa-bell"></i>

                    <span class="badge bg-danger rounded-pill">5</span>

                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow">

                    <li class="dropdown-header">
                        Notifications
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <a class="dropdown-item" href="#">
                            New Order Received
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            Payment Success
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            New Customer Registered
                        </a>
                    </li>

                </ul>

            </div>

            <!-- User -->

            <div class="dropdown">

                <a href="#"
                    class="d-flex align-items-center text-decoration-none"
                    data-bs-toggle="dropdown">

                    <img
                        src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                        class="rounded-circle"
                        width="40"
                        height="40">

                    <div class="ms-2 d-none d-md-block">

                        <h6 class="mb-0">
                            {{ Auth::user()->name }}
                        </h6>

                        <small class="text-muted">
                            Administrator
                        </small>

                    </div>

                    <i class="fa-solid fa-angle-down ms-2"></i>

                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow">

                    <li>
                        <a href="#"
                            class="dropdown-item">

                            <i class="fa-regular fa-user me-2"></i>

                            Profile

                        </a>
                    </li>

                    <li>
                        <a href="#"
                            class="dropdown-item">

                            <i class="fa-solid fa-gear me-2"></i>

                            Settings

                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>

                        <form action="{{ route('logout') }}"
                            method="POST">

                            @csrf

                            <button
                                class="dropdown-item">

                                <i class="fa-solid fa-right-from-bracket me-2"></i>

                                Logout

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</nav>

<style>

.admin-navbar{
    background:#fff;
    min-height:60px;
    padding:8px 20px;
    border-bottom:1px solid #ececec;
    box-shadow:0 2px 8px rgba(0,0,0,.05);
}

.nav-icon{

    position:relative;

    color:#555;

    font-size:22px;

    text-decoration:none;

}

.nav-icon .badge{

    position:absolute;

    top:-5px;

    right:-8px;

    font-size:10px;

}

.input-group{

    max-width:450px;

}

.form-control{

    box-shadow:none;

}

.form-control:focus{

    border-color:#8B5CF6;

    box-shadow:none;

}

.input-group-text{

    border-color:#ced4da;

}

.dropdown-menu{

    border:none;

    border-radius:12px;

}

.dropdown-item{

    padding:10px 18px;

}

.dropdown-item:hover{

    background:#F5F3FF;

    color:#8B5CF6;

}

@media(max-width:991px){

.admin-navbar{

    padding:0px;

}

}

</style>

<script>

document.addEventListener("DOMContentLoaded",function(){

const btn=document.getElementById("sidebarToggle");

const sidebar=document.getElementById("sidebar");

btn.addEventListener("click",function(){

sidebar.classList.toggle("active");

});

});

</script>