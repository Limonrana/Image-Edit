@extends('frontend.layout.layout')

@section('site_title', $project->title.' - Car Image Editing | Digital Agency')
@section('meta_title', $project->meta_title ?? $project->meta_title ?? 'Single Project - Car Image Editing | Digital Agency')
@section('meta_keywords', $project->meta_keywords ? implode(',', json_decode($project->meta_keywords, true)) : null)
@section('meta_description', $project->meta_description ??  $project->meta_description)

@section('content')
    <main>
        <!-- page title area start  -->
        @include('frontend.components.project.breadcrumb')
        <!-- page title area end -->
        <!-- portfolio details area start  -->
        @include('frontend.components.project.project-details')
        <!-- portfolio details area end -->
        <!-- hire area start  -->
{{--        @include('frontend.components.project.hire-area')--}}
        <!-- hire area end  -->
        <!-- related shots area start  -->
        @include('frontend.components.project.related-shots')
        <!-- related shots area end -->
        <!-- brand area start  -->
        @include('frontend.components.project.brand-area')
        <!-- brand area end -->
    </main>
@endsection

@section('styles')
    <style>
        .used-tools .tools-0, .used-tools .tools-3, .used-tools .tools-6, .used-tools .tools-9 {
            background: #4466d6;
        }
        .used-tools .tools-1, .used-tools .tools-4, .used-tools .tools-7, .used-tools .tools-10 {
            background: #e18e00;
        }
        .used-tools .tools-2, .used-tools .tools-5, .used-tools .tools-8, .used-tools .tools-11 {
            background: #aa2894;
        }
    </style>
@endsection
