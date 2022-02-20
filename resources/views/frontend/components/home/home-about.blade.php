@php
    $about_section = array_key_exists('home-about', $page_options) ? $page_options['home-about'] : null;
    $home_about_lg_banner_image = array_key_exists('home_about_lg_banner_image', $about_section) ? findImagePath($about_section['home_about_lg_banner_image']) : null;
    $home_about_sm_banner_image = array_key_exists('home_about_sm_banner_image', $about_section) ? findImagePath($about_section['home_about_sm_banner_image']) : null;
    $home_about_award_image = array_key_exists('home_about_award_image', $about_section) ? findImagePath($about_section['home_about_award_image']) : null;
@endphp

<section class="about__area">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-xl-6 col-lg-5">
                <div class="about__img p-relative mb-30">
                    <div class="about__img-inner">
                        <img src="{{ asset($home_about_lg_banner_image ? $home_about_lg_banner_image : 'img/about/about.jpg') }}" alt="">
                    </div>
                    <div class="p-element">
                        <div class="ab-border d-none d-lg-block" style="border: {{ $about_section ? $about_section['home_about_border_width'] : '20px solid' }} {{ $about_section ? $about_section['home_about_border_color'] : '#ffc400' }};"></div>
                        <div class="award">
                            <img src="{{ asset($home_about_award_image ? $home_about_award_image : 'img/icon/batch.png') }}" alt="">
                            <p>{{ $about_section ? $about_section['home_about_award_title'] : 'WON\'T the Business Gainer Awards' }}</p>
                        </div>
                        <div class="ab-image">
                            <img src="{{ asset($home_about_sm_banner_image ? $home_about_sm_banner_image : 'img/about/abp-img.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <div class="about__content mb-30">
                    <div class="section-title mb-30">
                        <div class="border-left">
                            <p>{{ $about_section ? $about_section['home_about_subtitle'] : 'About Company' }}</p>
                        </div>
                        <h2>{{ $about_section ? $about_section['home_about_title'] : 'We\'re Leading Digital Business Agency' }}</h2>
                    </div>
                    <p>{{ $about_section ? $about_section['home_about_description'] : 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.' }}</p>
                    <ul class="about-points">
                        <li>
                            <div class="points-heading">
                                <div class="p-icon">
                                    <i class="{{ $about_section ? $about_section['home_about_point_icon_1'] : 'flaticon-team' }}"></i>
                                </div>
                                <h5>{{ $about_section ? $about_section['home_about_point_title_1'] : 'One Stop Business' }}</h5>
                            </div>
                            <p>{{ $about_section ? $about_section['home_about_point_description_1'] : 'There are many variations of passages of Lorem Ipsum available.' }}</p>
                        </li>
                        <li>
                            <div class="points-heading">
                                <div class="p-icon">
                                    <i class="{{ $about_section ? $about_section['home_about_point_icon_2'] : 'flaticon-creative-team' }}"></i>
                                </div>
                                <h5>{{ $about_section ? $about_section['home_about_point_title_2'] : 'One Stop Business' }}</h5>
                            </div>
                            <p>{{ $about_section ? $about_section['home_about_point_description_2'] : 'There are many variations of passages of Lorem Ipsum available.' }}</p>
                        </li>
                    </ul>
                    <div class="about__btn st-1">
                        <a href="{{ $about_section ? $about_section['home_about_btn_url'] : '/about' }}" class="grb-btn st-1">{{ $about_section ? $about_section['home_about_btn_text'] : 'Read more' }}<i class="{{ $about_section ? $about_section['home_about_btn_icon'] : 'fas fa-arrow-right' }}"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
