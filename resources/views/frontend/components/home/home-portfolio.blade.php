@php
    $portfolio_section = array_key_exists('home-others-sections', $page_options) ? $page_options['home-others-sections'] : null;
@endphp

<section class="portfolio-area">
    <div class="container">
        <div class="row wow fadeInUp align-items-center counter-head">
            <div class="col-lg-6 col-md-7">
                <div class="portfolio-left">
                    <div class="section-title mb-55">
                        <div class="border-left">
                            <p>{{ $portfolio_section ? $portfolio_section['home_portfolio_subtitle'] : 'Portfolio' }}</p>
                        </div>
                        <h2>{{ $portfolio_section ? $portfolio_section['home_portfolio_title'] : 'Explore some Recent Projects' }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-5">
                <div class="portfolio-right mb-30 text-md-end">
                    <a href="{{ $portfolio_section ? $portfolio_section['home_portfolio_btn_url'] : '/projects' }}" class="grb-border-btn st-1">
                        {{ $portfolio_section ? $portfolio_section['home_portfolio_btn_text'] : 'All Projects' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-container">
        <div class="portfolio-inner">
            <div class="swiper-container portfolio-active">
                <div class="swiper-wrapper">
                    @foreach($projects as $project)
                        <div class="swiper-slide">
                            <div class="single-portfolio">
                                <div class="portfolio-img">
                                    <a href="/projects/{{ $project->slug }}">
                                        <img src="{{ asset($project->featured_image->path) }}" height="309px" alt="{{ $project->title }}">
                                    </a>
                                </div>
                                <div class="portfolio-content">
                                    <h5><a href="/projects/{{ $project->slug }}">{{ $project->title }}</a></h5>
                                    <span>{{ $project->service->title }}</span>
                                    <a class="p-link popup-image" href="{{ asset($project->featured_image->path) }}"><i
                                            class="fal fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="portfolio-nav">
                    <div class="swiper-button-prev"><i class="far fa-arrow-left"></i></div>
                    <div class="swiper-button-next"><i class="far fa-arrow-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</section>
