@php
    $counter_section = array_key_exists('home-achievement', $page_options) ? $page_options['home-achievement'] : null;
    $home_achievement_background_image  = array_key_exists('home_achievement_background_image', $counter_section) ? findImagePath($counter_section['home_achievement_background_image']) : null;
    $home_achievement_banner_image      = array_key_exists('home_achievement_banner_image', $counter_section) ? findImagePath($counter_section['home_achievement_banner_image']) : null;
@endphp

<section class="counter__area pt-110 pb-90" data-background="{{ asset($home_achievement_background_image ? $home_achievement_background_image : 'img/bg/counter-bg.jpg') }}">
    <div class="container">
        <div class="row wow fadeInUp align-items-center counter-head">
            <div class="col-lg-9 col-md-8">
                <div class="counter-left">
                    <div class="section-title mb-60">
                        <h2 class="white-color ">{{ $counter_section ? $counter_section['home_achievement_contact_title'] : 'Do You Have Any Projects in Your Mind?' }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="counter-right mb-30">
                    <a href="{{ $counter_section ? $counter_section['home_achievement_contact_btn_url'] : '/contact' }}" class="grb-border-btn">
                        {{ $counter_section ? $counter_section['home_achievement_contact_btn_text'] : 'Contact Us' }}
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
                                <h2>{{ $counter_section ? $counter_section['home_achievement_title'] : 'We Achieved Honor Experiences in Last' }} <span>{{ $counter_section ? $counter_section['home_achievement_experience'] : '25+' }} Years</span></h2>
                            </div>
                            <p>{{ $counter_section ? $counter_section['home_achievement_description'] : 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some passage.' }}</p>
                            <ul class="counter-items">
                                @if(array_key_exists('home_achievement_counters', $counter_section))
                                    @foreach(json_decode($counter_section['home_achievement_counters'], true) as $counter)
                                        <li class="single-counter">
                                            <div class="single-counter-icon">
                                                <i class="{{ $counter['icon'] ? $counter['icon'] : 'flaticon-crm' }}"></i>
                                            </div>
                                            <div class="single-counter-text">
                                                <h3>{{ $counter['value'] ? $counter['value'] : '50K+' }}</h3>
                                                <p>{{ $counter['title'] ? $counter['title'] : 'Happy Clients' }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="counter-content-right text-end mb-30">
                            <div class="counter-right-img">
                                <div class="dot-dot">
                                    <img src="{{ asset('img/shape/dot-dot.png') }}" alt="">
                                </div>
                                <img src="{{ asset($home_achievement_banner_image ? $home_achievement_banner_image : 'img/bg/counter-right-img.png') }}" alt="">
                                <div class="experience-text">
                                    <p><span>{{ $counter_section ? $counter_section['home_achievement_experience'] : '25+' }}</span>Years
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
