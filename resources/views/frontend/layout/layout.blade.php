<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('site_title', 'Car Image Editing - Digital Agency')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="@yield('keywords', 'Car Image Edit')" />
    <meta name="title" content="@yield('title', 'Car Image Editing')">
    <meta name="description" content="@yield('description', 'Car Image Editing - Digital Agency')">
    <meta name="author" content="LIMON-RANA">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/odometer-theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('styles')
</head>

<body>
{{--@include('frontend.partials.Loader')--}}
<div id="content">
    <!-- header area start  -->
    <header>
        @include('frontend.partials.top-header')
        @include('frontend.partials.header-navbar')
    </header>
    <!-- header area end -->

    @include('frontend.partials.side-toogle')

    @include('frontend.partials.searchbar')
        @yield('content')

    @include('frontend.partials.footer')
</div>

<!-- JS here -->
<script src="{{ asset('js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/swiper-bundle.js') }}"></script>
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
<script src="{{ asset('js/ajax-form.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('js/odometer.min.js') }}"></script>
<script src="{{ asset('js/appair.min.js') }}"></script>
<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
{{--<script>--}}
{{--    window.addEventListener('load', function () {--}}
{{--        var mainContent = document.getElementById('content');--}}
{{--        var skeletonLoader = document.getElementById('loader');--}}
{{--        skeletonLoader.style.display = "none";--}}
{{--        mainContent.style.display = "block";--}}
{{--    });--}}
{{--</script>--}}
@yield('scripts')
</body>

</html>
