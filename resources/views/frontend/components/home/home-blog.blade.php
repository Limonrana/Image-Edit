@php
    $blog_section = array_key_exists('home-others-sections', $page_options) ? $page_options['home-others-sections'] : null;
@endphp

<section class="blog-area grey-bg pt-120 pb-90">
    <div class="container">
        <div class="row wow fadeInUp align-items-center counter-head">
            <div class="col-lg-6 col-md-8">
                <div class="blog-left">
                    <div class="section-title mb-55">
                        <div class="border-left">
                            <p>{{ $blog_section ? $blog_section['home_blog_subtitle'] : 'Blog Posts' }}</p>
                        </div>
                        <h2>{{ $blog_section ? $blog_section['home_blog_title'] : 'Our Recent Blogs' }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="blog-right mb-30 f-right">
                    <a href="{{ $blog_section ? $blog_section['home_blog_btn_url'] : '/blogs' }}" class="grb-btn">{{ $blog_section ? $blog_section['home_blog_btn_text'] : 'Read More' }}</a>
                </div>
            </div>
        </div>
        <div class="row wow fadeInUp">
            @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                <div class="blog-single mb-30 p-relative">
                    <div class="blog-date">
                        <div class="blog-date-shape">
                            <img src="{{ asset('img/shape/blog-date-shape.png') }}" alt="">
                        </div>
                        <i class="fal fa-calendar-alt"></i>
                        <span>{{ $blog->created_at->format('d') }}</span>
                        <p>{{ $blog->created_at->format('M Y') }}</p>
                    </div>
                    <div class="blog-img">
                        <a href="{{ '/blogs/'.$blog->slug }}"><img src="{{ asset($blog->image->path) }}" alt="{{ $blog->title }}"></a>
                    </div>
                    <div class="blog-content">
                        <h4><a href="{{ '/blogs/'.$blog->slug }}">{{ \Illuminate\Support\Str::limit($blog->title, 63) }}</a></h4>
                        <p>{!! \Illuminate\Support\Str::limit($blog->description, 150) !!}</p>
                        <a href="{{ '/blogs/'.$blog->slug }}" class="read-btn">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
