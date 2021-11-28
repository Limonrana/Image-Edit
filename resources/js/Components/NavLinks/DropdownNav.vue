<template>
    <li>
        <a href="javascript:;" class="side-menu" :class="mainClasses">
            <div class="side-menu__icon">
                <slot name="mainIcon"></slot>
            </div>
            <div class="side-menu__title">
                {{ title }}
                <div class="side-menu__sub-icon">
                    <slot name="subIcon"></slot>
                </div>
            </div>
        </a>
        <ul :class="subClasses">
            <slot name="subMenu"></slot>
        </ul>
    </li>
</template>

<script>
export default {
    name: "DropdownNav",
    props: ['title', 'paths'],
    computed: {
        mainClasses() {
            return this.paths.find((x) => x === $page.url.split('/')[1]) ? 'side-menu--active' : '';
        },
        subClasses() {
            return this.paths.find((x) => x === $page.url.split('/')[1]) ? 'side-menu__sub-open' : '';
        }
    }
}
</script>

<style scoped>

</style>
