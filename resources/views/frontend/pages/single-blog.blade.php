@extends('frontend.layout.layout')

@section('site_title', $blog->title.' - Car Image Editing | Digital Agency')

@section('content')
    <main>
        <!-- page title area start  -->
        <section class="page-title-area" data-background="{{ asset($blog->image->path) }}">
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
                                    <img src="{{ asset($blog->image->path) }}" alt="{{ $blog->title }}">
                                </div>
                                <div class="bms-content">
                                    <div class="fix mb-30">
                                        <div class="blog-date bms-date">
                                            <i class="fal fa-calendar-alt"></i>
                                            <span>{{ $blog->created_at->format('d') }}</span>
                                            <p>{{ $blog->created_at->format('M Y') }}</p>
                                        </div>
                                        <div class="bms-title">
                                            <ul class="project-like-view bms-lv bm-details">
                                                <li><i class="fas fa-calendar-alt"></i>{{ $blog->created_at->format('d M Y') }}</li>
                                                <li><i class="fas fa-folder-open"></i>{{ $blog->category->name }}</li>
                                                <li><i class="fas fa-comments-alt"></i>45 Comments</li>
                                                <li><i class="fas fa-eye"></i>{{ $blog->views }} Views</li>
                                            </ul>
                                            <h4>{{ $blog->title }}</h4>
                                        </div>
                                    </div>
                                    <p>{!! $blog->description !!}</p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="bms-tags">
                                                <span>Tags :</span>
                                                @foreach($blog->tags as $key => $tag)
                                                    <a href="#">{{ $tag->name }}@if(count($blog->tags) !== $key+1),@endif</a>
                                                @endforeach
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
                                    @if (count($categories) > 0)
                                        @foreach($categories as $category)
                                            <li>
                                                <a href="#">
                                                    <p>{{ $category->name }}</p><span>({{ count($category->posts) }})</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <li>
                                            <p>OOPS! Category is empty!</p>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="bs-widget mb-30">
                                <div class="bs-widget-title mb-40">
                                    <h5>Recent Posts</h5>
                                </div>
                                <ul class="bs-post">
                                    @if (count($recent_blogs) > 0)
                                        @foreach($recent_blogs as $recent_blog)
                                            <li class="bs-post-single">
                                                <div class="bs-post-img">
                                                    <a href="{{ route('store.blog.show', $recent_blog->slug) }}">
                                                        <img src="{{ asset($recent_blog->image->path) }}" style="height: 70px; width: 100%;" alt="{{ $recent_blog->title }}">
                                                    </a>
                                                </div>
                                                <div class="bs-post-content">
                                                    <h6><a href="{{ route('store.blog.show', $recent_blog->slug) }}">{{ \Illuminate\Support\Str::limit($recent_blog->title, 40) }}</a></h6>
                                                    <span>{{ $recent_blog->created_at->format('d M Y') }} </span>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="bs-post-single">
                                            <div class="bs-post-content">
                                                <h6>OOPS! Recent post is empty!</h6>
                                            </div>
                                        </li>
                                    @endif
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
