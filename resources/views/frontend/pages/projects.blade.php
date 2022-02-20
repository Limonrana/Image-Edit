@extends('frontend.layout.layout')

@section('site_title', 'Our Projects - Car Image Editing | Digital Agency')

@section('content')
    <main>
        <!-- page title area start  -->
        <section class="page-title-area" data-background="{{ asset('img/bg/page-title-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title-content text-center">
                            <div class="page-title-heading">
                                <h1>Our Projects</h1>
                            </div>
                            <nav class="grb-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('store.home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Projects</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->
        <!-- search area start  -->
        <div class="search-area p-search-area pt-150 pb-50">
            <div class="container">
                <div class="row wow fadeInUp justify-content-center">
                    <div class="col-lg-10">
                        <div class="portfolio-search">
                            <form class="portfolio-search-form" action="#">
                                <input type="text" placeholder="Search Projects">
                                <button class="portfolio-search-btn"><i class="fal fa-search"></i>Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- search area end -->
        <!-- portfolio main area start  -->
        <section class="portfolio-main">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="button-group portfolio-button portfolio-main-buttons">
                        <button class="active" data-filter="*">All Shots</button>
                        <button data-filter=".c-1">Web Development</button>
                        <button data-filter=".c-2">Branding Design</button>
                        <button data-filter=".c-3">UI/UX Designs</button>
                        <button data-filter=".c-4">Corporate</button>
                        <button data-filter=".c-5">Business</button>
                    </div>
                </div>
                <div class="row wow fadeInUp grid portfolio-main-items">
                    <div class="col-lg-4 col-sm-6 grid-item c-1 c-3 c-5">
                        <div class="portfolio-item mb-30">
                            <div class="portfolio-item-img p-relative">
                                <img src="{{ asset('img/portfolio/pm1.jpg') }}" alt="">
                                <div class="portfolio-hover-contnet">
                                    <div class="portfolio-hover-inner text-center">
                                        <a class="p-h-icon pm-s" href="portfolio-details.html"><i
                                                class="fas fa-paper-plane"></i>View
                                            Project</a>
                                    </div>
                                </div>
                            </div>
                            <div class="project-meta">
                                <div class="project-name">
                                    <h5>Digital Smart Watch</h5>
                                </div>
                                <ul class="project-like-view">
                                    <li><i class="far fa-thumbs-up"></i>658</li>
                                    <li><i class="fas fa-eye"></i>9.34K</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 grid-item c-2 c-4 c-3">
                        <div class="portfolio-item mb-30">
                            <div class="portfolio-item-img p-relative">
                                <img src="{{ asset('img/portfolio/pm2.jpg') }}" alt="">
                                <div class="portfolio-hover-contnet">
                                    <div class="portfolio-hover-inner text-center">
                                        <a class="p-h-icon pm-s" href="portfolio-details.html"><i
                                                class="fas fa-paper-plane"></i>View
                                            Project</a>
                                    </div>
                                </div>
                            </div>
                            <div class="project-meta">
                                <div class="project-name">
                                    <h5>Digital Marketing Kits</h5>
                                </div>
                                <ul class="project-like-view">
                                    <li><i class="far fa-thumbs-up"></i>658</li>
                                    <li><i class="fas fa-eye"></i>9.34K</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 grid-item c-1 c-4 c-5">
                        <div class="portfolio-item mb-30">
                            <div class="portfolio-item-img p-relative">
                                <img src="{{ asset('img/portfolio/pm3.jpg') }}" alt="">
                                <div class="portfolio-hover-contnet">
                                    <div class="portfolio-hover-inner text-center">
                                        <a class="p-h-icon pm-s" href="portfolio-details.html"><i
                                                class="fas fa-paper-plane"></i>View
                                            Project</a>
                                    </div>
                                </div>
                            </div>
                            <div class="project-meta">
                                <div class="project-name">
                                    <h5>Home Decorations</h5>
                                </div>
                                <ul class="project-like-view">
                                    <li><i class="far fa-thumbs-up"></i>658</li>
                                    <li><i class="fas fa-eye"></i>9.34K</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 grid-item c-2 c-4">
                        <div class="portfolio-item mb-30">
                            <div class="portfolio-item-img p-relative">
                                <img src="{{ asset('img/portfolio/pm4.jpg') }}" alt="">
                                <div class="portfolio-hover-contnet">
                                    <div class="portfolio-hover-inner text-center">
                                        <a class="p-h-icon pm-s" href="portfolio-details.html"><i
                                                class="fas fa-paper-plane"></i>View
                                            Project</a>
                                    </div>
                                </div>
                            </div>
                            <div class="project-meta">
                                <div class="project-name">
                                    <h5>Web Landing Page</h5>
                                </div>
                                <ul class="project-like-view">
                                    <li><i class="far fa-thumbs-up"></i>658</li>
                                    <li><i class="fas fa-eye"></i>9.34K</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 grid-item c-1 c-3 c-5">
                        <div class="portfolio-item mb-30">
                            <div class="portfolio-item-img p-relative">
                                <img src="{{ asset('img/portfolio/pm5.jpg') }}" alt="">
                                <div class="portfolio-hover-contnet">
                                    <div class="portfolio-hover-inner text-center">
                                        <a class="p-h-icon pm-s" href="portfolio-details.html"><i
                                                class="fas fa-paper-plane"></i>View
                                            Project</a>
                                    </div>
                                </div>
                            </div>
                            <div class="project-meta">
                                <div class="project-name">
                                    <h5>Branding Identity Designs</h5>
                                </div>
                                <ul class="project-like-view">
                                    <li><i class="far fa-thumbs-up"></i>658</li>
                                    <li><i class="fas fa-eye"></i>9.34K</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 grid-item c-2 c-3">
                        <div class="portfolio-item mb-30">
                            <div class="portfolio-item-img p-relative">
                                <img src="{{ asset('img/portfolio/pm6.jpg') }}" alt="">
                                <div class="portfolio-hover-contnet">
                                    <div class="portfolio-hover-inner text-center">
                                        <a class="p-h-icon pm-s" href="portfolio-details.html"><i
                                                class="fas fa-paper-plane"></i>View
                                            Project</a>
                                    </div>
                                </div>
                            </div>
                            <div class="project-meta">
                                <div class="project-name">
                                    <h5>Web Landing Page</h5>
                                </div>
                                <ul class="project-like-view">
                                    <li><i class="far fa-thumbs-up"></i>658</li>
                                    <li><i class="fas fa-eye"></i>9.34K</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio main area end -->
        <!-- brand area start  -->
        <div class="brand-area pt-100 pb-100">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-12">
                        <div class="swiper-container brand-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand1.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand1-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand2.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand2-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand3.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand3-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand4.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand4-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand5.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand5-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand1.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand1-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand2.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand2-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand3.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand3-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand4.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand4-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand5.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand5-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand area end -->
    </main>
@endsection
