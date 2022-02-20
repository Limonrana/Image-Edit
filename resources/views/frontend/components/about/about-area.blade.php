@php
    $about_section = array_key_exists('about-about-details', $page_options) ? $page_options['about-about-details'] : null;
    $about_bg_image = array_key_exists('about_about_us_bg_image', $about_section) ? findImagePath($about_section['about_about_us_bg_image']) : null;
@endphp

<section class="about-details pt-140">
    <div class="container">
        <div class="row wow fadeInUp align-items-center">
            <div class="col-lg-6">
                <div class="section-title mb-30">
                    <h2>{{ $about_section ? $about_section['about_about_us_title'] : 'We\'re Leading Digital Business Agency' }}</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-details-right mb-30">
                    <p>{{ $about_section ? $about_section['about_about_us_descriptions'] : 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour. If you are going to use a passage of Lorem Ipsum, you need to be sure.' }}
                    </p>
                </div>
            </div>
        </div>
        <div class="about-details-box mt-30" data-background="
                {{ asset($about_bg_image ? $about_bg_image : 'img/bg/about-details-bg.jpeg') }}">
            <div class="row wow fadeInUp justify-content-end">
                <div class="col-xl-6 col-md-10">
                    <div class="about-details-box-content">
                        <h5>{{ $about_section ? $about_section['about_about_us_box_title'] : 'If you are going to use a passage of Lorem Ipsum, you need to be sure. Compare us between others companies.' }}</h5>
                        <p>{{ $about_section ? $about_section['about_about_us_box_descriptions'] : 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour. If you are going to use a passage of Lorem Ipsum, you need to be sure.' }}</p>
                        <ul class="about-points st-ab">
                            @if(array_key_exists('about_about_us_points', $about_section))
                                @foreach(json_decode($about_section['about_about_us_points'], true) as $about_point)
                                    <li>
                                        <div class="points-heading">
                                            <div class="p-icon">
                                                <i class="{{ $about_point['icon'] }}"></i>
                                            </div>
                                            <h5>{{ $about_point['title'] }}</h5>
                                        </div>
                                        <p>{{ $about_point['description'] }}</p>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
