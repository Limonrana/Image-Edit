<template>
    <li>
        <inertia-link :href="href" class="side-menu" :class="classes">
            <div class="side-menu__icon"> <i :data-feather="icon"></i> </div>
            <div class="side-menu__title"> Overview 1 </div>
        </inertia-link>
    </li>
</template>

<script>
import {InertiaLink} from "@inertiajs/inertia-vue";
export default {
    name: "DropdownNavLink",
    props: ['href', 'active', 'icon'],
    components: {InertiaLink},
    computed: {
        classes() {
            return this.active ? 'side-menu--active' : ''
        }
    }
}
</script>

<style scoped>

</style>
