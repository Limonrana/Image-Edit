@extends('admin.layout.layout')

@section('title', 'General Settings - Car Image Edit')

@section('content')
    <!-- Content -->
    <div id="body">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-sm mb-2 mb-sm-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter">
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Settings</a></li>
                                <li class="breadcrumb-item active" aria-current="page">General</li>
                            </ol>
                        </nav>

                        <h1 class="page-header-title">General Settings</h1>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Page Header -->

            <div class="row">
                <div class="col-lg-3">
                    <!-- Navbar -->
                    <div class="navbar-vertical navbar-expand-lg mb-3 mb-lg-5">
                        <!-- Navbar Toggle -->
                        <button type="button" class="navbar-toggler btn btn-block btn-white mb-3" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarVerticalNavMenu" data-toggle="collapse" data-target="#navbarVerticalNavMenu">
                        <span class="d-flex justify-content-between align-items-center">
                          <span class="h5 mb-0">Settings Menu</span>

                          <span class="navbar-toggle-default">
                            <i class="tio-menu-hamburger"></i>
                          </span>

                          <span class="navbar-toggle-toggled">
                            <i class="tio-clear"></i>
                          </span>
                        </span>
                        </button>
                        <!-- End Navbar Toggle -->

                        <div id="navbarVerticalNavMenu" class="collapse navbar-collapse">
                            <!-- Navbar Nav -->
                            <ul id="navbarSettings" class="js-sticky-block js-scrollspy navbar-nav navbar-nav-lg nav-tabs card card-navbar-nav"
                                data-hs-sticky-block-options='{
                                   "parentSelector": "#navbarVerticalNavMenu",
                                   "breakpoint": "lg",
                                   "startPoint": "#navbarVerticalNavMenu",
                                   "endPoint": "#stickyBlockEndPoint",
                                   "stickyOffsetTop": 20
                                 }'>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('settings.general') }}">
                                        <i class="tio-user-outlined nav-icon"></i> General Settings
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('settings.email') }}">
                                        <i class="tio-online nav-icon"></i> Email Settings
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('settings.seo') }}">
                                        <i class="tio-settings-outlined nav-icon"></i> SEO Tools
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('settings.payment') }}">
                                        <i class="tio-wallet-outlined nav-icon"></i> Payment Gateway
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('settings.analytics') }}">
                                        <i class="tio-chart-bar-1 nav-icon"></i> Analytics Tools
                                    </a>
                                </li>
                            </ul>
                            <!-- End Navbar Nav -->
                        </div>
                    </div>
                    <!-- End Navbar -->
                </div>

                <div class="col-lg-9">
                    <!-- Card -->
                    <div id="generalSection">
                        @include('admin.components.settings.general')
                    </div>
                    <!-- End Card -->
                    <!-- Sticky Block End Point -->
                    <div id="stickyBlockEndPoint"></div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- End Content -->
@endsection
