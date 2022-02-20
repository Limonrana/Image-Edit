@extends('frontend.layout.layout')

@section('site_title', 'Our Services - Car Image Editing | Digital Agency')

@section('content')
    <main>
        <!-- page title area start  -->
        <section class="page-title-area" data-background="{{ asset('img/bg/page-title-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title-content text-center">
                            <div class="page-title-heading">
                                <h1>Services</h1>
                            </div>
                            <nav class="grb-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Services</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->
        <!-- service box area  -->
        <section class="service-box-area service-box-area-main pt-150 pb-80">
            <div class="container">
                <div class="row wow fadeInUp">
                    @if(count($services) > 0)
                        @foreach($services as $service)
                            <div class="col-lg-4 col-md-6">
                            <div class="service-box-single mb-40">
                                <div class="service-box-content st-1">
                                    <div class="service-box-content-icon st-1">
                                        <i class="{{ $service->icon }}"></i>
                                    </div>
                                    <div class="service-box-content-text">
                                        <h4><a href="{{ route('store.service.show', $service->slug) }}">{{ $service->title }}</a></h4>
                                        <p>{!! Str::limit($service->description, 120) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        @include('frontend.components.common.empty-state')
                    @endif
                </div>
            </div>
        </section>
        <!-- service box end -->
        <!-- partners area start  -->
        <section class="partners-area pb-80">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-lg-6">
                        <div class="partners-content mb-40">
                            <div class="section-title mb-35">
                                <h2>Our Global Partners We Worked With</h2>
                            </div>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form,
                                by injected humour. If you are going to use a passage of Lorem Ipsum, you need to be
                                sure.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="partners-logo pl-100">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="single-partner">
                                        <a href="#"><img src="{{ asset('img/brand/brand1.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="single-partner text-end">
                                        <a href="#"><img src="{{ asset('img/brand/brand2.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="single-partner text-center">
                                        <a href="#"><img src="{{ asset('img/brand/brand3.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="single-partner">
                                        <a href="#"><img src="{{ asset('img/brand/brand4.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="single-partner text-end">
                                        <a href="#"><img src="{{ asset('img/brand/brand5.png') }}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- partners area end -->
        <!-- hire area start  -->
        <section class="hire-area" data-background="{{ asset('img/bg/hire-bg.jpg') }}">
            <div class="container">
                <div class="row wow fadeInUp justify-content-center">
                    <div class="col-lg-8 col-md-11">
                        <div class="hire-content text-center">
                            <div class="section-title mb-55">
                                <h2 class="white-color">Do You Have Some Projects
                                    In Your Mind ?</h2>
                            </div>
                            <div class="hire-btn">
                                <a href="contact.html" class="grb-btn">HIRE US NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hire area end  -->
        <!-- testimonial area start  -->
        <div class="testimonial-area st-2">
            <div class="container">
                <div class="row wow fadeInUp align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title mb-30">
                            <div class="border-left">
                                <p>Testimonials</p>
                            </div>
                            <h2>Some Expression Of <br> Our Clients</h2>
                        </div>
                        <div class="swiper-container testimonial-active-2 st-3">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-single">
                                        <p class="mb-30">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                            do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                            nisi ut
                                            aliquip ex ea commodo consequat.
                                            consequat. Duis aute irure dolor in reprehenderit</p>
                                        <div class="testimonial-name">
                                            <h5>Jonathon Razib</h5>
                                            <p>Sr. Manager, Wood Bazar</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-single">
                                        <p class="mb-30">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                            do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                            nisi ut
                                            aliquip ex ea commodo consequat.
                                            consequat. Duis aute irure dolor in reprehenderit</p>
                                        <div class="testimonial-name">
                                            <h5>Nirob Aronno</h5>
                                            <p>CEO, CodeXpand</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-single">
                                        <p class="mb-30">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                            do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                            nisi ut
                                            aliquip ex ea commodo consequat.
                                            consequat. Duis aute irure dolor in reprehenderit</p>
                                        <div class="testimonial-name">
                                            <h5>Jonathon Razib</h5>
                                            <p>Sr. Manager, Wood Bazar</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-single">
                                        <p class="mb-30">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                            do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                            nisi ut
                                            aliquip ex ea commodo consequat.
                                            consequat. Duis aute irure dolor in reprehenderit</p>
                                        <div class="testimonial-name">
                                            <h5>Nirob Aronno</h5>
                                            <p>CEO, CodeXpand</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-nav-2">
                                <div class="testimonial2-btn-prev"><i class="fal fa-angle-left"></i></div>
                                <div class="testimonial2-btn-next"><i class="fal fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="testimonial-right p-relative">
                            <div class="test-i-img">
                                <img src="{{ asset('img/testimonial/test-i-img.jpg') }}" alt="">
                            </div>
                            <div class="testimonial-right-img p-relative">
                                <img src="{{ asset('img/testimonial/test-r-img.jpg') }}" alt="">
                                <div class="testimonial-quote pos-2">
                                    <i class="fal fa-quote-left"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial area end -->
    </main>
@endsection
