@extends('admin.layout.layout')

@section('title', 'Menu Builder - Car Image Editing')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Menu Builder</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">Menu Builder</h1>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <div class="row justify-content-lg-center">
            <!-- Card -->
            <div class="card mb-3 mb-lg-5" style="width: 100%;">
                <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title">All Menus</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <div class="mb-4">
                        <p>All of the menu available in bellow, you can edit menu from here, you can set the specific menu.</p>
                    </div>

                    <!-- List Group -->
                    <ul class="list-group mb-3">
                        <!-- List Item -->
                        <li class="list-group-item">
                            <h4>Main Menu <span class="badge badge-primary badge-pill text-uppercase ml-1">Primary</span></h4>
                            <div class="media">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm mb-2 mb-sm-0">
                                            <span class="d-block text-dark">TopBar main menu</span>
                                            <small class="d-block text-muted">Note: For update your menu click on edit button.</small>
                                        </div>

                                        <div class="col-sm-auto">
                                            <div class="d-flex justify-content-sm-end">
                                                <a class="btn btn-xs btn-white mr-2" href="{{ route('menus.edit', 'primary-menu') }}">
                                                    <i class="tio-edit mr-1"></i> Edit
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </li>
                        <!-- End List Item -->

                        <!-- List Item -->
                        <li class="list-group-item">
                            <h4>Footer Menu 1 <span class="badge badge-info badge-pill text-uppercase ml-1">Footer</span></h4>
                            <div class="media">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm mb-2 mb-sm-0">
                                            <span class="d-block text-dark">Left side footer menu</span>
                                            <small class="d-block text-muted">Note: For update your menu click on edit button.</small>
                                        </div>

                                        <div class="col-sm-auto">
                                            <div class="d-flex justify-content-sm-end">
                                                <a class="btn btn-xs btn-white mr-2" href="{{ route('menus.edit', 'left-footer') }}">
                                                    <i class="tio-edit mr-1"></i> Edit
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </li>
                        <!-- End List Item -->

                        <!-- List Item -->
                        <li class="list-group-item">
                            <h4>Footer Menu 2 <span class="badge badge-info badge-pill text-uppercase ml-1">Footer</span></h4>
                            <div class="media">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm mb-2 mb-sm-0">
                                            <span class="d-block text-dark">Right side footer menu</span>
                                            <small class="d-block text-muted">Note: For update your menu click on edit button.</small>
                                        </div>

                                        <div class="col-sm-auto">
                                            <div class="d-flex justify-content-sm-end">
                                                <a class="btn btn-xs btn-white mr-2" href="{{ route('menus.edit', 'right-footer') }}">
                                                    <i class="tio-edit mr-1"></i> Edit
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </li>
                        <!-- End List Item -->

                        <!-- List Item -->
                        <li class="list-group-item">
                            <h4>Copy Right Area Menu <span class="badge badge-info badge-pill text-uppercase ml-1">Footer Bottom</span></h4>
                            <div class="media">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-sm mb-2 mb-sm-0">
                                            <span class="d-block text-dark">Copy right area footer bottom menu</span>
                                            <small class="d-block text-muted">Note: For update your menu click on edit button.</small>
                                        </div>

                                        <div class="col-sm-auto">
                                            <div class="d-flex justify-content-sm-end">
                                                <a class="btn btn-xs btn-white mr-2" href="{{ route('menus.edit', 'bottom-footer') }}">
                                                    <i class="tio-edit mr-1"></i> Edit
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Row -->
                                </div>
                            </div>
                        </li>
                        <!-- End List Item -->
                    </ul>
                    <!-- End List Group -->
                    <!-- End Row -->
                </div>
                <!-- End Body -->
            </div>
            <!-- End Card -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->
@endsection
