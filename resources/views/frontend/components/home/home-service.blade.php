@php
    $service_section = array_key_exists('home-service', $page_options) ? $page_options['home-service'] : null;
@endphp

<section class="service__area grey-bg pt-120 pb-90">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-lg-6">
                <div class="section-title mb-55">
                    <div class="border-left">
                        <p>{{ $service_section ? $service_section['home_service_subtitle'] : 'Our Services' }}</p>
                    </div>
                    <h2>{{ $service_section ? $service_section['home_service_title'] : 'Our Best Services' }}</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service__text mb-30">
                    <p>{{ $service_section ? $service_section['home_service_description'] : 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour. If you are going to use a passage of Lorem Ipsum.' }}</p>
                </div>
            </div>
        </div>
        <div class="row wow fadeInUp">
            @foreach($selected_services as $service)
                <div class="col-lg-4 col-md-6">
                    <div class="single__service text-center mb-30">
                                <span class="service__icon">
                                    <a href="{{ $service->slug ? '/services/'.$service->slug : '/services' }}"><i class="{{ $service->icon ? $service->icon : 'flaticon-idea' }}"></i></a>
                                </span>
                        <h4><a href="{{ $service->slug ? '/services/'.$service->slug : '/services' }}">{{ $service->title ? $service->title : 'Financial Planning' }}</a></h4>
                        <p>{!! $service->description ? \Illuminate\Support\Str::limit($service->description, 100) : 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.' !!}</p>
                        <a href="{{ $service->slug ? '/services/'.$service->slug : '/services' }}" class="service__btn">
                            <i class="fas fa-plus"></i>Read More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
