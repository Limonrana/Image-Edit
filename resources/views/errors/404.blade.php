@extends('frontend.layout.layout')

@section('site_title', '404 Not Found - Car Image Editing | Digital Agency')

@section('content')
    <main>
        <!-- page title area start  -->
        <section class="page-title-area" data-background="{{ asset('img/bg/page-title-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title-content text-center">
                            <div class="page-title-heading">
                                <h1>404 Page</h1>
                            </div>
                            <nav class="grb-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('store.home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">404 Page</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->
        <!-- 404 area start  -->
        <section class="area-404 pt-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="content-404 text-center mb-30">
                            <h2>404</h2>
                            <h4>Sorry We Couldn't Find That Page</h4>
                            <p class="mb-30">The Page you are looking for was moved, removed, renamed or never existed.</p>
                            <div class="go-home">
                                <a href="{{ route('store.home') }}" class="grb-border-btn st-1">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 404 area end -->
    </main>
@endsection
