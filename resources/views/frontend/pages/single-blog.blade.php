@extends('frontend.layout.layout')

@section('site_title', 'Single Blog - Car Image Editing | Digital Agency')

@section('content')
    <main>
        <!-- page title area start  -->
        <section class="page-title-area" data-background="{{ asset('img/bg/page-title-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title-content text-center">
                            <div class="page-title-heading">
                                <h1>Blog Single</h1>
                            </div>
                            <nav class="grb-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('store.home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('store.blogs') }}">Blogs</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog Single</li>
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
                            <div class="blog-main-single bm-details">
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
                                            <ul class="project-like-view bms-lv bm-details">
                                                <li><i class="fas fa-calendar-alt"></i>20 Jun 2021</li>
                                                <li><i class="fas fa-folder-open"></i>Business</li>
                                                <li><i class="fas fa-comments-alt"></i>45 Comments</li>
                                                <li><i class="fas fa-eye"></i>546 Views</li>
                                            </ul>
                                            <h4>6 ways you can make your design more inclusive and equitable</h4>
                                        </div>
                                    </div>
                                    <p>Apple today named eight app and game developers receiving an Apple Design Award,
                                        each one selected for being thoughtful
                                        and creative. Apple Design Award winners bring distinctive new ideas to life and
                                        demonstrate deep mastery of Apple
                                        technology. The apps spring up from developers large and small, in every part of
                                        the world and provide users with new
                                        ways of working, creating, and playing.</p>
                                    <div class="bm-details-quote p-relative">
                                        <div class="bm-details-quote-icon">
                                            <i class="fas fa-quote-left i-q-1"></i>
                                            <i class="fas fa-quote-right i-q-2"></i>
                                        </div>
                                        <p>I must explain to you how all this mistake idea denouncing to be pleasured
                                            and praising pain was born and I will give a
                                            complete account of the system, and expound the actual teachings of the
                                            great explorer of the truth.</p>
                                        <h4>Robert D Silva</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <img class="mb-25" src="{{ asset('img/blog/bm-d-p.jpg') }}" alt="">
                                        </div>
                                        <div class="col-xl-6">
                                            <p class="mb-25">Apple today named eight app and game developers receiving
                                                an Apple Design
                                                Award, each one selected for being thoughtful
                                                and creative. Apple Design Award winners bring distinctive new ideas to
                                                life and demonstrate deep mastery of Apple
                                                technology. The apps spring up from developers large and small, in every
                                                part of the world and provide users with new
                                                ways of working, creating, and playing.</p>
                                            <p>Hospitals and morgues in New York are struggling to cope with the
                                                pandemic, and New York Governor Andrew Cuomo has
                                                warned that New York risks running out of ventilators for patients in
                                                six days. Masks may also help lower the risk of
                                                individuals catching the virus through the droplets from another
                                                person’s sneeze or a cough - and people can be taught
                                                how put masks on and take them off correctly.</p>
                                        </div>
                                    </div>
                                    <p class="">However, More and more health experts now say there are benefits.
                                        They argue that
                                        the public use of masks can primarily
                                        help by preventing asymptomatic patients - people who have been infected with
                                        Covid-19 but are not aware, and not
                                        displaying any symptoms - from unknowingly spreading the virus to others.</p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="bms-tags">
                                                <span>Tags :</span>
                                                <a href="#">business,</a>
                                                <a href="#">web learning,</a>
                                                <a href="#">solution,</a>
                                                <a href="#">entrepreneur</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="bms-share f-right">
                                                <span><i class="fal fa-share-alt"></i>Share :</span>
                                                <div class="grb__social bms-social">
                                                    <ul>
                                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="article-nav">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="article-nav-content pr-100">
                                                    <span>Previous Article</span>
                                                    <h6><a href="blog-details.html">What Do I Need to Make It in the
                                                            World of Business?</a></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="article-nav-content next-article pl-100">
                                                    <span>Next Article</span>
                                                    <h6><a href="blog-details.html">If You Only Knew How Much Your
                                                            Outfit Choices Actually Matter</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="comments" class="post-comments">
                                        <div class="post-comment-title mb-40">
                                            <h3>3 Comments</h3>
                                        </div>
                                        <div class="latest-comments">
                                            <ul>
                                                <li>
                                                    <div class="comments-box">
                                                        <div class="comments-avatar">
                                                            <img src="{{ asset('img/blog/comment/avatar-1.jpg') }}" alt="">
                                                        </div>
                                                        <div class="comments-text">
                                                            <div class="avatar-name">
                                                                <h5>Ronjit Chandra Ukil</h5>
                                                                <span class="post-date ">28 March, 2021</span>
                                                                <span class="post-time ">10:21 am</span>
                                                            </div>
                                                            <p>I believe everyone should have the opportunity to create
                                                                the progress through the technology and develop the
                                                                skills.
                                                                Luxury home prices in Sydney declined for the first time
                                                                in years slipping between the second quarter.</p>
                                                            <a href="#" class="comment-reply"> <i
                                                                    class="fas fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="children">
                                                    <div class="comments-box">
                                                        <div class="comments-avatar">
                                                            <img src="{{ asset('img/blog/comment/avatar-2.jpg') }}" alt="">
                                                        </div>
                                                        <div class="comments-text">
                                                            <div class="avatar-name">
                                                                <h5>Imitiaz Ahmed Belal</h5>
                                                                <span class="post-date ">28 March, 2021</span>
                                                                <span class="post-time ">10:21 am</span>
                                                            </div>
                                                            <p>This is a static content section widget. It is a handy
                                                                way to show an additional content at the widgetized
                                                                page. The
                                                                static content section widget outputs the contents of a
                                                                selected static page.</p>
                                                            <a href="#" class="comment-reply"><i
                                                                    class="fas fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="">
                                                    <div class="comments-box">
                                                        <div class="comments-avatar">
                                                            <img src="{{ asset('img/blog/comment/avatar-3.jpg') }}" alt="">
                                                        </div>
                                                        <div class="comments-text">
                                                            <div class="avatar-name">
                                                                <h5>Nasir Uddin</h5>
                                                                <span class="post-date ">28 March, 2021</span>
                                                                <span class="post-time ">10:21 am</span>
                                                            </div>
                                                            <p>Blue Bottle narwhal tote bag pork belly, sriracha
                                                                leggings messenger bag slow-carb. Kale chips wayfarers
                                                                Banksy keytar 3
                                                                wolf moon. Helvetica sartorial ennui Anderson salvia,
                                                                pork belly selvage brunch squid.</p>
                                                            <a href="#" class="comment-reply"><i
                                                                    class="fas fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="post-comment-form mb-30">
                                        <h4>Leave a Comment </h4>
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="post-input">
                                                        <input type="text" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="post-input">
                                                        <input type="text" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="post-input">
                                                        <textarea name="message" id="message"
                                                                  placeholder="Comment...."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="grb-btn comment-btn">COMMENT</button>
                                        </form>
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
        <div class="brand-area pt-70 pb-100">
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
