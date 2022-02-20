@php
    $choosing_section = array_key_exists('home-choose-us', $page_options) ? $page_options['home-choose-us'] : null;
    $home_choose_us_banner_image = array_key_exists('home_choose_us_banner_image', $choosing_section) ? findImagePath($choosing_section['home_choose_us_banner_image']) : null;
@endphp

<section class="choosing__area pt-120 pb-90">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-lg-6">
                <div class="choosing__img mb-30">
                    <img src="{{ asset($home_choose_us_banner_image ? $home_choose_us_banner_image : 'img/about/choosing.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-title mb-55">
                    <div class="border-left">
                        <p>{{ $choosing_section ? $choosing_section['home_choose_us_subtitle'] : 'Why Choose Us' }}</p>
                    </div>
                    <h2>{{ $choosing_section ? $choosing_section['home_choose_us_title'] : 'We Execute Our Ideas from Start to Finish' }}</h2>
                </div>
                <div class="choosing__information mb-30">
                    <ul>
                        @if($choosing_section)
                            @foreach(json_decode($choosing_section['home_choose_us_info'], true) as $key => $choose_us_list)
                                <li>
                                    <div class="choosing__number">
                                        <span>0{{ $key + 1 }}</span>
                                    </div>
                                    <div class="choosing__text">
                                        <h5>{{ $choose_us_list['title'] }}</h5>
                                        <p>{{ $choose_us_list['description'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li>
                            <div class="choosing__number">
                                <span>01</span>
                            </div>
                            <div class="choosing__text">
                                <h5>Gathering Information</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusod tempor
                                    idunt ut labore dolore magna aliqua koiern
                                    koiners</p>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
