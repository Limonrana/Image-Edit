@extends('frontend.layout.layout')

@section('site_title', 'Our Blogs - Car Image Editing | Digital Agency')

@section('content')
    <main>
        <!-- page title area start  -->
        <section class="page-title-area" data-background="{{ asset('img/bg/page-title-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title-content text-center">
                            <div class="page-title-heading">
                                <h1>Blog Page</h1>
                            </div>
                            <nav class="grb-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('store.home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog Page</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->
        <!-- blog area start  -->
        <div class="blog-main-area pt-150">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-lg-8">
                        <div class="blog-main">
                            <div class="blog-main-single mb-60">
                                <div class="bms-img mb-30">
                                    <a href="blog-details.html"><img src="{{ asset('img/blog/bms1.jpg') }}" alt=""></a>
                                </div>
                                <div class="bms-content">
                                    <div class="fix mb-30">
                                        <div class="blog-date bms-date">
                                            <i class="fal fa-calendar-alt"></i>
                                            <span>22</span>
                                            <p>Jan 2020</p>
                                        </div>
                                        <div class="bms-title">
                                            <ul class="project-like-view bms-lv">
                                                <li><a href="blog-details.html"><i
                                                            class="fas fa-folder-open"></i>Business</a></li>
                                                <li><a href="blog-details.html"><i class="fas fa-comments-alt"></i>45
                                                        Comments</a></li>
                                                <li><a href="blog-details.html"><i class="fas fa-eye"></i>546 Views</a>
                                                </li>
                                            </ul>
                                            <h4><a href="blog-details.html">Here is The Real Time Business Generator
                                                    That
                                                    Needs to Be cool Project</a></h4>
                                        </div>
                                    </div>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form,
                                        by injected humour. If you are going to use a passage of Lorem Ipsum, you need
                                        to be sure. Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                    <div class="bms-btn mt-45">
                                        <a href="blog-details.html" class="grb-border-btn st-1">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-main-single mb-60">
                                <div class="bms-img mb-30">
                                    <a href="blog-details.html"><img src="{{ asset('img/blog/bms2.jpg') }}" alt=""></a>
                                </div>
                                <div class="bms-content">
                                    <div class="fix mb-30">
                                        <div class="blog-date bms-date">
                                            <i class="fal fa-calendar-alt"></i>
                                            <span>22</span>
                                            <p>Jan 2020</p>
                                        </div>
                                        <div class="bms-title">
                                            <ul class="project-like-view bms-lv">
                                                <li><a href="blog-details.html"><i
                                                            class="fas fa-folder-open"></i>Business</a></li>
                                                <li><a href="blog-details.html"><i class="fas fa-comments-alt"></i>45
                                                        Comments</a></li>
                                                <li><a href="blog-details.html"><i class="fas fa-eye"></i>546 Views</a>
                                                </li>
                                            </ul>
                                            <h4><a href="blog-details.html">How a developer and designer duo at Deutsche
                                                    Bank keep remote</a></h4>
                                        </div>
                                    </div>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form,
                                        by injected humour. If you are going to use a passage of Lorem Ipsum, you need
                                        to be sure. Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                    <div class="bms-btn mt-45">
                                        <a href="blog-details.html" class="grb-border-btn st-1">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-main-single mb-60">
                                <div class="bms-img mb-30">
                                    <a href="blog-details.html"><img src="{{ asset('img/blog/bms3.jpg') }}" alt=""></a>
                                </div>
                                <div class="bms-content">
                                    <div class="fix mb-30">
                                        <div class="blog-date bms-date">
                                            <i class="fal fa-calendar-alt"></i>
                                            <span>22</span>
                                            <p>Jan 2020</p>
                                        </div>
                                        <div class="bms-title">
                                            <ul class="project-like-view bms-lv">
                                                <li><a href="blog-details.html"><i
                                                            class="fas fa-folder-open"></i>Business</a></li>
                                                <li><a href="blog-details.html"><i class="fas fa-comments-alt"></i>45
                                                        Comments</a></li>
                                                <li><a href="blog-details.html"><i class="fas fa-eye"></i>546 Views</a>
                                                </li>
                                            </ul>
                                            <h4><a href="blog-details.html">The underrated design book that transformed
                                                    the way I work</a></h4>
                                        </div>
                                    </div>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form,
                                        by injected humour. If you are going to use a passage of Lorem Ipsum, you need
                                        to be sure. Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                    <div class="bms-btn mt-45">
                                        <a href="blog-details.html" class="grb-border-btn st-1">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-main-single mb-60">
                                <div class="bms-img mb-30">
                                    <a href="blog-details.html"><img src="{{ asset('img/blog/bms4.jpg') }}" alt=""></a>
                                </div>
                                <div class="bms-content">
                                    <div class="fix mb-30">
                                        <div class="blog-date bms-date">
                                            <i class="fal fa-calendar-alt"></i>
                                            <span>22</span>
                                            <p>Jan 2020</p>
                                        </div>
                                        <div class="bms-title">
                                            <ul class="project-like-view bms-lv">
                                                <li><a href="blog-details.html"><i
                                                            class="fas fa-folder-open"></i>Business</a></li>
                                                <li><a href="blog-details.html"><i class="fas fa-comments-alt"></i>45
                                                        Comments</a></li>
                                                <li><a href="blog-details.html"><i class="fas fa-eye"></i>546 Views</a>
                                                </li>
                                            </ul>
                                            <h4><a href="blog-details.html">6 ways you can make your design more
                                                    inclusive and equitable</a></h4>
                                        </div>
                                    </div>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form,
                                        by injected humour. If you are going to use a passage of Lorem Ipsum, you need
                                        to be sure. Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                    <div class="bms-btn mt-45">
                                        <a href="blog-details.html" class="grb-border-btn st-1">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-main-single mb-60">
                                <div class="bms-img mb-30">
                                    <a href="blog-details.html"><img src="{{ asset('img/blog/bms5.jpg') }}" alt=""></a>
                                </div>
                                <div class="bms-content">
                                    <div class="fix mb-30">
                                        <div class="blog-date bms-date">
                                            <i class="fal fa-calendar-alt"></i>
                                            <span>22</span>
                                            <p>Jan 2020</p>
                                        </div>
                                        <div class="bms-title">
                                            <ul class="project-like-view bms-lv">
                                                <li><a href="blog-details.html"><i
                                                            class="fas fa-folder-open"></i>Business</a></li>
                                                <li><a href="blog-details.html"><i class="fas fa-comments-alt"></i>45
                                                        Comments</a></li>
                                                <li><a href="blog-details.html"><i class="fas fa-eye"></i>546 Views</a>
                                                </li>
                                            </ul>
                                            <h4><a href="blog-details.html">Apple reimagines the iPhone experience with
                                                    iOS 14</a></h4>
                                        </div>
                                    </div>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form,
                                        by injected humour. If you are going to use a passage of Lorem Ipsum, you need
                                        to be sure. Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                    <div class="bms-btn mt-45">
                                        <a href="blog-details.html" class="grb-border-btn st-1">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-sidebar">
                            <div class="bs-widget mb-30 sidebar-search">
                                <form class="search-form">
                                    <div class="search-input-field bss">
                                        <input type="text" placeholder="Search Keywords">
                                        <button type="submit"><i class="far fa-search"></i>Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="bs-widget mb-30">
                                <div class="bs-widget-title mb-40">
                                    <h5>Categories</h5>
                                </div>
                                <ul class="bs-category-list">
                                    <li>
                                        <a href="#">
                                            <p>Digital Marketing</p><span>(05)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p>Branding Designs</p><span>(02)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p>Sterling Silver</p><span>(03)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p>Business Solution</p><span>(03)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p>Corporate Policy</p><span>(04)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p>Development</p><span>(01)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <p>Web Design</p><span>(02)</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="bs-widget mb-30">
                                <div class="bs-widget-title mb-40">
                                    <h5>Recent Posts</h5>
                                </div>
                                <ul class="bs-post">
                                    <li class="bs-post-single">
                                        <div class="bs-post-img">
                                            <a href="blog-details.html">
                                                <img src="{{ asset('img/blog/bsp1.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="bs-post-content">
                                            <h6><a href="blog-details.html">Incorporation is a Big Milestone for
                                                    Business</a></h6>
                                            <span>28 April 2021 </span>
                                        </div>
                                    </li>
                                    <li class="bs-post-single">
                                        <div class="bs-post-img">
                                            <a href="blog-details.html">
                                                <img src="{{ asset('img/blog/bsp2.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="bs-post-content">
                                            <h6><a href="blog-details.html">A wonderful serenity has taken
                                                    possession</a></h6>
                                            <span>28 April 2021 </span>
                                        </div>
                                    </li>
                                    <li class="bs-post-single">
                                        <div class="bs-post-img">
                                            <a href="blog-details.html">
                                                <img src="{{ asset('img/blog/bsp3.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="bs-post-content">
                                            <h6><a href="blog-details.html">The languages only differ in their
                                                    grammar</a></h6>
                                            <span>28 April 2021 </span>
                                        </div>
                                    </li>
                                    <li class="bs-post-single">
                                        <div class="bs-post-img">
                                            <a href="blog-details.html">
                                                <img src="{{ asset('img/blog/bsp4.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="bs-post-content">
                                            <h6><a href="blog-details.html">Company launches new software channel</a>
                                            </h6>
                                            <span>28 April 2021 </span>
                                        </div>
                                    </li>
                                    <li class="bs-post-single">
                                        <div class="bs-post-img">
                                            <a href="blog-details.html">
                                                <img src="{{ asset('img/blog/bsp5.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="bs-post-content">
                                            <h6><a href="blog-details.html">Reasons to the explain fast business
                                                    builder</a></h6>
                                            <span>28 April 2021 </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="bs-widget mb-30 widget-tag">
                                <div class="bs-widget-title mb-40">
                                    <h5>Popular Tages</h5>
                                </div>
                                <ul class="bs-tags">
                                    <li><a class="grb-tag" href="#">Business</a></li>
                                    <li><a class="grb-tag" href="#">Corporate</a></li>
                                    <li><a class="grb-tag" href="#">Financial</a></li>
                                    <li><a class="grb-tag" href="#">Web Development</a></li>
                                    <li><a class="grb-tag" href="#">UI/UX Research</a></li>
                                    <li><a class="grb-tag" href="#">Branding</a></li>
                                    <li><a class="grb-tag" href="#">Website</a></li>
                                    <li><a class="grb-tag" href="#">Web Plans</a></li>
                                </ul>
                            </div>
                            <div class="bs-widget mb-30 bs-ad-container">
                                <div class="bs-ad-inner p-relative">
                                    <div class="bs-ad-inner-content">
                                        <div class="bs-ad-inner-text">
                                            <p>Business<br><span>Advertisement</span></p>
                                            <span>370 x 550</span>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <img src="{{ asset('img/blog/bs-ad.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog area end  -->
        <!-- brand area start  -->
        <div class="brand-area pt-40 pb-100">
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
