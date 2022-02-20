@extends('admin.layout.layout')

@section('title', 'Customize HomePage - Car Image Editing')

@section('content')
    <div id="body">
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-sm mb-2 mb-sm-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter">
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('pages.index') }}">Pages</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Customize HomePage</li>
                            </ol>
                        </nav>

                        <h1 class="page-header-title">Customize HomePage</h1>
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
                              <span class="h5 mb-0">Nav menu</span>

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
                                    <a class="nav-link active" href="#aboutSection">
                                        <i class="tio-user-outlined nav-icon"></i> About Company
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#serviceSection">
                                        <i class="tio-online nav-icon"></i> Our Best Service
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#chooseUsSection">
                                        <i class="tio-fingerprint nav-icon"></i> Why Choose Us
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#achievementSection">
                                        <i class="tio-devices-apple nav-icon"></i> Our Achievement
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#othersSection">
                                        <i class="tio-lock-outlined nav-icon"></i> Others Section
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#seoMetaSection">
                                        <i class="tio-instagram nav-icon"></i> SEO Meta Section
                                    </a>
                                </li>
                            </ul>
                            <!-- End Navbar Nav -->
                        </div>
                    </div>
                    <!-- End Navbar -->
                </div>

                <div class="col-lg-9">
                    <!-- About section -->
                    <div id="aboutSection">
                        @include('admin.components.page.home.about-section')
                    </div>
                    <!-- End about section -->

                    <!-- Card -->
                    <div id="serviceSection">
                        @include('admin.components.page.home.services-section')
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div id="chooseUsSection">
                        @include('admin.components.page.home.choose-us-section')
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div id="achievementSection">
                        @include('admin.components.page.home.achievement-section')
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div id="othersSection">
                        @include('admin.components.page.home.others-section')
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div id="seoMetaSection">
                        @include('admin.components.page.home.seo-meta-section')
                    </div>
                    <!-- End Card -->

                    <!-- Sticky Block End Point -->
                    <div id="stickyBlockEndPoint"></div>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Content -->
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/css/bootstrap-colorpicker.css" />
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $(document).on('ready', function () {
            // INITIALIZATION OF FILE ATTACH
            // =======================================================
            $('.js-file-attach').each(function () {
                var customFile = new HSFileAttach($(this)).init();
            });

            // INITIALIZATION OF HS-ADD-FIELD
            // =======================================================
            $('.js-add-field').each(function () {
                new HSAddField($(this)).init();
            });

            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });

            $(function () {
                $('#colorPicker, #colorPicker2, #colorPicker3, #colorPicker4').colorpicker();
            });
        });
    </script>
@endsection
