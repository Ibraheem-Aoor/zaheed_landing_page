<!DOCTYPE html>
@php
    $lang = app()->getLocale() == 'sa' ? 'ar' : 'en';
@endphp
<html lang="{{ $lang }}" dir="@if (app()->getLocale() == 'sa') ltr @else rtl @endif">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- -- Start Css -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Amiri:ital@1&family=Cairo:wght@200;300&family=Changa:wght@200;300&family=Lato:wght@300&family=Libre+Franklin:wght@300&family=Lobster&family=Noto+Sans&family=Poppins:wght@200;300&family=Prompt:wght@300&family=Raleway:wght@200&family=Roboto+Slab:wght@200&family=Roboto:wght@100&family=Scheherazade+New&family=Tajawal:wght@200;300;700&family=Yanone+Kaffeesatz&display=swap"
        rel="stylesheet" />
    <!-- --- Start Icon -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- --- Start Custome Css -->

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/step.css') }}" />
    {{-- arabic css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}" />
    @if (app()->getLocale() == 'sa')
        <link rel="stylesheet" href="{{ asset('assets/css/style-arbic.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/media-arbic.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">

    @stack('css')
</head>

<body>
    {{-- Loader --}}
    <div id="preloader" class="preloader">
        <div class="loader"></div>
    </div>
    <!-- --- Start HomePage -->
    <div id="HomePage">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </div>
    <!-- --- End HomePage -->

    <!-- --Start Script Js -->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('js')
</body>

</html>
