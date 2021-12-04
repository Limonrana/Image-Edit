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
        props: {
            href: {
                type: String,
                required: true,
            },
            active: {
                type: Boolean,
                required: true,
            },
            path: {
                type: String,
                required: false,
                default: 'account',
            },
            url: {
                type: Array,
                required: false,
                default: undefined,
            },
        },
        components: {InertiaLink},
        computed: {
            classes() {
                let getCurrentUrl = null;
                if (this.url !== undefined) {
                    getCurrentUrl = this.url.find((x) => `/user/${this.path}/${x}` === this.$page.url);
                }
                if (getCurrentUrl) {
                    return 'side-menu--active';
                } else if (this.active) {
                    return 'side-menu--active';
                }
            }
        }
    }
</script>
