<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Car image editing') }}</title>
        <!-- Place favicon.ico -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

        <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom-app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
        <!-- Scripts -->
        @routes
{{--        <script src="{{ mix('js/manifest.js') }}" defer></script>--}}
{{--        <script src="{{ mix('js/vendor.js') }}" defer></script>--}}
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="">
        @inertia
{{--        @env ('local')--}}
{{--            <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>--}}
{{--        @endenv--}}
        <aside id="modalWidget"></aside>
    </body>
</html>
