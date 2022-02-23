@extends('frontend.layout.layout')

@section('site_title', $blog->title.' - Car Image Editing | Digital Agency')
@section('meta_title', $blog->meta_title ?? $blog->meta_title ?? 'Single Blog - Car Image Editing | Digital Agency')
@section('meta_keywords', $blog->meta_keywords ? implode(',', json_decode($blog->meta_keywords, true)) : null)
@section('meta_description', $blog->meta_description ??  $blog->meta_description)

@section('content')
    <main>
        <!-- page title area start  -->
        <section class="page-title-area" data-background="{{ asset($blog->image->path) }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title-content text-center">
                            <div class="page-title-heading">
                                <h1>{{ $blog->title }}</h1>
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
                                                    @if($previous !== null)
                                                        <span>Previous Article</span>
                                                        <h6><a href="{{ route('store.blog.show', $previous->slug) }}">{{ $previous->title }}</a></h6>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="article-nav-content next-article pl-100">
                                                    @if($next !== null)
                                                        <span>Next Article</span>
                                                        <h6><a href="{{ route('store.blog.show', $next->slug) }}">{{ $next->title }}</a></h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="comments" class="post-comments">
                                        <div class="post-comment-title mb-40">
                                            <h3>{{ count($comments) > 1 ? count($comments).' Comments' : count($comments).' Comment' }}</h3>
                                        </div>
                                        @if(count($comments) > 0)
                                            <div class="latest-comments">
                                                <ul>
                                                    @foreach($comments as $comment)
                                                        <li>
                                                            <div class="comments-box">
                                                                <div class="comments-avatar">
                                                                    <img src="{{ asset($comment->customer_id ? $comment->user->profile_photo_url : 'https://ui-avatars.com/api/?name='.$comment->name.'&color=7F9CF5&background=EBF4FF') }}" alt="{{ $comment->name }}" style="min-width: 75px;">
                                                                </div>
                                                                <div class="comments-text">
                                                                    <div class="avatar-name">
                                                                        <h5>{{ $comment->name }}</h5>
                                                                        <span class="post-date ">{{ $comment->created_at->format('d M, Y') }}</span>
                                                                        <span class="post-time ">{{ $comment->created_at->format('h:i A') }}</span>
                                                                    </div>
                                                                    <p>{{ $comment->comment }}</p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="post-comment-form mb-30">
                                        <h4>Leave a Comment </h4>
                                        <form action="{{ route('store.blog.comment', $blog->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="customer_id" value="{{ auth()->id() }}">
                                            <div class="row">
                                                @if(auth()->check())
                                                    <input type="hidden" name="name" value="{{ auth()->user()->name }}" placeholder="Name">
                                                @else
                                                    <div class="col-xl-6">
                                                        <div class="post-input">
                                                                <input type="text" name="name" placeholder="Name">
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(auth()->check())
                                                    <input type="hidden" name="email" value="{{ auth()->user()->email }}" placeholder="Email">
                                                @else
                                                    <div class="col-xl-6">
                                                        <div class="post-input">
                                                                <input type="text" name="email" placeholder="Email">
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-xl-12">
                                                    <div class="post-input">
                                                        <textarea name="comment" id="message" placeholder="Comment...."></textarea>
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
                    @include('frontend.components.blog.sidebar')
                </div>
            </div>
        </div>
        <!-- blog area end  -->
        <!-- brand area start  -->
        @include('frontend.components.blog.brand-area')
        <!-- brand area end -->
    </main>
@endsection
