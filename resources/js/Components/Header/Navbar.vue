<template>
    <div class="header__menu-area f-right">
        <div class="menu-bg-1">
            <img src="img/shape/menu-bg-1.png" alt="">
        </div>
        <div class="main-menu main-menu-1">
            <nav id="mobile-menu">
                <ul>
                    <li class="menu-item-has-children"><a href="index.html">Home</a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Home Style 01</a></li>
                            <li><a href="index-02.html">Home Style 02</a></li>
                            <li><a href="index-03.html">Home Style 03</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">About</a></li>
                    <li class="menu-item-has-children"><a href="services.html">Service</a>
                        <ul class="sub-menu">
                            <li><a href="services.html">Service</a>
                            <li><a href="service-details.html">Service Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="portfolio.html">Portfolio</a>
                        <ul class="sub-menu">
                            <li><a href="portfolio.html">Portfolio</a>
                            <li><a href="portfolio-details.html">Portfolio Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="team.html">Team</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="coming.html">Coming Soon</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a href="blog.html">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog.html">Blog</a>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
        <div class="header__search">
            <a class="search-btn nav-search search-trigger d-none d-sm-inline-block" href="#"><i
                class="fal fa-search"></i></a>
            <a class="side-toggle d-lg-none" href="javascript:void(0)"><i
                class="fal fa-bars"></i></a>
        </div>
        <div class="header__btn d-none d-xl-inline-block">
            <a href="contact.html" class="grb-btn">Get Reserved<i
                class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Navbar"
}
</script>

<style scoped>

</style>
