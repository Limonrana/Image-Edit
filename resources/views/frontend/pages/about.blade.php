@php
    $page_bg_image = null;
    if (appearance('theme-option')) {
        if (array_key_exists('page_bg_image', json_decode(appearance('footer')->option_value, true))) {
            $logo_id = json_decode(appearance('footer')->option_value, true)['page_bg_image'];
            $upload = \App\Models\Upload::find($logo_id);
            if (isset($upload) OR count($upload) > 0) {
                $page_bg_image = $upload->path;
            }
        }
    }
@endphp

@extends('frontend.layout.layout')

@section('site_title', 'About Us - Car Image Editing | Digital Agency')
@section('meta_title', array_key_exists('meta_title', $seo_meta) ? $seo_meta['meta_title'] : null)
@section('meta_keywords', array_key_exists('meta_keywords', $seo_meta) ? implode(',', json_decode($seo_meta['meta_keywords'])) : null)
@section('meta_description', array_key_exists('meta_description', $seo_meta) ?  $seo_meta['meta_description'] : null)

@section('content')
    <main>
        <!-- page title area start  -->
        @include('frontend.components.about.breadcrumb')
        <!-- page title area end -->
        <!-- about area start  -->
        @include('frontend.components.about.about-area')
        <!-- about area end -->
        <!-- skill area start  -->
        @include('frontend.components.about.skill-area')
        <!-- skill area end -->
        <!-- counter area start  -->
        @include('frontend.components.about.counter-area')
        <!-- counter area end -->
        <!-- team area start  -->
{{--        @include('frontend.components.about.team-area')--}}
        <!-- team area end  -->
        <!-- brand area start  -->
        @include('frontend.components.about.brand-area')
        <!-- brand area end -->
    </main>
@endsection
