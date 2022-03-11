<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('site_title', 'Car Image Editing - Digital Agency')</title>

    <!-- CSRF Token -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--- SEO META DETAILS -->
    <meta name="title" content="@yield('meta_title', 'Car Image Editing')">
    <meta name ="keywords" content="@yield('meta_keywords', 'car image editing, image editing site')">
    <meta name="description" content="@yield('meta_description', 'Car Image Editing - Digital Agency')">
    <!-- Other Meta Details -->
    <meta name="author" content="@yield('author', 'Car Image Editing')">
    <meta name="copyright" content="@yield('copyright', 'Car Image Editing')">
    <meta name="robots" content="@yield('robots', 'index, follow')">
    <meta name="revisit-after" content="@yield('revisit-after', '1 days')">
    <meta name="language" content="@yield('language', 'English')">
    <meta name="distribution" content="@yield('distribution', 'Global')">
    <meta name="rating" content="@yield('rating', 'General')">

    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:site_name" content="@yield('site_name', 'Car Image Editing')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('meta_title', 'Car Image Editing')">
    <meta property="og:type" content="website">
    <meta property="og:description" content="@yield('meta_description', 'Car Image Editing - Digital Agency')">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('images/logo.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="300">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('meta_title', 'Car Image Editing')">
    <meta name="twitter:description" content="@yield('meta_description', 'Car Image Editing - Digital Agency')">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    <meta name="twitter:image:alt" content="Car Image Editing">

    <script type="application/ld+json" class="web-soft-king-schema">{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": [
                "GraphicDesignOrganization",
                "Organization"
            ],
            "@id": "{{ env('APP_URL') }}/#organization",
            "name": "\u09b2\u09be\u09b0\u09cd\u09a8 \u0989\u0983\u09a4 \u09b8\u09bg\u09b8\u09bf\u09a8 \u09b9\u09be\u09df\u09a6\u09be\u09b0",
            "url": "{{ env('APP_URL') }}",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ env('APP_URL') }}/img/logo/logo.png",
            }
        },
        {
            "@type": "WebSite",
            "@id": "{{ env('APP_URL') }}/#website",
            "url": "{{ env('APP_URL') }}",
            "name": "\u09b2\u09be\u09b0\u09cd\u09a8 \u0989\u0983\u09a4 \u09b8\u09bg\u09b8\u09bf\u09a8 \u09b9\u09be\u09df\u09a6\u09be\u09b0",
            "publisher": {
                "@id": "{{ env('APP_URL') }}/#organization"
            },
            "inLanguage": "en-US",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "{{ env('APP_URL') }}?s={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        },
        {
            "@type": "ImageObject",
            "@id": "{{ env('APP_URL') }}/#primaryImage",
            "url": "{{ env('APP_URL') }}/img/logo/logo.png",
            "width": 200,
            "height": 200
        },
        {
            "@type": "WebPage",
            "@id": "{{ env('APP_URL') }}/#webpage",
            "url": "{{ env('APP_URL') }}/",
            "name": "\u09b9\u09cb\u09ae - \u09b2\u09bd\u09b0\u09cf\u09a6 \u0989\u0987\u09a5 \u09b9\u09be\u09b8\u09bf\u09a8 \u09b9\u09be\u09df\u09a6\u09be\u09b0",
            "datePublished": "2022-02-18T05:13:14+06:00",
            "dateModified": "2022-02-02T05:25:05+06:00",
            "isPartOf": {
                "@id": "{{ env('APP_URL') }}/#website"
            },
            "primaryImageOfPage": {
                "@id": "{{ env('APP_URL') }}/#primaryImage"
            },
            "inLanguage": "en-US"
        }
    ]
}</script>


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

    <!-- Extra CSS here -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- End Extra CSS -->
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

{{--Extra JS Plugin--}}
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('success'))
        toastr.options = {"closeButton" : true, "progressBar" : true};
        toastr.success("{{ session('success') }}");
    @elseif(Session::has('warning'))
        toastr.options = {"closeButton" : true, "progressBar" : true};
        toastr.warning("{{ session('warning') }}");
    @elseif(Session::has('error'))
        toastr.options = {"closeButton" : true, "progressBar" : true};
        toastr.error("{{ session('error') }}");
    @endif

    // Another Error Throw
    @error('email')
        toastr.options = {"closeButton" : true, "progressBar" : true};
        toastr.error("{{ $message }}");
    @enderror
</script>
</script>
@yield('scripts')
</body>

</html>
