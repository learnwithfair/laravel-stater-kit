<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('backend.layout._head')
    @stack('style')
</head>

<body onload="preloaderFunction()" class="crm_body_bg">

    <!-- Preloader Start -->
    @include('backend.layout.modal._preloader')
    <!-- Side nav start -->
    @include('backend.layout._sidenav')

    <section class="main_content dashboard_part large_header_bg">
        <!-- Top nav start -->
        @include('backend.layout.topnav')
        <div class="main_content_iner overly_inner">
            <div class="container-fluid p-0">
                @yield('content')
            </div>
        </div>
        @include('backend.layout._footer')
    </section>

    <div id="back-top" style="display: none">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>



    <!-- Modal Start -->
    @yield('modal')

    <!-- Script Start -->
    @include('backend.layout._script')
    @yield('script')
    @stack('script')

    <!-- Custom Spinner Start -->
    @include('backend.layout.modal._spinner')
</body>

</html>
