<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SID | {{ $title }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('landing-page/assets/images/favicon.svg') }}"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('landing-page/assets/images/logo/white-logo.png') }}">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('landing-page/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/assets/css/LineIcons.3.0.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/assets/css/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/assets/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('landing-page/dana/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing-page/dana/css/swiper-bundle.min.css') }}">
</head>

<body>


    @include('landing-page.layouts.preloader')

    @include('landing-page.layouts.navbar')

    @yield('content')

    @include('landing-page.layouts.footer')


    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('landing-page/dana/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landing-page/dana/js/script.js') }}"></script>
    <script src="{{ asset('landing-page/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing-page/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('landing-page/assets/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landing-page/assets/js/main.js') }}"></script>
    <script src="{{ asset('landing-page/assets/js/app.js') }}"></script>

</body>

</html>
