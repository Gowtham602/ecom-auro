<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.admin.head')
</head>
<link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
<body>

    <div id="wrapper">

        {{-- Sidebar --}}
        @include('partials.admin.sidebar')

        {{-- Main Content --}}
        <div id="content-wrapper">

            {{-- Navbar --}}
            @include('partials.admin.navbar')

            {{-- Page Content --}}
            <main class="content p-4">

                <div class="container-fluid">

                    {{-- Breadcrumb (Optional) --}}
                    @hasSection('breadcrumb')
                        <div class="row mb-3">
                            <div class="col-12">
                                @yield('breadcrumb')
                            </div>
                        </div>
                    @endif

                    {{-- Main Content --}}
                    @yield('content')

                </div>

            </main>

            {{-- Footer --}}
            @include('partials.admin.footer')

        </div>

    </div>

    {{-- Common JS Files --}}
    @include('partials.admin.scripts')

    {{-- Page Specific Scripts --}}
    @stack('scripts')

</body>

</html>