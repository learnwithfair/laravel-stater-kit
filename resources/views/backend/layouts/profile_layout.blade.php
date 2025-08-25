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

    <link rel="stylesheet" href="{{ asset('backend/assets/cropper/ijaboCropTool.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/cropper/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('backend.partials._style')

    @livewireStyles
</head>

<body class="crm_body_bg" onload="preloaderFunction()">
    @include('modal._preloader')
    @include('backend.partials._sidenav')

    <section class="main_content dashboard_part large_header_bg">
        @include('backend.partials._topnav')
        <div class="main_content_iner overly_inner">
            @include('backend.partials._script')
            <div class="container-fluid p-0">
                {{ $slot }}
            </div>
        </div>
        @include('backend.partials._footer')
    </section>

    @stack('modals')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/assets/cropper/ijaboCropTool.min.js') }}"></script>
    @livewireScripts

</body>

</html>