@extends('frontend.layout.layout')

@section('site_title', 'Contact Us - Car Image Editing | Digital Agency')
@section('meta_title', array_key_exists('meta_title', $seo_meta) ? $seo_meta['meta_title'] : null)
@section('meta_keywords', array_key_exists('meta_keywords', $seo_meta) ? implode(',', json_decode($seo_meta['meta_keywords'])) : null)
@section('meta_description', array_key_exists('meta_description', $seo_meta) ?  $seo_meta['meta_description'] : null)

@section('content')
    <main>
        <!-- page title area start  -->
        @include('frontend.components.contact.breadcrumb')
        <!-- page title area end -->
        <!-- contact area start  -->
        @include('frontend.components.contact.contact-area')
        <!-- contact area end -->
        <!-- map area start  -->
        @include('frontend.components.contact.map-area')
        <!-- map area end -->
        <!-- brand area start  -->
        @include('frontend.components.contact.brand-area')
        <!-- brand area end -->
    </main>
@endsection
