@php
    $about_counter_section = array_key_exists('about-about-details', $page_options) ? $page_options['about-about-details'] : null;
@endphp

<div class="counter-board-area" data-background="{{ asset('img/bg/counter-board-bg.jpg') }}">
    <div class="container">
        <div class="row wow fadeInUp counter-board-content">
            @if(array_key_exists('about_about_us_counters', $about_counter_section))
                @foreach(json_decode($about_counter_section['about_about_us_counters'], true) as $counter)
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-board-single mb-40">
                            <i class="{{ $counter['icon'] }}"></i>
                            <div class="counter-board-number">{{ $counter['value'] }}</div>
                            <p>{{ $counter['title'] }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
