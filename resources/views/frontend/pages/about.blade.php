@extends('frontend.layout.layout')

@section('site_title', 'About Us - Car Image Editing | Digital Agency')

@section('content')
    <main>
        <!-- page title area start  -->
        <section class="page-title-area" data-background="{{ asset('img/bg/page-title-bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title-content text-center">
                            <div class="page-title-heading">
                                <h1>About Us</h1>
                            </div>
                            <nav class="grb-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('store.home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->
        <!-- about area start  -->
        <section class="about-details pt-140">
            <div class="container">
                <div class="row wow fadeInUp align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title mb-30">
                            <h2>We're Leading Digital Business Agency</h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-details-right mb-30">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form,
                                by injected humour. If you are going to use a passage of Lorem Ipsum, you need to be
                                sure.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="about-details-box mt-30" data-background="
                {{ asset('img/bg/about-details-bg.jpeg') }}">
                    <div class="row wow fadeInUp justify-content-end">
                        <div class="col-xl-6 col-md-10">
                            <div class="about-details-box-content">
                                <h5>If you are going to use a passage of Lorem Ipsum, you need to be sure. Compare us
                                    between others companies.</h5>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form,
                                    by injected humour. If you are going to use a passage of Lorem Ipsum, you need to be
                                    sure.</p>
                                <ul class="about-points st-ab">
                                    <li>
                                        <div class="points-heading">
                                            <div class="p-icon">
                                                <i class="flaticon-team"></i>
                                            </div>
                                            <h5>One Stop Business</h5>
                                        </div>
                                        <p>There are many variations of passages of Lorem Ipsum available.</p>
                                    </li>
                                    <li>
                                        <div class="points-heading">
                                            <div class="p-icon">
                                                <i class="flaticon-creative-team"></i>
                                            </div>
                                            <h5>One Stop Business</h5>
                                        </div>
                                        <p>There are many variations of passages of Lorem Ipsum available.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- about area end -->
        <!-- skill area start  -->
        <section class="skill-area pt-110 pb-85">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-lg-6">
                        <div class="about__content mb-30">
                            <div class="section-title mb-30">
                                <h2>We Have achieved Experiences & Skills</h2>
                            </div>
                            <div class="ab-experience st-3">
                                <div class="ab-experience-content">
                                    <div class="ab-experience-icon">
                                        <i class="flaticon-trophy"></i>
                                    </div>
                                    <div class="ab-experience-text">
                                        <p><span>25+</span>Years
                                            Experiences</p>
                                    </div>
                                </div>
                            </div>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some
                                form,
                                by injected humour. If you are going to use a passage of Lorem Ipsum, you need to be
                                sure.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="grb-skill mt-45 ml-20 mr-10">
                            <div class="skill-wrapper">
                                <div class="skill-title">
                                    <h5 class="skill-category">UI/UX DESIGNS</h5>
                                    <span>90%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar wow slideInLeft" role="progressbar" style="width: 90%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="skill-wrapper">
                                <div class="skill-title">
                                    <h5 class="skill-category">HTML & CSS</h5>
                                    <span>80%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar wow slideInLeft" role="progressbar" style="width: 80%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="skill-wrapper">
                                <div class="skill-title">
                                    <h5 class="skill-category">UX SOLUTION</h5>
                                    <span>50%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar wow slideInLeft" role="progressbar" style="width: 50%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="skill-wrapper">
                                <div class="skill-title">
                                    <h5 class="skill-category">Wordpress</h5>
                                    <span>95%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar wow slideInLeft" role="progressbar" style="width: 95%"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- skill area end -->
        <!-- counter area start  -->
        <div class="counter-board-area" data-background="{{ asset('img/bg/counter-board-bg.jpg') }}">
            <div class="container">
                <div class="row wow fadeInUp counter-board-content">
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-board-single mb-40">
                            <i class="flaticon-add-group"></i>
                            <div class="counter-board-number"><span class="odometer" data-count="30">00</span>K+</div>
                            <p>HAPPY CUSTOMERS</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-board-single mb-40">
                            <i class="flaticon-businessman"></i>
                            <div class="counter-board-number"><span class="odometer" data-count="90">00</span>+</div>
                            <p>SKILLED EMPLOYEES</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-board-single mb-40">
                            <i class="flaticon-layers"></i>
                            <div class="counter-board-number"><span class="odometer" data-count="27">00</span>K+</div>
                            <p>PROJECT COMPLETED</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-board-single mb-40">
                            <i class="flaticon-trophy-1"></i>
                            <div class="counter-board-number"><span class="odometer" data-count="20">00</span>+</div>
                            <p>Champ TROPHY AWARDS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- counter area end -->
        <!-- team area start  -->
        <section class="team-area grey-bg pt-110 pb-90">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-lg-12">
                        <div class="section-title mb-55 text-center">
                            <h2>Meet Our Experienced <br> & Skilled Team</h2>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInUp">
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member mb-30">
                            <div class="member-img">
                                <a href="contact.html"><img src="{{ asset('img/team/team1.jpg') }}" alt=""></a>
                            </div>
                            <div class="member-name p-relative">
                                <div class="member-name-bg">
                                    <img src="{{ asset('img/shape/member-name-bg.png') }}" alt="">
                                    <img src="{{ asset('img/shape/member-name-c-bg.png') }}" alt="">
                                </div>
                                <h5><a href="contact.html">Janathan Samantha</a></h5>
                                <span>Web Developer</span>
                                <div class="member-social">
                                    <i class="far fa-plus"></i>
                                    <ul class="member-social-icons">
                                        <li><a href="#"><i class="fab fa-skype"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member mb-30">
                            <div class="member-img">
                                <a href="contact.html"><img src="{{ asset('img/team/team2.jpg') }}" alt=""></a>
                            </div>
                            <div class="member-name p-relative">
                                <div class="member-name-bg">
                                    <img src="{{ asset('img/shape/member-name-bg.png') }}" alt="">
                                    <img src="{{ asset('img/shape/member-name-c-bg.png') }}" alt="">
                                </div>
                                <h5><a href="contact.html">Daniel David Deo</a></h5>
                                <span>Programmer</span>
                                <div class="member-social">
                                    <i class="far fa-plus"></i>
                                    <ul class="member-social-icons">
                                        <li><a href="#"><i class="fab fa-skype"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member mb-30">
                            <div class="member-img">
                                <a href="contact.html"><img src="{{ asset('img/team/team3.jpg') }}" alt=""></a>
                            </div>
                            <div class="member-name p-relative">
                                <div class="member-name-bg">
                                    <img src="{{ asset('img/shape/member-name-bg.png') }}" alt="">
                                    <img src="{{ asset('img/shape/member-name-c-bg.png') }}" alt="">
                                </div>
                                <h5><a href="contact.html">Arman Ariyan</a></h5>
                                <span>Manager</span>
                                <div class="member-social">
                                    <i class="far fa-plus"></i>
                                    <ul class="member-social-icons">
                                        <li><a href="#"><i class="fab fa-skype"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-member mb-30">
                            <div class="member-img">
                                <a href="contact.html"><img src="{{ asset('img/team/team4.jpg') }}" alt=""></a>
                            </div>
                            <div class="member-name p-relative">
                                <div class="member-name-bg">
                                    <img src="{{ asset('img/shape/member-name-bg.png') }}" alt="">
                                    <img src="{{ asset('img/shape/member-name-c-bg.png') }}" alt="">
                                </div>
                                <h5><a href="contact.html">Shimuel Bappy</a></h5>
                                <span>UI/UX Designer</span>
                                <div class="member-social">
                                    <i class="far fa-plus"></i>
                                    <ul class="member-social-icons">
                                        <li><a href="#"><i class="fab fa-skype"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- team area end  -->
        <!-- brand area start  -->
        <div class="brand-area pt-100 pb-100">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-12">
                        <div class="swiper-container brand-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand1.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand1-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand2.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand2-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand3.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand3-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand4.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand4-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand5.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand5-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand1.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand1-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand2.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand2-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand3.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand3-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand4.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand4-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-brand">
                                        <a href="#"><img src="{{ asset('img/brand/brand5.png') }}" alt=""></a>
                                        <a href="#"><img src="{{ asset('img/brand/brand5-wc.png') }}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand area end -->
        <!-- newsletter area start  -->
        <div class="newsletter-area">
            <div class="container">
                <div class="row wow fadeInUp align-items-center">
                    <div class="col-lg-6">
                        <div class="newsletter-text mb-30">
                            <h4>Subscribe Us For Newsletter</h4>
                            <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined the Newsletter
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form class="subscribe-form mb-30">
                            <input type="text" placeholder="Enter your email...">
                            <button type="submit"><i class="fas fa-paper-plane"></i>Subscribe Us</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- newsletter area end -->
    </main>
@endsection
