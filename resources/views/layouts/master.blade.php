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
  <!-- Favicon -->
  <link href="{{ uploaded_asset(get_setting('site_icon')) }}" rel="icon">
  <title>@yield('meta_title', get_setting('website_name') . ' | ' . get_setting('site_motto'))</title>
  <meta name="robots" content="index, follow">
  <meta name="description" content="@yield('meta_description', get_setting('meta_description'))" />
  <meta name="keywords" content="@yield('meta_keywords', get_setting('meta_keywords'))">
  @yield('meta')
  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="{{ get_setting('meta_title') . ' | ' . get_setting('site_motto') }}">
  <meta itemprop="description" content="{{ get_setting('meta_description') }}">
  <meta itemprop="image" content="{{ uploaded_asset(get_setting('meta_image')) }}">

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="@publisher_handle">
  <meta name="twitter:title" content="{{ get_setting('meta_title') . ' | ' . get_setting('site_motto') }}">
  <meta name="twitter:description" content="{{ get_setting('meta_description') }}">
  <meta name="twitter:creator" content="@author_handle">
      <meta name="twitter:image" content="{{ uploaded_asset(get_setting('meta_image')) }}">
      <!-- Open Graph data -->
      <meta property="og:title" content="{{ get_setting('meta_title') . ' | ' . get_setting('site_motto') }}" />
      <meta property="og:type" content="website" />
      <meta property="og:url" content="{{ route('home') }}" />
      <meta property="og:image" content="{{ uploaded_asset(get_setting('meta_image')) }}" />
      <meta property="og:description" content="{{ get_setting('meta_description') }}" />
      <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
      <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">

    <!-- -- Start Css -->
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com" /> --}}
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> --}}
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">

    <!-- --- Start Icon -->

    <!-- --- Start Custome Css -->
    {{-- <link rel="preload" as="font" href="{{ asset('assets/font/user/static/Urbanist-Regular.ttf') }}" type="font/ttf" crossorigin="anonymous"> --}}
    {{-- <style>
        @font-face {
          font-family: 'Urbanist';
          src: url('{{ asset("assets/font/user/static/Urbanist-Regular.ttf") }}') format('truetype');
        }

        body {
          font-family: 'Urbanist', sans-serif;
        }
      </style> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/step.css') }}" />
    {{-- arabic css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}" />
    @if (app()->getLocale() == 'sa')
        <link rel="stylesheet" href="{{ asset('assets/css/style-arbic.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/media-arbic.css') }}"> @endif
    <link rel="stylesheet"
        href="{{ asset('assets/css/toastr.min.css') }}">

        <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700&display=swap"
      />

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
        <div class="sidebar">

            <ul class=" mx-1 mb-2 mb-lg-0 @if (app()->getLocale() == 'sa') pe-4 @endif ">
                {{-- <li class="nav-item">
                    <a class="nav-link" aria-current="page"
                        href="@if (Route::currentRouteName() != 'home') {{ route('home') }} @else #sec-cover @endif">{{ __('general.header.about') }}</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link"
                        href="#advantages">{{ __('general.header.advantages') }}</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link"
                        href="#sec-product">{{ __('general.header.discounts') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#faqs">{{ __('general.header.faq') }}</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link @if (Route::currentRouteName() == 'partner.index') activeListNav @endif"
                    href="{{ route('partner.index') }}">{{ __('general.header.partner') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">{{ __('general.header.contacts') }}</a>
                </li>
            </ul>
            <form class="d-flex mx-5">
                <div class="flex-info-header-right">
                    <div class="box-lanag">
                        @if (app()->getLocale() == 'en')
                            <a href="{{ route('change_language', 'sa') }}">{{ __('general.header.arabic') }}</a>
                        @else
                            <a href="{{ route('change_language', 'en') }}">{{ __('general.header.english') }}</a> @endif
                    </div>
                </div>
            </form>
        </div>

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
    <script>
        // احصل على عناصر الروابط في قائمة الـ nav
        const navLinks = document.querySelectorAll('nav a');

        const sideBarLinks = document.querySelectorAll('.sidebar  a');

        // اضف مثيل event listener لكل عنصر
        navLinks.forEach(link => {
            link.addEventListener('click', function(event) {

                // قم بإزالة اللون المحدد من كل الروابط
                navLinks.forEach(link => {
                    link.classList.remove('activeListNav');
                });

                // قم بتعيين اللون المحدد للرابط الذي تم الضغط عليه
                this.classList.add('activeListNav');

                // انتقل إلى القسم المرتبط بالرابط باستخدام الهاش (#)
                const sectionId = this.getAttribute('href').substring(1);
                console.log(sectionId)
                const section = document.getElementById(sectionId);
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });




        sideBarLinks.forEach(link => {
            link.addEventListener('click', function(event) {

                // قم بإزالة اللون المحدد من كل الروابط
                sideBarLinks.forEach(link => {
                    link.classList.remove('activeListNav');
                });

                // قم بتعيين اللون المحدد للرابط الذي تم الضغط عليه
                this.classList.add('activeListNav');

                // انتقل إلى القسم المرتبط بالرابط باستخدام الهاش (#)
                const sectionId = this.getAttribute('href').substring(1);
                const section = document.getElementById(sectionId);
                console.log(sectionId)
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

    </script>
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}"); @endif
    </script>
    @stack('js')


</body>

</html>
