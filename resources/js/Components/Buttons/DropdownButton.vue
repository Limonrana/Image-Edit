<template>
    <div class="dropdown xl:ml-auto mt-5 xl:mt-0">
        <button class="dropdown-toggle btn btn-outline-secondary font-normal" ref="dropdown_toggle" @click="handleDropdownClick">
            {{ title }} <chevron-down-icon size="1.5x" class="w-4 h-4 ml-2"></chevron-down-icon>
        </button>
        <div class="dropdown-menu w-40" :class="isOpen ? 'show dropdown_menu_show' : ''">
            <div class="dropdown-menu__content box dark:bg-dark-1 p-2 overflow-y-auto h-32">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
import { ChevronDownIcon } from 'vue-feather-icons';
export default {
    name: "DropdownButton",
    props: ['title'],
    components: {ChevronDownIcon},
    data() {
        return {
            isOpen: false,
        }
    },
    methods: {
        handleDropdownClick() {
            let _this = this;
            const closeListerner = (e) => {
                if ( _this.catchOutsideClick(e, _this.$refs.dropdown_toggle, this.isOpen)) {
                    window.removeEventListener('click', closeListerner);
                    _this.isOpen = false;
                }
            }
            window.addEventListener('click', closeListerner);
            this.isOpen = !this.isOpen;
        },
        catchOutsideClick(event, dropdown, state)  {
            // When user clicks menu — do nothing
            if( dropdown === event.target || dropdown === event.target.parentNode ) {
                return false
            }
            // When user clicks outside of the menu — close the menu
            if( state && dropdown !== event.target ) {
                return true
            }
        }
    }
}
</script>

<style scoped>
    .dropdown-menu {
        z-index: 9999;
        inset: auto !important;
        transform: none !important;
        transition: visibility 0s ease-in-out 0.2s, opacity 0.2s 0s;
    }
    .dropdown_menu_show {
        width: 160px;
        position: absolute;
    }
</style>
