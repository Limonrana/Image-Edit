@extends('admin.layout.layout')

@section('title', 'Common Pages - Car Image Editing')

@section('content')
    <!-- Content -->
    <div class="content container-fluid">
        <div class="row justify-content-lg-center pt-lg-5 pt-xl-10">
            <div class="col-lg-9 col-xl-8">
                <!-- Title -->
                <div class="text-center mb-7">
                    <h1 class="display-4">Layouts</h1>
                    <p>Customize your overview page layout. Choose the one that best fits your needs.</p>
                </div>
                <!-- End Title -->

                <span class="divider font-weight-bold">Demo layouts</span>

                <div class="row my-5 mb-lg-7">
                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="demo-layouts-default-classic.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/demo-layouts-default-classic.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Default <span>(Classic)</span></h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>
                </div>
                <!-- End Row -->

                <span class="divider font-weight-bold">Header</span>

                <div class="row my-5 mb-lg-7">
                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="header-default-fluid.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/header-default-fluid.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Default <span class="text-body">(Fluid)</span></h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="header-default-container.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/header-default-container.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Default <span class="text-body">(Container)</span></h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="header-double-line-fluid.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/header-double-line-fluid.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Double line <span class="text-body">(Fluid)</span></h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="header-double-line-container.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/header-double-line-container.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Double line <span class="text-body">(Container)</span></h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>
                </div>
                <!-- End Row -->

                <span class="divider font-weight-bold">Sidebar</span>

                <div class="row my-5 mb-lg-7">
                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="sidebar-default-classic.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/sidebar-default-classic.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Default <span class="text-body">(Classic)</span></h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="sidebar-compact.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/sidebar-compact.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Compact</h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="sidebar-mini.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/sidebar-mini.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Mini</h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>
                </div>
                <!-- End Row -->

                <span class="divider font-weight-bold">Sidebar Combinations</span>

                <div class="row my-5 mb-lg-7">
                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="sidebar-combinations-mini-plus-one-cols.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/sidebar-combinations-mini-plus-one-cols.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Mini + one columns</h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="sidebar-combinations-two-cols.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/sidebar-combinations-two-cols.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Two columns</h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="sidebar-combinations-two-plus-mini-cols.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/sidebar-combinations-two-plus-mini-cols.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Two + mini columns</h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="sidebar-combinations-two-cols-between.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/sidebar-combinations-two-cols-between.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Two columns between</h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>
                </div>
                <!-- End Row -->

                <span class="divider font-weight-bold">Sidebar Detached</span>

                <div class="row my-5 mb-lg-7">
                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="sidebar-detached-fluid.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/sidebar-detached-fluid.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Fluid</h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="sidebar-detached-container.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/sidebar-detached-container.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Container</h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="sidebar-detached-overlay-fluid.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/sidebar-detached-overlay-fluid.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Overlay <span class="text-body">(Fluid)</span></h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="sidebar-detached-overlay-container.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/sidebar-detached-overlay-container.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Overlay <span class="text-body">(Container)</span></h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>
                </div>
                <!-- End Row -->

                <span class="divider font-weight-bold">Content Combinations</span>

                <div class="row my-5 mb-lg-7">
                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="content-combinations-content-centered.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/content-combinations-content-centered.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Medium content centered</h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="content-combinations-overlay.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/content-combinations-overlay.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Overlay</h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>

                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-5">
                        <!-- Card -->
                        <a class="card" href="content-combinations-container-overlay.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/content-combinations-container-overlay.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Container Overlay</h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>
                </div>
                <!-- End Row -->

                <span class="divider font-weight-bold">Footer</span>

                <div class="row mt-5">
                    <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                        <!-- Card -->
                        <a class="card" href="footer-default-fluid.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/footer-default-fluid.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Default <span class="text-body">(Fluid)</span></h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <!-- Card -->
                        <a class="card" href="footer-default-container.html">
                            <img class="card-img-top" src="{{ asset('assets/svg/layouts/footer-default-container.svg') }}" alt="Image Description">
                            <div class="card-body text-center">
                                <h5 class="card-title">Default <span class="text-body">(Container)</span></h5>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->
@endsection
