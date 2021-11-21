<template>
   <div class="welcome">
       <app-layout>
            <main>
                <!--  Hero Slider Section-->
                <HeroSlider />
            </main>
       </app-layout>
   </div>
</template>

<script>
    import { Head, Link } from '@inertiajs/inertia-vue';
    import AppLayout from "../Layouts/AppLayout.vue";
    import HeroSlider from "../Components/HeroSlider";

    export default {
        name: "Home",
        components: {
            HeroSlider,
            AppLayout,
            Head,
            Link,
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    }
</script>
