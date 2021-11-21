<template>
    <transition name="slide-fade">
        <div class="single-slider slider-height swiper-slide slider-overlay swiper-slide-active" v-show="slideShow === id">
            <div class="slide-bg" :style="{ backgroundImage: 'url(' + bgImage + ')'}"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="hero-content">
                            <div class="hero-bg-shape fadeInUp animated" style="animation-delay: 0.3s;">
                                <div class="hero-s-1">
                                    <img src="img/shape/hero-s-1.png" alt="">
                                </div>
                                <div class="hero-s-2">
                                    <img src="img/shape/hero-s-2.png" alt="">
                                </div>
                            </div>
                            <p class="fadeInUp animated" style="animation-delay: 0.6s;">Digital Service Agency</p>
                            <h1 class="fadeInUp animated" style="animation-delay: 0.9s;">Digital Service Agency</h1>
                            <div class="hero-content-btn fadeInUp animated" style="animation-delay: 1.1s;">
                                <a href="contact.html" class="grb-btn">Get Started</a>
                            </div>
                            <div class="hero-video-btn fadeInUp animated" style="animation-delay: 1.2s;">
                                <a class="grb-video popup-video"
                                   href="https://www.youtube.com/watch?v=pNje3bWz7V8"><i
                                    class="fas fa-play"></i></a>
                                <p>Working Videos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: "SliderItem",
    props: ["bgImage", "slideShow", "id"]
}
</script>

<style scoped>
/* Enter and leave animations can use different */
/* durations and timing functions.              */
.slide-fade-enter-active {
    transition: all .3s ease;
}
.slide-fade-leave-active {
    transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to {
    transform: translateX(500px);
    opacity: 0.8;
}
</style>
