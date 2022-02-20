@extends('admin.layout.layout')

@section('title', 'Appearance - Car Image Edit')

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
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Appearance</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Customize</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Appearance Customization</h1>
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
                          <span class="h5 mb-0">Appearance Menu</span>

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
                                <a class="nav-link active" href="#headerSection">
                                    <i class="tio-user-outlined nav-icon"></i> Header
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#footerSection">
                                    <i class="tio-online nav-icon"></i> Footer
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#themeSection">
                                    <i class="tio-settings-outlined nav-icon"></i> Theme option
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#socialAccountsSection">
                                    <i class="tio-instagram nav-icon"></i> Social accounts
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
                <div id="headerSection">
                    @include('admin.components.appearance.header-section')
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div id="footerSection">
                    @include('admin.components.appearance.footer-section')
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div id="themeSection">
                    @include('admin.components.appearance.theme-section')
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div id="socialAccountsSection">
                    @include('admin.components.appearance.social-section')
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

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/css/bootstrap-colorpicker.css" />
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/js/bootstrap-colorpicker.min.js"></script>
    <script>
        // INITIALIZATION OF FILE ATTACH
        // =======================================================
        $('.js-file-attach').each(function () {
            var customFile = new HSFileAttach($(this)).init();
        });

        $(function () {
            $('#colorPicker, #colorPicker2, #colorPicker3, #colorPicker4').colorpicker();
        });
    </script>
@endsection
