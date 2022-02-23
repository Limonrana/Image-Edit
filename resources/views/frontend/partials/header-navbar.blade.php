@php
    $logo = null;
    $header_option = null;
    if (appearance('header')) {
        $header_option = json_decode(appearance('header')->option_value, true);
        if (array_key_exists('header_logo', json_decode(appearance('header')->option_value, true))) {
            $logo_id = json_decode(appearance('header')->option_value, true)['header_logo'];
            $upload = \App\Models\Upload::find($logo_id);
            if (isset($upload)) {
                $logo = $upload->path;
            }
        }
    }
@endphp

<div class="header__main header-sticky header-main-1">
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-8">
                <div class="logo">
                    <div class="logo-bg-1">
                        <img src="{{ asset('img/shape/logo-bg-1.png') }}" alt="logo-bg">
                    </div>
                    <a class="logo-text-white" href="{{ route('store.home') }}">
                        <img src="{{ asset($logo ? $logo : 'img/logo/logo.png') }}" alt="logo" width="{{ $header_option ? $header_option['header_logo_width'] : '' }}" height="{{ $header_option ? $header_option['header_logo_height'] : '' }}">
                    </a>
                    <a class="logo-text-black" href="{{ route('store.home') }}">
                        <img src="{{ asset($logo ? $logo : 'img/logo/logo-text-black.png') }}" alt="logo-text-black" width="{{ $header_option ? $header_option['header_logo_width'] : '' }}" height="{{ $header_option ? $header_option['header_logo_height'] : '' }}">
                    </a>
                </div>
            </div>
            <div class="col-xl-10 col-lg-9 col-4">
                <div class="header__menu-area f-right">
                    <div class="menu-bg-1">
                        <img src="{{ asset('img/shape/menu-bg-1.png') }}" alt="menu-bg">
                    </div>
                    <div class="main-menu main-menu-1">
                        <nav id="mobile-menu">
                            <ul>
                                <li><a href="{{ route('store.home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                                <li><a href="{{ route('store.about') }}" class="{{ Request::is('about') ? 'active' : '' }}">About</a></li>
{{--                                <li class="menu-item-has-children"><a href="services.html">Service</a>--}}
{{--                                    <ul class="sub-menu">--}}
{{--                                        <li><a href="services.html">Service</a>--}}
{{--                                        <li><a href="service-details.html">Service Details</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
                                <li><a href="{{ route('store.services') }}" class="{{ Request::is('services*') ? 'active' : '' }}">Service</a></li>
                                <li><a href="{{ route('store.projects') }}" class="{{ Request::is('projects*') ? 'active' : '' }}">Project</a></li>
                                <li><a href="{{ route('store.blogs') }}" class="{{ Request::is('blogs*') ? 'active' : '' }}">Blog</a></li>
                                <li><a href="{{ route('store.contact') }}" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header__search">
                        <a class="search-btn nav-search search-trigger d-none d-sm-inline-block" href="#"><i class="fal fa-search"></i></a>
                        <a class="side-toggle d-lg-none" href="javascript:void(0)"><i class="fal fa-bars"></i></a>
                    </div>
                    @auth('web')
                        <div class="header__btn d-none d-xl-inline-block">
                            <a href="{{ route('user.dashboard') }}" class="grb-btn">DASHBOARD<i class="fas fa-arrow-right"></i></a>
                        </div>
                    @else
                        <div class="header__btn d-none d-xl-inline-block">
                            <a href="{{ route('login') }}" class="grb-btn">LOGIN<i class="fas fa-arrow-right"></i></a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
