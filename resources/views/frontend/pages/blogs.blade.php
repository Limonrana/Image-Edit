@extends('frontend.layout.layout')

@section('site_title', 'Our Blogs - Car Image Editing | Digital Agency')

@section('content')
    <main>
        <!-- page title area start  -->
        @include('frontend.components.blogs.breadcrumb')
        <!-- page title area end -->
        <!-- blog area start  -->
        <div class="blog-main-area pt-150">
            <div class="container">
                <div class="row wow fadeInUp">
                    @include('frontend.components.blogs.blogs-area')
                    @include('frontend.components.blogs.sidebar')
                </div>
            </div>
        </div>
        <!-- blog area end  -->
        <!-- brand area start  -->
        @include('frontend.components.blogs.brand-area')
        <!-- brand area end -->
    </main>
@endsection
