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


    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}" />
    <style>
        body {
            background-color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .form-control,
        .btn,
        .form-select {
            border-radius: 6px;
        }

        .form-control::placeholder {
            color: #aaa;
        }
    </style>
    @stack('styles')


</head>

<body onload="preloaderFunction()">

    <!-- Preloader Start -->
    @include('backend.layout.modal._preloader')
    <!-- Main Content -->
    @yield('main-content')
    @stack('scripts')

    <!-- Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

    <!-- Custom JS -->
    <script src="assets/js/custom.js"></script>
    <!-- Custom Spinner Start -->
    @include('backend.layout.modal._spinner')

</body>

</html>