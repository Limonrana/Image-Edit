@extends('admin.layout.layout')

@section('title', 'Customize AboutPage - Car Image Editing')

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
                                <li class="breadcrumb-item active" aria-current="page">Customize AboutPage</li>
                            </ol>
                        </nav>

                        <h1 class="page-header-title">Customize AboutPage</h1>
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
                                        <i class="tio-online nav-icon"></i> About Us
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#seoMetaSection">
                                        <i class="tio-online nav-icon"></i> SEO Meta Section
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
                        @include('admin.components.page.about.about-section')
                    </div>
                    <!-- End about section -->

                    <!-- Card -->
                    <div id="seoMetaSection">
                        @include('admin.components.page.about.seo-meta-section')
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

@section('script')
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
        });
    </script>
@endsection
