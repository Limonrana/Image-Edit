@extends('frontend.layout.layout')

@section('site_title', 'Single Project - Car Image Editing | Digital Agency')

@section('content')
    <main>
        <!-- page title area start  -->
        <section class="page-title-area" data-background="{{ asset('img/bg/page-title-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title-content text-center">
                            <div class="page-title-heading">
                                <h1>Project Single</h1>
                            </div>
                            <nav class="grb-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('store.home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('store.projects') }}">Projects</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Project Single</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->
        <!-- portfolio details area start  -->
        <section class="portfolio-details-area pt-150 pb-80">
            <div class="container">
                <div class="portfolio-details-content">
                    <div class="row wow fadeInUp">
                        <div class="col-lg-6">
                            <div class="portfolio-details-title mb-25">
                                <h4>Web Landing Page</h4>
                                <span class="portfolio-details-category">UI/UX Designs</span>
                                <span class="portfolio-details-date">23 July 2021</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="portfolio-details-meta mb-25">
                                <ul class="project-like-view f-right">
                                    <li><i class="far fa-thumbs-up"></i>Like</li>
                                    <li><i class="far fa-thumbs-down"></i>Dislike</li>
                                    <li><i class="far fa-comments"></i>565</li>
                                    <li><i class="fas fa-eye"></i>9.34K</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-details-img">
                        <div class="row wow fadeInUp">
                            <div class="col-lg-9">
                                <div class="portfolio-details-img-left">
                                    <div class="portfolio-details-single-img">
                                        <img src="{{ asset('img/portfolio/pd1.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="portfolio-details-img-right">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-6">
                                            <div class="portfolio-details-single-img">
                                                <img src="{{ asset('img/portfolio/pd2.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-6">
                                            <div class="portfolio-details-single-img">
                                                <img src="{{ asset('img/portfolio/pd3.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-6">
                                            <div class="portfolio-details-single-img">
                                                <img src="{{ asset('img/portfolio/pd4.jpg') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row wow fadeInUp">
                        <div class="col-lg-8">
                            <h5 class="mb-15">Description</h5>
                            <p class="mb-40">There are many variations of passages of Lorem Ipsum available, but the
                                majority have suffered alteration in some form,
                                by injected humour. If you are going to use a passage of Lorem Ipsum, you need to be
                                sure. Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                            <h5 class="mb-20">Working Process</h5>
                            <div class="choosing__information portfolio-w-p">
                                <ul>
                                    <li>
                                        <div class="choosing__number">
                                            <span>01</span>
                                        </div>
                                        <div class="choosing__text">
                                            <h5>Sketching On the Board</h5>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form,
                                                by injected humour</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="choosing__number">
                                            <span>02</span>
                                        </div>
                                        <div class="choosing__text">
                                            <h5>Creating Wireframe & Userflow</h5>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form,
                                                by injected humour</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="choosing__number">
                                            <span>03</span>
                                        </div>
                                        <div class="choosing__text">
                                            <h5>Live UI/UX Design & Testing</h5>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form,
                                                by injected humour</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <p class="mb-40">There are many variations of passages of Lorem Ipsum available, but the
                                majority have suffered alteration in some form,
                                by injected humour. If you are going to use a passage of Lorem Ipsum, you need to be
                                sure. Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim
                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. consequat. Duis aute irure
                                dolor in reprehenderit.</p>
                        </div>
                        <div class="col-lg-4">
                            <div class="portfolio-sidebar">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="p-sidebar-widget mb-30">
                                            <div class="ps-widget-meta">
                                                <h5>Tools Used</h5>
                                                <ul class="used-tools">
                                                    <li><a class="ps" href="#">Ps</a></li>
                                                    <li><a class="ai" href="#">Ai</a></li>
                                                    <li><a class="xd" href="#">Xd</a></li>
                                                </ul>
                                            </div>
                                            <div class="ps-widget-meta">
                                                <h5>Creating Date</h5>
                                                <ul class="widget-meta-dt">
                                                    <li>20 July 2021</li>
                                                    <li>10:30 PM</li>
                                                </ul>
                                            </div>
                                            <div class="ps-widget-meta">
                                                <h5>Client's Name</h5>
                                                <div class="clients-name">
                                                    <span>Givson Artboard,</span> New York, USA
                                                </div>
                                            </div>
                                            <div class="ps-widget-meta mb-0">
                                                <h5>Max File Size</h5>
                                                <div class="file-size">
                                                    2320 MB
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio details area end -->
        <!-- hire area start  -->
        <section class="hire-area pd-hire-area">
            <div class="container">
                <div class="pd-hire-inner">
                    <div class="row wow fadeInUp justify-content-center">
                        <div class="col-lg-8 col-md-11">
                            <div class="hire-content text-center">
                                <div class="section-title mb-55">
                                    <h2>Do You Have Some Projects
                                        In Your Mind ?</h2>
                                </div>
                                <div class="hire-btn pd-hire-btn">
                                    <a href="contact.html" class="grb-btn st-1">HIRE US NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hire area end  -->
        <!-- related shots area start  -->
        <section class="related-shots-area">
            <div class="container">
                <div class="related-shots-inner">
                    <h3>Related Shots</h3>
                </div>
                <div class="row wow fadeInUp portfolio-main-items">
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
        <!-- related shots area end -->
        <!-- brand area start  -->
        <div class="brand-area pt-60 pb-100">
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
