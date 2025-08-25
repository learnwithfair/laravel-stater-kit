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

    @include('backend.partials._style')
    @stack('style')
</head>

<body onload="preloaderFunction()" class="crm_body_bg">

    @include('modal._preloader')
    @include('backend.partials._sidenav')
    <section class="main_content dashboard_part large_header_bg">
        @include('backend.partials._topnav')
        <div class="main_content_iner overly_inner">
            <div class="container-fluid p-0">
                @yield('content')
            </div>
        </div>
        @include('backend.partials._footer')
    </section>

    <div id="back-top" style="display: none">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>

    @yield('modal')
    @include('backend.partials._script')
    @yield('script')
    @stack('script')

    @if(session('success'))
    <script>successModal('{{ session("success") }}');</script> @endif
    @if($errors->any())
    <script>errorModal('{!! implode("<br>", $errors->all()) !!}');</script> @endif

</body>

</html>