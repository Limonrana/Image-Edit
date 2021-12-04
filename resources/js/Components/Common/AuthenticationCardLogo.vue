<template>
    <inertia-link :href="'/'" class="-intro-x flex items-center pt-5">
        <img alt="Icewall-Icon" class="w-6" :src="'../../images/logo.svg'">
        <span class="text-white text-lg ml-3"> OMEGA<span class="font-medium">STUDIO</span> </span>
    </inertia-link>
</template>

<script>
import {InertiaLink} from "@inertiajs/inertia-vue";

export default {
    components: {InertiaLink}
}
</script>
