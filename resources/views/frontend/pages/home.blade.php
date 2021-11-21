@extends('frontend.layout.layout')

@section('site_title', 'Car Image Editing - Digital Agency')

@section('content')
    <main>
        <!-- hero area start here -->
        <section class="slider-area p-relative fix">
            <div class="slider-active swiper-container">
                <div class="swiper-wrapper">
                    <div class="single-slider slider-height swiper-slide slider-overlay" data-swiper-autoplay="5000">
                        <div class="slide-bg" data-background="{{ asset('img/hero/banner1.jpg') }}"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="hero-content">
                                        <div class="hero-bg-shape" data-animation="fadeInUp" data-delay=".3s">
                                            <div class="hero-s-1">
                                                <img src="{{ asset('img/shape/hero-s-1.png') }}" alt="">
                                            </div>
                                            <div class="hero-s-2">
                                                <img src="{{ asset('img/shape/hero-s-2.png') }}" alt="">
                                            </div>
                                        </div>
                                        <p data-animation="fadeInUp" data-delay=".6s">Digital Service Agency</p>
                                        <h1 data-animation="fadeInUp" data-delay=".9s">Digital Service Agency</h1>
                                        <div class="hero-content-btn" data-animation="fadeInUp" data-delay="1.1s">
                                            <a href="contact.html" class="grb-btn">Get Started</a>
                                        </div>
                                        <div class="hero-video-btn" data-animation="fadeInUp" data-delay="1.2s">
                                            <a class="grb-video popup-video"
                                               href="https://www.youtube.com/watch?v=pNje3bWz7V8"><i
                                                    class="fas fa-play"></i></a>
                                            <p>Working Videos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slider slider-height swiper-slide slider-overlay" data-swiper-autoplay="5000">
                        <div class="slide-bg" data-background="{{ asset('img/hero/banner3.jpg') }}"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="hero-content">
                                        <div class="hero-bg-shape" data-animation="fadeInUp" data-delay=".3s">
                                            <div class="hero-s-1">
                                                <img src="{{ asset('img/shape/hero-s-1.png') }}" alt="">
                                            </div>
                                            <div class="hero-s-2">
                                                <img src="{{ asset('img/shape/hero-s-2.png') }}" alt="">
                                            </div>
                                        </div>
                                        <p data-animation="fadeInUp" data-delay=".6s">Digital Service Agency</p>
                                        <h1 data-animation="fadeInUp" data-delay=".9s">Digital Service Agency</h1>
                                        <div class="hero-content-btn" data-animation="fadeInUp" data-delay="1.1s">
                                            <a href="contact.html" class="grb-btn">Get Started</a>
                                        </div>
                                        <div class="hero-video-btn" data-animation="fadeInUp" data-delay="1.2s">
                                            <a class="grb-video popup-video" href="https://youtu.be/Vu_PI00ifoc"><i
                                                    class="fas fa-play"></i></a>
                                            <p>Working Videos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slider slider-height swiper-slide slider-overlay" data-swiper-autoplay="5000">
                        <div class="slide-bg" data-background="{{ asset('img/hero/banner2.jpg') }}"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="hero-content">
                                        <div class="hero-bg-shape" data-animation="fadeInUp" data-delay=".3s">
                                            <div class="hero-s-1">
                                                <img src="{{ asset('img/shape/hero-s-1.png') }}" alt="">
                                            </div>
                                            <div class="hero-s-2">
                                                <img src="{{ asset('img/shape/hero-s-2.png') }}" alt="">
                                            </div>
                                        </div>
                                        <p data-animation="fadeInUp" data-delay=".6s">Digital Service Agency</p>
                                        <h1 data-animation="fadeInUp" data-delay=".9s">Digital Service Agency</h1>
                                        <div class="hero-content-btn" data-animation="fadeInUp" data-delay="1.1s">
                                            <a href="contact.html" class="grb-btn">Get Started</a>
                                        </div>
                                        <div class="hero-video-btn" data-animation="fadeInUp" data-delay="1.2s">
                                            <a class="grb-video popup-video" href="https://youtu.be/Vu_PI00ifoc"><i
                                                    class="fas fa-play"></i></a>
                                            <p>Working Videos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- If we need navigation buttons -->
                <div class="slider-nav">
                    <div class="swiper-button-prev"><i class="far fa-arrow-left"></i></div>
                    <div class="swiper-button-next"><i class="far fa-arrow-right"></i></div>
                </div>
            </div>
        </section>
        <!-- hero area end here -->
        <!-- brand area start  -->
        @include('frontend.components.common.brand-area')
        <!-- brand area end -->
        <!-- about area start  -->
        <section class="about__area">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-xl-6 col-lg-5">
                        <div class="about__img p-relative mb-30">
                            <div class="about__img-inner">
                                <img src="{{ asset('img/about/about.jpg') }}" alt="">
                            </div>
                            <div class="p-element">
                                <div class="ab-border d-none d-lg-block"></div>
                                <div class="award">
                                    <img src="{{ asset('img/icon/batch.png') }}" alt="">
                                    <p>Won the Business
                                        Gainer Awards</p>
                                </div>
                                <div class="ab-image">
                                    <img src="{{ asset('img/about/abp-img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="about__content mb-30">
                            <div class="section-title mb-30">
                                <div class="border-left">
                                    <p>About Company</p>
                                </div>
                                <h2>We're Leading Digital Business Agency</h2>
                            </div>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form,
                                by injected humour. If you are going to use a passage of Lorem Ipsum, you need to be
                                sure there isn't anything
                                embarrassing hidden in the middle of text.</p>
                            <ul class="about-points">
                                <li>
                                    <div class="points-heading">
                                        <div class="p-icon">
                                            <i class="flaticon-team"></i>
                                        </div>
                                        <h5>One Stop Business</h5>
                                    </div>
                                    <p>There are many variations of passages of Lorem Ipsum available.</p>
                                </li>
                                <li>
                                    <div class="points-heading">
                                        <div class="p-icon">
                                            <i class="flaticon-creative-team"></i>
                                        </div>
                                        <h5>One Stop Business</h5>
                                    </div>
                                    <p>There are many variations of passages of Lorem Ipsum available.</p>
                                </li>
                            </ul>
                            <div class="about__btn st-1">
                                <a href="about.html" class="grb-btn st-1">Read More<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end -->
        <!-- service area start  -->
        <section class="service__area grey-bg pt-120 pb-90">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-lg-6">
                        <div class="section-title mb-55">
                            <div class="border-left">
                                <p>Our Services</p>
                            </div>
                            <h2>Our Best Services</h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="service__text mb-30">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form,
                                by injected humour. If you are going to use a passage of Lorem Ipsum.</p>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInUp">
                    <div class="col-lg-4 col-md-6">
                        <div class="single__service text-center mb-30">
                            <span class="service__icon">
                                <a href="service-details.html"><i class="flaticon-idea"></i></a>
                            </span>
                            <h4><a href="service-details.html">Financial Planning</a></h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form.</p>
                            <a href="service-details.html" class="service__btn">
                                <i class="fas fa-plus"></i>Read More
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single__service text-center mb-30">
                            <span class="service__icon">
                                <a href="service-details.html"><i class="flaticon-consultation"></i></a>
                            </span>
                            <h4><a href="service-details.html">Business Consultation</a></h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form.</p>
                            <a href="service-details.html" class="service__btn">
                                <i class="fas fa-plus"></i>Read More
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single__service text-center mb-30">
                            <span class="service__icon">
                                <a href="service-details.html"><i class="flaticon-healthcare"></i></a>
                            </span>
                            <h4><a href="service-details.html">Life & Health Insurance</a></h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form.</p>
                            <a href="service-details.html" class="service__btn">
                                <i class="fas fa-plus"></i>Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service area end -->
        <!-- choosing area start  -->
        <section class="choosing__area pt-120 pb-90">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-lg-6">
                        <div class="choosing__img mb-30">
                            <img src="{{ asset('img/about/choosing.jpg') }}" alt="">
                            <div class="subscribe">
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <div class="subscribe__text">
                                    <h4><a href="#">Subscribe Us</a></h4>
                                    <p>234, 857 Subscribed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-title mb-55">
                            <div class="border-left">
                                <p>Why Choose Us</p>
                            </div>
                            <h2>We Execute Our Ideas from Start to Finish</h2>
                        </div>
                        <div class="choosing__information mb-30">
                            <ul>
                                <li>
                                    <div class="choosing__number">
                                        <span>01</span>
                                    </div>
                                    <div class="choosing__text">
                                        <h5>Gathering Information</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusod tempor
                                            idunt ut labore dolore magna aliqua koiern
                                            koiners</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="choosing__number">
                                        <span>02</span>
                                    </div>
                                    <div class="choosing__text">
                                        <h5>Research, Ideas & Sketch</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusod tempor
                                            idunt ut labore dolore magna aliqua koiern
                                            koiners</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="choosing__number">
                                        <span>03</span>
                                    </div>
                                    <div class="choosing__text">
                                        <h5>Ideas, Research & Sketch</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusod tempor
                                            idunt ut labore dolore magna aliqua koiern
                                            koiners</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- choosing area end  -->
        <!-- counter area start  -->
        <section class="counter__area pt-110 pb-90" data-background="{{ asset('img/bg/counter-bg.jpg') }}">
            <div class="container">
                <div class="row wow fadeInUp align-items-center counter-head">
                    <div class="col-lg-9 col-md-8">
                        <div class="counter-left">
                            <div class="section-title mb-60">
                                <h2 class="white-color ">Do You Have Any Projects in Your Mind?</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="counter-right mb-30">
                            <a href="contact.html" class="grb-border-btn">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>
                <div class="counter-inner">
                    <div class="counter-content">
                        <div class="row wow fadeInUp">
                            <div class="col-lg-6">
                                <div class="counter-content-left mb-30">
                                    <div class="section-title mb-40">
                                        <h2>We Achieved Honor Experiences in Last <span>25+ Years</span></h2>
                                    </div>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some
                                        passage.</p>
                                    <ul class="counter-items">
                                        <li class="single-counter">
                                            <div class="single-counter-icon">
                                                <i class="flaticon-crm"></i>
                                            </div>
                                            <div class="single-counter-text">
                                                <h3>53K+</h3>
                                                <p>Happy Clients</p>
                                            </div>
                                        </li>
                                        <li class="single-counter">
                                            <div class="single-counter-icon">
                                                <i class="flaticon-new-product"></i>
                                            </div>
                                            <div class="single-counter-text">
                                                <h3>25+</h3>
                                                <p>Digital Products</p>
                                            </div>
                                        </li>
                                        <li class="single-counter">
                                            <div class="single-counter-icon">
                                                <i class="flaticon-delivery-box"></i>
                                            </div>
                                            <div class="single-counter-text">
                                                <h3>25+</h3>
                                                <p>Unique Services</p>
                                            </div>
                                        </li>
                                        <li class="single-counter">
                                            <div class="single-counter-icon">
                                                <i class="flaticon-employee"></i>
                                            </div>
                                            <div class="single-counter-text">
                                                <h3>2.5K+</h3>
                                                <p>Skilled Engineers</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="counter-content-right text-end mb-30">
                                    <div class="counter-right-img">
                                        <div class="dot-dot">
                                            <img src="{{ asset('img/shape/dot-dot.png') }}" alt="">
                                        </div>
                                        <img src="{{ asset('img/bg/counter-right-img.png') }}" alt="">
                                        <div class="experience-text">
                                            <p><span>25+</span>Years
                                                Experiences</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- counter area end -->
        <!-- testimonial area start  -->
        <section class="testimonial-area st-1" data-background="{{ asset('img/bg/bg-shape.png') }}">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-lg-12">
                        <div class="section-title mb-55 text-center">
                            <div class="border-c-bottom">
                                <p>Testimonials</p>
                            </div>
                            <h2>Some Expression Of <br> Our Clients</h2>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInUp justify-content-center">
                    <div class="col-lg-10">
                        <div class="testimonial-wrapper p-relative">
                            <div class="testimonial-content-inner">
                                <div class="swiper-container testimonial-active">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="testimonial-single st-1 text-center">
                                                <div class="testimonial-img">
                                                    <img src="{{ asset('img/testimonial/test1.png') }}" alt="">
                                                </div>
                                                <p class="mb-30">All the Lorem Ipsum generators on the Internet tend to
                                                    repeat
                                                    predefined
                                                    chunks as
                                                    necessary, making this the first true
                                                    generator on the Internet. It uses a dictionary of over 200 Latin
                                                    words,
                                                    combined
                                                    with a
                                                    handful of model sentence
                                                    structures, to generate Lorem Ipsum which looks reasonable</p>
                                                <div class="testimonial-name">
                                                    <h5>Janathan Samantha</h5>
                                                    <p>CEO, Khalifa Exo</p>
                                                </div>
                                                <ul class="testimonial-review">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="testimonial-single st-1 text-center">
                                                <div class="testimonial-img">
                                                    <img src="{{ asset('img/testimonial/test2.png') }}" alt="">
                                                </div>
                                                <p class="mb-30">All the Lorem Ipsum generators on the Internet tend to
                                                    repeat
                                                    predefined
                                                    chunks as
                                                    necessary, making this the first true
                                                    generator on the Internet. It uses a dictionary of over 200 Latin
                                                    words,
                                                    combined
                                                    with a
                                                    handful of model sentence
                                                    structures, to generate Lorem Ipsum which looks reasonable</p>
                                                <div class="testimonial-name">
                                                    <h5>Nirob Aronno</h5>
                                                    <p>Sr. Manager, Wood Bazar</p>
                                                </div>
                                                <ul class="testimonial-review">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="testimonial-nav-1 testimonial-nav-arrow">
                                <div class="testimonial1-button-prev"><i class="far fa-arrow-left"></i></div>
                                <div class="testimonial1-button-next"><i class="far fa-arrow-right"></i></div>
                            </div>
                            <div class="testimonial-quote">
                                <i class="fal fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="portfolio-area">
            <div class="container">
                <div class="row wow fadeInUp align-items-center counter-head">
                    <div class="col-lg-6 col-md-7">
                        <div class="portfolio-left">
                            <div class="section-title mb-55">
                                <div class="border-left">
                                    <p>Portfolio</p>
                                </div>
                                <h2>Explore some Recent Projects</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="portfolio-right mb-30 text-md-end">
                            <a href="portfolio.html" class="grb-border-btn st-1">
                                All Projects
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portfolio-container">
                <div class="portfolio-inner">
                    <div class="swiper-container portfolio-active">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="single-portfolio">
                                    <div class="portfolio-img">
                                        <a href="portfolio-details.html"><img src="{{ asset('img/portfolio/port1.jpg') }}"
                                                                              alt=""></a>
                                    </div>
                                    <div class="portfolio-content">
                                        <h5><a href="portfolio-details.html">Graphics Design</a></h5>
                                        <span>Brand Identity</span>
                                        <a class="p-link popup-image" href="{{ asset('img/portfolio/port1.jpg') }}"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-portfolio">
                                    <div class="portfolio-img">
                                        <a href="portfolio-details.html"><img src="{{ asset('img/portfolio/port2.jpg') }}"
                                                                              alt=""></a>
                                    </div>
                                    <div class="portfolio-content">
                                        <h5><a href="portfolio-detaisl.html">Graphics Design</a></h5>
                                        <span>Brand Identity</span>
                                        <a class="p-link popup-image" href="{{ asset('img/portfolio/port2.jpg') }}"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-portfolio">
                                    <div class="portfolio-img">
                                        <a href="portfolio-details.html"><img src="{{ asset('img/portfolio/port3.jpg') }}"
                                                                              alt=""></a>
                                    </div>
                                    <div class="portfolio-content">
                                        <h5><a href="portfolio-detaisl.html">Graphics Design</a></h5>
                                        <span>Brand Identity</span>
                                        <a class="p-link popup-image" href="{{ asset('img/portfolio/port3.jpg') }}"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-portfolio">
                                    <div class="portfolio-img">
                                        <a href="portfolio-details.html"><img src="{{ asset('img/portfolio/port1.jpg') }}"
                                                                              alt=""></a>
                                    </div>
                                    <div class="portfolio-content">
                                        <h5><a href="portfolio-detaisl.html">Graphics Design</a></h5>
                                        <span>Brand Identity</span>
                                        <a class="p-link popup-image" href="{{ asset('img/portfolio/port1.jpg') }}"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-portfolio">
                                    <div class="portfolio-img">
                                        <a href="portfolio-details.html"><img src="{{ asset('img/portfolio/port2.jpg') }}"
                                                                              alt=""></a>
                                    </div>
                                    <div class="portfolio-content">
                                        <h5><a href="portfolio-detaisl.html">Graphics Design</a></h5>
                                        <span>Brand Identity</span>
                                        <a class="p-link popup-image" href="{{ asset('img/portfolio/port2.jpg') }}"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-portfolio">
                                    <div class="portfolio-img">
                                        <a href="portfolio-details.html"><img src="{{ asset('img/portfolio/port3.jpg') }}"
                                                                              alt=""></a>
                                    </div>
                                    <div class="portfolio-content">
                                        <h5><a href="portfolio-detaisl.html">Graphics Design</a></h5>
                                        <span>Brand Identity</span>
                                        <a class="p-link popup-image" href="{{ asset('img/portfolio/port3.jpg') }}"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-nav">
                            <div class="swiper-button-prev"><i class="far fa-arrow-left"></i></div>
                            <div class="swiper-button-next"><i class="far fa-arrow-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio area end -->
        <!-- team area start  -->
        <section class="team-area grey-bg pt-115 pb-90">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-lg-12">
                        <div class="section-title mb-55 text-center">
                            <div class="border-c-bottom">
                                <p>Meet The Team</p>
                            </div>
                            <h2>Meet Our Experienced <br> & Skilled Team</h2>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInUp">
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member mb-30">
                            <div class="member-img">
                                <a href="contact.html"><img src="{{ asset('img/team/team1.jpg') }}" alt=""></a>
                            </div>
                            <div class="member-name p-relative">
                                <div class="member-name-bg">
                                    <img src="{{ asset('img/shape/member-name-bg.png') }}" alt="">
                                    <img src="{{ asset('img/shape/member-name-c-bg.png') }}" alt="">
                                </div>
                                <h5><a href="contact.html">Janathan Samantha</a></h5>
                                <span>Web Developer</span>
                                <div class="member-social">
                                    <i class="far fa-plus"></i>
                                    <ul class="member-social-icons">
                                        <li><a href="#"><i class="fab fa-skype"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member mb-30">
                            <div class="member-img">
                                <a href="contact.html"><img src="{{ asset('img/team/team2.jpg') }}" alt=""></a>
                            </div>
                            <div class="member-name p-relative">
                                <div class="member-name-bg">
                                    <img src="{{ asset('img/shape/member-name-bg.png') }}" alt="">
                                    <img src="{{ asset('img/shape/member-name-c-bg.png') }}" alt="">
                                </div>
                                <h5><a href="contact.html">Daniel David Deo</a></h5>
                                <span>Programmer</span>
                                <div class="member-social">
                                    <i class="far fa-plus"></i>
                                    <ul class="member-social-icons">
                                        <li><a href="#"><i class="fab fa-skype"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member mb-30">
                            <div class="member-img">
                                <a href="contact.html"><img src="{{ asset('img/team/team3.jpg') }}" alt=""></a>
                            </div>
                            <div class="member-name p-relative">
                                <div class="member-name-bg">
                                    <img src="{{ asset('img/shape/member-name-bg.png') }}" alt="">
                                    <img src="{{ asset('img/shape/member-name-c-bg.png') }}" alt="">
                                </div>
                                <h5><a href="contact.html">Arman Ariyan</a></h5>
                                <span>Manager</span>
                                <div class="member-social">
                                    <i class="far fa-plus"></i>
                                    <ul class="member-social-icons">
                                        <li><a href="#"><i class="fab fa-skype"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member mb-30">
                            <div class="member-img">
                                <a href="contact.html"><img src="{{ asset('img/team/team4.jpg') }}" alt=""></a>
                            </div>
                            <div class="member-name p-relative">
                                <div class="member-name-bg">
                                    <img src="{{ asset('img/shape/member-name-bg.png') }}" alt="">
                                    <img src="{{ asset('img/shape/member-name-c-bg.png') }}" alt="">
                                </div>
                                <h5><a href="contact.html">Shimuel Bappy</a></h5>
                                <span>UI/UX Designer</span>
                                <div class="member-social">
                                    <i class="far fa-plus"></i>
                                    <ul class="member-social-icons">
                                        <li><a href="#"><i class="fab fa-skype"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- team area end  -->
        <!-- blog area start  -->
        <section class="blog-area pt-120 pb-90">
            <div class="container">
                <div class="row wow fadeInUp align-items-center counter-head">
                    <div class="col-lg-6 col-md-8">
                        <div class="blog-left">
                            <div class="section-title mb-55">
                                <div class="border-left">
                                    <p>Blog Posts</p>
                                </div>
                                <h2>Our Recent Blogs</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="blog-right mb-30 f-right">
                            <a href="blog.html" class="grb-btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInUp">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-single mb-30 p-relative">
                            <div class="blog-date">
                                <div class="blog-date-shape">
                                    <img src="{{ asset('img/shape/blog-date-shape.png') }}" alt="">
                                </div>
                                <i class="fal fa-calendar-alt"></i>
                                <span>22</span>
                                <p>Jan 2020</p>
                            </div>
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="{{ asset('img/blog/blog1.jpg') }}" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h4><a href="blog-details.html">There Is a Risk On Investing Money For Finance
                                        Business</a></h4>
                                <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as
                                    [……]</p>
                                <a href="blog-details.html" class="read-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-single mb-30 p-relative">
                            <div class="blog-date">
                                <div class="blog-date-shape">
                                    <img src="{{ asset('img/shape/blog-date-shape.png') }}" alt="">
                                </div>
                                <i class="fal fa-calendar-alt"></i>
                                <span>16</span>
                                <p>Dec 2020</p>
                            </div>
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="{{ asset('img/blog/blog2.jpg') }}" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h4><a href="blog-details.html">Seven Operational Tips & Tricks For Constriction
                                        Business</a></h4>
                                <p>We adapt our delivery to the way your work, whether as an external provider or by
                                    [……]</p>
                                <a href="blog-details.html" class="read-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-single mb-30 p-relative">
                            <div class="blog-date">
                                <div class="blog-date-shape">
                                    <img src="{{ asset('img/shape/blog-date-shape.png') }}" alt="">
                                </div>
                                <i class="fal fa-calendar-alt"></i>
                                <span>07</span>
                                <p>Nov 2020</p>
                            </div>
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="{{ asset('img/blog/blog3.jpg') }}" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <h4><a href="blog-details.html">Forging Relationships Between Multi-national
                                        Corporations</a></h4>
                                <p>Over more than 20 years, we’ve fostered trusted relationships across government [……]
                                </p>
                                <a href="blog-details.html" class="read-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog area end -->
        <!-- newsletter area start  -->
        <div class="newsletter-area">
            <div class="container">
                <div class="row wow fadeInUp align-items-center">
                    <div class="col-lg-6">
                        <div class="newsletter-text mb-30">
                            <h4>Subscribe Us For Newsletter</h4>
                            <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined the Newsletter
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form class="subscribe-form mb-30">
                            <input type="text" placeholder="Enter your email...">
                            <button type="submit"><i class="fas fa-paper-plane"></i>Subscribe Us</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- newsletter area end -->
    </main>
@endsection
