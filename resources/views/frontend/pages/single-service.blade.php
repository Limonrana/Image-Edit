@extends('frontend.layout.layout')

@section('site_title', $service->title.' - Car Image Editing | Digital Agency')
@section('meta_title', $service->meta_title ?? $service->meta_title ?? 'Single Service - Car Image Editing | Digital Agency')
@section('meta_keywords', $service->meta_keywords ? implode(',', json_decode($service->meta_keywords, true)) : null)
@section('meta_description', $service->meta_description ??  $service->meta_description)

@section('content')
    <main>
        <!-- page title area start  -->
        <section class="page-title-area" data-background="{{ asset($service->featured_image->path) }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title-content text-center">
                            <div class="page-title-heading">
                                <h1>{{ $service->title }}</h1>
                            </div>
                            <nav class="grb-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('store.home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('store.services') }}">Services</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $service->title }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->
        <!-- service details area start  -->
        <section class="service-details-area pt-150 pb-80">
            <div class="container">
                <div class="service-details-img wow fadeInUp">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="service-details-single-img">
                                <img src="{{ asset($service->featured_image->path) }}" alt="{{ $service->title }}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-lg-12 col-sm-6">
                                    <div class="service-details-single-img">
                                        <img src="{{ asset($service->b_image_1->path) }}" alt="{{ $service->title }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6">
                                    <div class="service-details-single-img">
                                        <img src="{{ asset($service->b_image_2->path) }}" alt="{{ $service->title }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="service-details-content wow fadeInUp">
                    <div class="service-details-heading">
                        <h2>{{ $service->title }}</h2>
                    </div>
                    <div id="descriptionBox">{!! $service->description !!}</div>
                    <div class="row">
                        <div class="col-xl-9">
                            <h5 class="mb-20">Questions On The Projects</h5>
                            <div class="grb-accordion">
                                <div class="accordion" id="accordion">
                                    @foreach(json_decode($service->faqs) as $key => $faq)
                                        <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-{{$key}}">
                                            <button class="accordion-button @if($key!==0) collapsed @endif" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse-{{$key}}" aria-expanded="@if($key === 0) true @else false @endif"
                                                    aria-controls="collapse-{{$key}}">
                                                {{ $faq->question }}
                                            </button>
                                        </h2>
                                        <div id="collapse-{{$key}}" class="accordion-collapse @if($key === 0) show @else collapse @endif"
                                             aria-labelledby="heading-{{$key}}" data-bs-parent="#accordion">
                                            <div class="accordion-body">
                                                {{ $faq->answer }}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-45 mb-25">Explore More Services</h4>
                    <div class="row service-details-more">
                        @foreach($related_services as $related_service)
                            <div class="col-lg-4 col-md-6">
                            <div class="service-box-single mb-40">
                                <div class="service-box-content st-1">
                                    <div class="service-box-content-icon st-1">
                                        <i class="{{ $related_service->icon }}"></i>
                                    </div>
                                    <div class="service-box-content-text">
                                        <h4><a href="{{ route('store.service.show', $related_service->slug) }}">{{ $related_service->title }}</a></h4>
                                        <p>{!! Str::limit($related_service->description, 120 ) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- service details area end -->
    </main>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let allUl = document.querySelectorAll('#descriptionBox ul');
            allUl.forEach((ul) => {
                ul.classList.add("execute-list");
            });
        });
    </script>
@endsection
