@extends('frontend.layout.layout')

@section('site_title', 'Our Projects - Car Image Editing | Digital Agency')
@section('meta_title', array_key_exists('meta_title', $seo_meta) ? $seo_meta['meta_title'] : null)
@section('meta_keywords', array_key_exists('meta_keywords', $seo_meta) ? implode(',', json_decode($seo_meta['meta_keywords'])) : null)
@section('meta_description', array_key_exists('meta_description', $seo_meta) ?  $seo_meta['meta_description'] : null)

@section('content')
    <main>
        <!-- page title area start  -->
        @include('frontend.components.projects.breadcrumb')
        <!-- page title area end -->
        <!-- search area start  -->
{{--        @include('frontend.components.projects.search-area')--}}
        <!-- search area end -->
        <!-- portfolio main area start  -->
        @include('frontend.components.projects.projects-area')
        <!-- portfolio main area end -->
        <!-- brand area start  -->
        @include('frontend.components.projects.brand-area')
        <!-- brand area end -->
    </main>
@endsection
