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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @include('backend.partials._style')
    <style>
        label,
        p {
            color: white;
        }
    </style>
</head>

<body onload="preloaderFunction()" style="overflow-x: hidden; background-color: #4285F4;">
    @include('modal._preloader')
    <div class="font-sans text-gray-900 antialiased vh-100">
        {{ $slot }}
    </div>

    @livewireScripts
    @include('backend.partials._script')
</body>

</html>