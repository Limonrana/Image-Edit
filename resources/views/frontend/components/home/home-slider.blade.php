@php
    $sliders = array_key_exists('home-slider', $page_options) ? $page_options['home-slider'] : [];
@endphp

<section class="slider-area p-relative fix">
    <div class="slider-active swiper-container">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
                <div class="single-slider slider-height swiper-slide slider-overlay" data-swiper-autoplay="5000">
                <div class="slide-bg" data-background="{{ asset(findImagePath($slider['banner_image'])) }}"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="hero-content">
                                <div class="hero-bg-shape" data-animation="fadeInUp" data-delay=".3s">
                                    <div class="hero-s-1">
                                        <img src="{{ asset(array_key_exists('shape_image', $slider) ? findImagePath($slider['shape_image']) : 'img/shape/hero-s-1.png') }}" alt="">
                                    </div>
                                    <div class="hero-s-2">
                                        <img src="{{ asset('img/shape/hero-s-2.png') }}" alt="">
                                    </div>
                                </div>
                                <p data-animation="fadeInUp" data-delay=".6s">{{ $slider['subtitle'] }}</p>
                                <h1 data-animation="fadeInUp" data-delay=".9s">{{ $slider['title'] }}</h1>
                                <div class="hero-content-btn" data-animation="fadeInUp" data-delay="1.1s">
                                    <a href="{{ $slider['btn_url'] }}" class="grb-btn">{{ $slider['btn_text'] }}</a>
                                </div>
                                <div class="hero-video-btn" data-animation="fadeInUp" data-delay="1.2s">
                                    <a class="grb-video popup-video" href="{{ $slider['video_btn_url'] }}" style="background: {{ $slider['video_btn_bg_color'] }};"><i class="fas fa-play" style="color: {{ $slider['video_btn_icon_color'] }};"></i></a>
                                    <p style="color: {{ $slider['video_btn_bg_color'] }};">{{ $slider['video_btn_text'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- If we need navigation buttons -->
        <div class="slider-nav">
            <div class="swiper-button-prev"><i class="far fa-arrow-left"></i></div>
            <div class="swiper-button-next"><i class="far fa-arrow-right"></i></div>
        </div>
    </div>
</section>

@section('styles')
    <style>
        .hero-content-btn .grb-btn {
            background: {{ $slider['btn_bg_color'] }};
            color: {{ $slider['btn_text_color'] }};
        }

        .hero-content-btn .grb-btn:hover {
            background: {{ $slider['btn_bg_hover_color'] }};
            color: {{ $slider['btn_text_color'] }};
        }
    </style>
@endsection
