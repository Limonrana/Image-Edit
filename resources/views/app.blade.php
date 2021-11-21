<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Car image editing') }}</title>
        <!-- Place favicon.ico -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

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

{{--        <link rel="stylesheet" href="{{ mix('css/app.css') }}') }}">--}}

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @inertia
        @env ('local')
            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
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
        @endenv
    </body>
</html>
