@php
    $footer_option = null;
    $footer_logo = null;
    $top_header = null;
    $social_account = null;
    if (appearance('footer')) {
        $footer_option = json_decode(appearance('footer')->option_value, true);
        if (array_key_exists('footer_logo', json_decode(appearance('footer')->option_value, true))) {
            $logo_id = json_decode(appearance('footer')->option_value, true)['footer_logo'];
            $upload = \App\Models\Upload::find($logo_id);
            if (isset($upload) OR count($upload) > 0) {
                $footer_logo = $upload->path;
            }
        }
    }
    if (appearance('header')) {
        $top_header = json_decode(appearance('header')->option_value, true);
    }
    if (appearance('social-account')) {
        $social_account = json_decode(appearance('social-account')->option_value, true);
    }

    // All Navigation

    $footer_left_navigation = null;
    $find_footer_left_navigation = appearance('left-footer');
    if ($find_footer_left_navigation) {
        $footer_left_navigation = json_decode($find_footer_left_navigation->option_value, true);
    }

    $footer_right_navigation = null;
    $find_footer_right_navigation = appearance('right-footer');
    if ($find_footer_right_navigation) {
        $footer_right_navigation = json_decode($find_footer_right_navigation->option_value, true);
    }

    $footer_bottom_navigation = null;
    $find_footer_bottom_navigation = appearance('bottom-footer');
    if ($find_footer_bottom_navigation) {
        $footer_bottom_navigation = json_decode($find_footer_bottom_navigation->option_value, true);
    }
@endphp

<!-- newsletter area start  -->
<div class="newsletter-area">
    <div class="container">
        <div class="row wow fadeInUp align-items-center">
            <div class="col-lg-6">
                <div class="newsletter-text mb-30">
                    <h4>{{ $footer_option ? $footer_option['newsletter_title'] : 'Subscribe Us For Newsletter' }}</h4>
                    <p>
                        {{ $footer_option ? $footer_option['newsletter_description'] : 'All the Lorem Ipsum generators on the Internet tend to repeat predefined the Newsletter' }}
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <form class="subscribe-form mb-30" action="{{ route('store.subscribe') }}" method="POST">
                    @csrf
                    <input type="text" placeholder="Enter your email..." name="email" class="@error('email') is-invalid @enderror">
                    <button type="submit" style="background: {{ $footer_option ? $footer_option['newsletter_btn_bg'] : '#6639ff' }}">
                        <i class="fas fa-paper-plane"></i>{{ $footer_option ? $footer_option['newsletter_btn_text'] : 'Subscribe Us' }}
                    </button>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </form>
            </div>
        </div>
    </div>
</div>
<!-- newsletter area end -->

<!-- footer area start  -->
<footer>
    <section class="footer-area pt-80 pb-40">
        <div class="container">
            <div class="row wow fadeInUp">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget mb-40">
                        <div class="question-area">
                            <div class="question-icon">
                                <i class="flaticon-support"></i>
                            </div>
                            <div class="question-text">
                                <p>Have a question? Call us 24/7</p>
                                <span>
                                    <a href="tel:{{ $top_header ?  $top_header['top_bar_phone'] : '(555) 674 890 556' }}">
                                        {{ $top_header ?  $top_header['top_bar_phone'] : '(555) 674 890 556' }}
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="footer-address">
                            <h5>Contact Info</h5>
                            <p>{{ $footer_option ? $footer_option['footer_contact_info'] : 'Street House, Greater London NW1 8JR, UK' }}</p>
                        </div>
                        <div class="grb__social footer-social">
                            <ul>
                                <li>
                                    <a style="background: {{ $footer_option ? $footer_option['footer_social_btn_bg'] : '#6639ff' }}; color: {{ $footer_option ? $footer_option['footer_social_btn_color'] : '#fff' }};"
                                       href="{{ $social_account ? $social_account['social_fb_url'] : '#' }}" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a style="background: {{ $footer_option ? $footer_option['footer_social_btn_bg'] : '#6639ff' }}; color: {{ $footer_option ? $footer_option['footer_social_btn_color'] : '#fff' }};"
                                        href="{{ $social_account ? $social_account['social_twitter_url'] : '#' }}" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a style="background: {{ $footer_option ? $footer_option['footer_social_btn_bg'] : '#6639ff' }}; color: {{ $footer_option ? $footer_option['footer_social_btn_color'] : '#fff' }};"
                                       href="{{ $social_account ? $social_account['social_instagram_url'] : '#' }}" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a style="background: {{ $footer_option ? $footer_option['footer_social_btn_bg'] : '#6639ff' }}; color: {{ $footer_option ? $footer_option['footer_social_btn_color'] : '#fff' }};"
                                       href="{{ $social_account ? $social_account['social_linkedin_url'] : '#' }}" target="_blank">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget mb-40 cat-m">
                        <div class="footer-widget-title">
                            <h4>Categories</h4>
                        </div>
                        <ul class="footer-list">
                            @foreach($footer_left_navigation as $footer_left_navigation_item)
                                <li>
                                    <a href="{{ $footer_left_navigation_item['page'] }}">
                                        {{ $footer_left_navigation_item['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-widget-title">
                            <h4>About Company</h4>
                        </div>
                        <ul class="footer-list">
                            @foreach($footer_right_navigation as $footer_right_navigation_item)
                                <li>
                                    <a href="{{ $footer_right_navigation_item['page'] }}">
                                        {{ $footer_right_navigation_item['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget mb-40 srv-m">
                        <div class="footer-widget-title">
                            <h4>About Company</h4>
                        </div>
                        <p>{{ $footer_option ? $footer_option['footer_about_us'] : 'All the Lorem Ipsum generators on the Internet tend to repeat predefined the about company' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="copyright-area">
        <div class="container">
            <div class="row wow fadeInUp align-items-center">
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="copyright-logo logo-shape">
                        <a href="{{ route('store.home') }}">
                            <img src="{{ asset($footer_logo ? $footer_logo : 'img/logo/logo-white.png') }}" alt="logo-white" width="{{ $footer_option ? $footer_option['footer_logo_width'] : '' }}" height="{{ $footer_option ? $footer_option['footer_logo_height'] : '' }}">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="copyright-text">
                        <p>{{ $footer_option ? $footer_option['footer_copyright'] : 'Copyrighted by @Web Soft King LTD. | All Right Reserved' }}</p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <ul class="copyright-list f-right">
                        @foreach($footer_bottom_navigation as $footer_bottom_navigation_item)
                            <li>
                                <a href="{{ $footer_bottom_navigation_item['page'] }}">
                                    {{ $footer_bottom_navigation_item['title'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->
