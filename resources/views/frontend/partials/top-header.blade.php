@php
    $top_header = null;
    $social_account = null;
    if (appearance('header')) {
        $top_header = json_decode(appearance('header')->option_value, true);
    }
    if (appearance('social-account')) {
        $social_account = json_decode(appearance('social-account')->option_value, true);
    }
@endphp

<div class="header__top d-none d-md-block">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-9">
                <div class="grb__cta header-cta">
                    <ul>
                        <li>
                            <div class="cta__icon">
                                <span><i class="fas fa-phone-alt"></i></span>
                            </div>
                            <div class="cta__content">
                                <p>Call Us:</p>
                                <span>
                                    <a href="tel:{{ $top_header ?  $top_header['top_bar_phone'] : '(555) 674 890 556' }}">
                                        {{ $top_header ?  $top_header['top_bar_phone'] : '(555) 674 890 556' }}
                                    </a>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="cta__icon">
                                <span><i class="fas fa-envelope"></i></span>
                            </div>
                            <div class="cta__content">
                                <p>Mail Us:</p>
                                <span>
                                    <a href="mailto:{{ $top_header ?  $top_header['top_bar_email'] : 'someone@growbiz.com' }}">
                                        {{ $top_header ?  $top_header['top_bar_email'] : 'someone@growbiz.com' }}
                                    </a>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="cta__icon">
                                <span><i class="fas fa-clock"></i></span>
                            </div>
                            <div class="cta__content">
                                <p>Service Hours</p>
                                <span>{{ $top_header ?  $top_header['top_bar_service_hours'] : '9:30 AM - 6:30 PM' }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 d-none d-lg-block">
                <div class="grb__social f-right st-1">
                    <ul>
                        <li><a class="fb" href="{{ $social_account ? $social_account['social_fb_url'] : '#' }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a class="twt" href="{{ $social_account ? $social_account['social_twitter_url'] : '#' }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a class="insta" href="{{ $social_account ? $social_account['social_instagram_url'] : '#' }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a style="color: #0a66c2;" href="{{ $social_account ? $social_account['social_linkedin_url'] : '#' }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
