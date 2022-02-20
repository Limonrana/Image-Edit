@php
    $review_section = array_key_exists('home-others-sections', $page_options) ? $page_options['home-others-sections'] : null;
@endphp

<section class="testimonial-area st-1" data-background="{{ asset('img/bg/bg-shape.png') }}">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-lg-12">
                <div class="section-title mb-55 text-center">
                    <div class="border-c-bottom">
                        <p>{{ $review_section ? $review_section['home_testimonial_subtitle'] : 'Testimonials' }}</p>
                    </div>
                    <h2>{{ $review_section ? $review_section['home_testimonial_title'] : 'Some Expression Of Our Clients' }}</h2>
                </div>
            </div>
        </div>
        <div class="row wow fadeInUp justify-content-center">
            <div class="col-lg-10">
                <div class="testimonial-wrapper p-relative">
                    <div class="testimonial-content-inner">
                        <div class="swiper-container testimonial-active">
                            <div class="swiper-wrapper">
                                @foreach($reviews as $review)
                                    <div class="swiper-slide">
                                    <div class="testimonial-single st-1 text-center">
                                        <div class="testimonial-img">
                                            <img src="{{ asset($review->image->path) }}" alt="{{ $review->name }}">
                                        </div>
                                        <p class="mb-30">{{ $review->comment }}</p>
                                        <div class="testimonial-name">
                                            <h5>{{ $review->name }}</h5>
                                            <p>{{ $review->position }}, {{ $review->company }}</p>
                                        </div>
                                        <ul class="testimonial-review">
                                            @php
                                                $rating = $review->rating;
                                                $muted_stars = 5 - $rating;
                                            @endphp
                                            @for($i = 1; $i <= $rating; $i++)
                                                <li><i class="fas fa-star"></i></li>
                                            @endfor
                                            @for($i = 1; $i <= $muted_stars; $i++)
                                                <li><i class="far fa-star"></i></li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
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
