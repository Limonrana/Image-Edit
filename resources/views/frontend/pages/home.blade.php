@extends('frontend.layout.layout')

@section('site_title', 'Car Image Editing | Digital Agency')
@section('meta_title', array_key_exists('meta_title', $seo_meta) ? $seo_meta['meta_title'] : null)
@section('meta_keywords', array_key_exists('meta_keywords', $seo_meta) ? implode(',', json_decode($seo_meta['meta_keywords'])) : null)
@section('meta_description', array_key_exists('meta_description', $seo_meta) ?  $seo_meta['meta_description'] : null)

@section('content')
    <main>
        <!-- hero area start here -->
        @include('frontend.components.home.home-slider')
        <!-- hero area end here -->
        <!-- brand area start  -->
        @include('frontend.components.common.brand-area')
        <!-- brand area end -->
        <!-- about area start  -->
        @include('frontend.components.home.home-about')
        <!-- about area end -->
        <!-- service area start  -->
        @include('frontend.components.home.home-service')
        <!-- service area end -->
        <!-- choosing area start  -->
        @include('frontend.components.home.home-choosing')
        <!-- choosing area end  -->
        <!-- counter area start  -->
        @include('frontend.components.home.home-counter')
        <!-- counter area end -->
        <!-- testimonial area start  -->
        @include('frontend.components.home.home-testimonial')
        <!-- testimonial area end -->
        <!-- portfolio area start -->
        @include('frontend.components.home.home-portfolio')
        <!-- portfolio area end -->
        <!-- team area start  -->
{{--        @include('frontend.components.home.home-team')--}}
        <!-- team area end  -->
        <!-- blog area start  -->
        @include('frontend.components.home.home-blog')
        <!-- blog area end -->
    </main>
@endsection
