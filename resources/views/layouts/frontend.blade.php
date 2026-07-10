<!DOCTYPE html>
<html lang="en">

<head>

    @include('partials.frontend.head')

</head>

<body>

    <!-- Top Bar -->
    @include('partials.frontend.topbar')

    <!-- Header -->
    @include('partials.frontend.header')

    <!-- Navigation -->
    @include('partials.frontend.navbar')

    <!-- Main Content -->
    <main class="py-4">

        @yield('content')

    </main>

    <!-- Footer -->
    @include('partials.frontend.footer')

    <!-- Mobile Bottom Navigation -->
    @include('partials.frontend.mobile-bottom')

    <!-- Scripts -->
    @include('partials.frontend.scripts')

    @stack('scripts')

</body>

</html>