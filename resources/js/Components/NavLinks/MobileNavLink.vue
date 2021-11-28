<template>
    <li>
        <inertia-link :href="href" class="menu" :class="classes">
            <div class="menu__icon">
                <slot name="icon"></slot>
            </div>
            <div class="menu__title">
                <slot name="title"></slot>
            </div>
        </inertia-link>
    </li>
</template>

<script>
import {InertiaLink} from "@inertiajs/inertia-vue";
    export default {
        props: ['href', 'active'],
        components: {InertiaLink},
        computed: {
            classes() {
                return this.active ? 'menu--active' : ''
            }
        }
    }
</script>
