<template>
    <li>
        <inertia-link :href="href" class="side-menu" :class="classes">
            <div class="side-menu__icon">
                <slot name="icon"></slot>
            </div>
            <div class="side-menu__title">
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
                return this.active ? 'side-menu--active' : ''
            }
        }
    }
</script>
