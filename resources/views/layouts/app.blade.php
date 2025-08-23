<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
       <meta charset="utf-8">
    <meta name="description" content="EdenProse">
    <meta name="keywords" content="EdenProse, eden prose">
    <meta name="author" content="Rahatul Rabbi, Rahatul, Rabbi, Rahatul-Rabbi, Rahatul_Rabbi, MD RAHATUL RABBI">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset($systemSetting->favicon ?? 'backend/assets/images/logo-minimize.svg') }}">
    <title>{{ $systemSetting->system_name  }}@yield('title')</title>
    <!-- Fonts -->

    <link rel="stylesheet" href="{{ asset('backend/assets/admin/ijaboCropTool.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/admin/style.css') }}">
    <!-- Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->

    @include('backend.layout._style')
    {{-- <style>
        .header-sticky {
            display: none;
        }
    </style> --}}
    @livewireStyles
</head>

<body class="crm_body_bg" onload="preloaderFunction()">

    <!-- Preloader Start -->
    @include('backend.layout.modal._preloader')
    <!-- Side nav start -->
    @include('backend.layout._sidenav')

    <section class="main_content dashboard_part large_header_bg">
        <!-- Top nav start -->
        @include('backend.layout.topnav')
        <div class="main_content_iner overly_inner">
            <!-- Script Start -->
            @include('backend.layout._script')
            <div class="container-fluid p-0">
                {{ $slot }}
            </div>
        </div>
        @include('backend.layout._footer')
    </section>

    <div id="back-top" style="display: none">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>

    @stack('modals')



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/assets/admin/ijaboCropTool.min.js') }}"></script>
    @livewireScripts

</body>

</html>
