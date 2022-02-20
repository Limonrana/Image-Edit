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
                            @if(count($blogs) > 0)
                                @foreach($blogs as $blog)
                                <div class="blog-main-single mb-60">
                                <div class="bms-img mb-30">
                                    <a href="{{ route('store.blog.show', $blog->slug) }}"><img src="{{ asset($blog->image->path) }}" alt="{{ $blog->title }}"></a>
                                </div>
                                <div class="bms-content">
                                    <div class="fix mb-30">
                                        <div class="blog-date bms-date">
                                            <i class="fal fa-calendar-alt"></i>
                                            <span>{{ $blog->created_at->format('d') }}</span>
                                            <p>{{ $blog->created_at->format('M Y') }}</p>
                                        </div>
                                        <div class="bms-title">
                                            <ul class="project-like-view bms-lv">
                                                <li><a href="{{ route('store.blog.show', $blog->slug) }}"><i
                                                            class="fas fa-folder-open"></i>{{ $blog->category->name }}</a></li>
                                                <li><i class="fas fa-comments-alt"></i>45
                                                        Comments</li>
                                                <li><a href="{{ route('store.blog.show', $blog->slug) }}"><i class="fas fa-eye"></i>{{ $blog->views }} Views</a>
                                                </li>
                                            </ul>
                                            <h4><a href="{{ route('store.blog.show', $blog->slug) }}">{{ $blog->title }}</a></h4>
                                        </div>
                                    </div>
                                    <p>{!! \Illuminate\Support\Str::limit($blog->description, 350) !!}</p>
                                    <div class="bms-btn mt-45">
                                        <a href="{{ route('store.blog.show', $blog->slug) }}" class="grb-border-btn st-1">Read More</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                                @include('frontend.components.common.empty-state')
                            @endif
                        </div>
                        <div class="blog-paginate">
                            {{ $blogs->links() }}
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
                                                        <img src="{{ asset($recent_blog->image->path) }}" alt="{{ $recent_blog->title }}">
                                                    </a>
                                                </div>
                                                <div class="bs-post-content">
                                                    <h6><a href="{{ route('store.blog.show', $recent_blog->slug) }}">{{ $recent_blog->title }}</a></h6>
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
                                    <h5>Popular Tags</h5>
                                </div>
                                <ul class="bs-tags">
                                    @if (count($tags) > 0)
                                        @foreach($tags as $tag)
                                            <li><a class="grb-tag" href="#">{{ $tag->name }}</a></li>
                                        @endforeach
                                    @else
                                        <li>
                                            <p>OOPS! Tag is empty!</p>
                                        </li>
                                    @endif
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
                                @foreach($clients as $client)
                                    <div class="swiper-slide">
                                        <div class="single-brand">
                                            <a><img src="{{ asset($client->image->path) }}" alt="{{ $client->name }}"></a>
                                            <a><img src="{{ asset($client->image->path) }}" alt="{{ $client->name }}"></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand area end -->
    </main>
@endsection
