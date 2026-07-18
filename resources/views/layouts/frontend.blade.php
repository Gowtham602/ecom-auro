<!DOCTYPE html>
<html lang="en">

<head>

    @include('partials.frontend.head')
    @stack('styles')
</head>

<body>

    <!-- Top Bar -->
    @include('partials.frontend.topbar')

    <!-- Header -->
    @include('partials.frontend.header')

    <!-- Navigation -->
    @include('partials.frontend.navbar')

    <!-- Main Content -->
    <main class="py-1">

        @yield('content')

    </main>

    <!-- Footer -->
    @include('partials.frontend.footer')

    <!-- Mobile Bottom Navigation -->
    @include('partials.frontend.mobile-bottom')

    <!-- Scripts -->
    @include('partials.frontend.scripts')

    @stack('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {

    const items = document.querySelectorAll(".top-item");

    let index = 0;

    setInterval(function(){

        items[index].classList.remove("active");

        index++;

        if(index >= items.length){
            index = 0;
        }

        items[index].classList.add("active");

    },3000);

});
</script>
</body>

</html>