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
@section('meta_title', $page->meta_title)
@section('meta_keywords', implode(',', json_decode($page->meta_keywords)))
@section('meta_description', $page->meta_description)

@section('content')
    <main>
        <!-- page title area start  -->
        @include('frontend.components.page.breadcrumb')
        <!-- page title area end -->
        <!-- about area start  -->
        @include('frontend.components.page.content-area')
        <!-- about area end -->
        <!-- brand area start  -->
        @include('frontend.components.page.brand-area')
        <!-- brand area end -->
    </main>
@endsection
