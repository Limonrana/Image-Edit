<template>
    <!-- hero area start here -->
    <section class="slider-area p-relative fix">
        <div class="slider-active swiper-container">
            <div class="swiper-wrapper">
                <SliderItem v-for="(slide, i) in slides" :bg-image="slide" :slide-show="current" :id="i" :key="i" />
            </div>
            <!-- If we need navigation buttons -->
            <div class="slider-nav">
                <div class="swiper-button-prev" @click="prevSlide"><i class="far fa-arrow-left"></i></div>
                <div class="swiper-button-next" @click="nextSlide"><i class="far fa-arrow-right"></i></div>
            </div>
        </div>
    </section>
    <!-- hero area end here -->
</template>

<script>
import SliderItem from "./SliderItem";
export default {
    name: "HeroSlider",
    components: {SliderItem},
    data() {
        return {
            slides: [
                'img/hero/banner1.jpg',
                'img/hero/banner3.jpg',
                'img/hero/banner2.jpg'
            ],
            current: 0,
            timer: 0,
        }
    },
    created() {
        this.autoPlay();
    },
    methods: {
        nextSlide() {
            this.current++;
            if (this.current >= this.slides.length)
                this.current = 0;
            this.resetPlay();
        },
        prevSlide() {
            this.current--;
            if (this.current < 0)
                this.current = this.slides.length - 1;
            this.resetPlay();
        },
        selectSlide(i) {
            this.current = i;
            this.resetPlay();
        },
        resetPlay() {
            clearInterval(this.timer);
            this.autoPlay();
        },
        autoPlay() {
            this.timer = setInterval(() => {
                this.nextSlide();
            }, 5000);
        }
    }
}
</script>

<style scoped>

</style>
