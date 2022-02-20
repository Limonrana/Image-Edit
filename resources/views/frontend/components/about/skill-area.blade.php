@php
    $about_skill_section = array_key_exists('about-about-details', $page_options) ? $page_options['about-about-details'] : null;
@endphp

<section class="skill-area pt-110 pb-85">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-lg-6">
                <div class="about__content mb-30">
                    <div class="section-title mb-30">
                        <h2>{{ $about_skill_section ? $about_skill_section['about_about_skill_title'] : 'We Have achieved Experiences & Skills' }}</h2>
                    </div>
                    <div class="ab-experience st-3">
                        <div class="ab-experience-content">
                            <div class="ab-experience-icon">
                                <i class="flaticon-trophy"></i>
                            </div>
                            <div class="ab-experience-text">
                                <p><span>{{ $about_skill_section ? $about_skill_section['about_about_skill_experience'] : '25+' }}</span>Years
                                    Experiences</p>
                            </div>
                        </div>
                    </div>
                    <p>{{ $about_skill_section ? $about_skill_section['about_about_skill_descriptions'] : 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour. If you are going to use a passage of Lorem Ipsum, you need to be sure.' }}</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="grb-skill mt-45 ml-20 mr-10">
                    @if(array_key_exists('about_about_us_skills', $about_skill_section))
                        @foreach(json_decode($about_skill_section['about_about_us_skills'], true) as $skill)
                            <div class="skill-wrapper">
                                <div class="skill-title">
                                    <h5 class="skill-category">{{ $skill['name'] }}</h5>
                                    <span>{{ $skill['value'] }}%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar wow slideInLeft" role="progressbar" style="width: {{ $skill['value'] }}%"
                                         aria-valuenow="{{ $skill['value'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
