<template>
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" ref="account_dropdown_toggle" @click="handleAccountMenu">
            <img alt="Icewall Tailwind HTML Admin Template" :src="'../../images/profile-13.jpg'">
        </div>
        <div class="dropdown-menu w-56" :class="accountMenuSection ? 'show account_menu_show' : 'hidden'">
            <div class="dropdown-menu__content box bg-theme-11 dark:bg-dark-6 text-white">
                <div class="p-4 border-b border-theme-12 dark:border-dark-3">
                    <div class="font-medium">Limon Rana</div>
                    <div class="text-xs text-theme-13 mt-0.5 dark:text-gray-600">Admin</div>
                </div>
                <div class="p-2">
                    <simple-icon-nav :href="route('profile.show')" title="My Profile">
                        <user-icon size="1.5x" class="w-4 h-4 mr-2"></user-icon>
                    </simple-icon-nav>

                    <simple-icon-nav :href="route('profile.show')" title="My Account">
                        <edit-icon size="1.5x" class="w-4 h-4 mr-2"></edit-icon>
                    </simple-icon-nav>

                    <simple-icon-nav :href="route('profile.show')" title="Change Password">
                        <lock-icon size="1.5x" class="w-4 h-4 mr-2"></lock-icon>
                    </simple-icon-nav>

                    <simple-icon-nav :href="route('profile.show')" title="My Support">
                        <help-circle-icon size="1.5x" class="w-4 h-4 mr-2"></help-circle-icon>
                    </simple-icon-nav>
                </div>
                <div class="p-2 border-t border-theme-12 dark:border-dark-3">
                    <form @submit.prevent="logout">
                        <button type="submit" class="flex items-center block w-full p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <toggle-right-icon size="1.5x" class="w-4 h-4 mr-2"></toggle-right-icon> Logout </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SimpleIconNav from "../NavLinks/SimpleIconNav";
import { UserIcon, EditIcon, LockIcon, HelpCircleIcon, ToggleRightIcon } from 'vue-feather-icons';
export default {
    name: "AccountMenu",
    components: {SimpleIconNav, UserIcon, EditIcon, LockIcon, HelpCircleIcon, ToggleRightIcon},
    props: ['logout', 'catchClick'],
    data() {
        return {
            accountMenuSection: false,
        }
    },
    methods: {
        handleAccountMenu() {
            let _this = this;
            const closeListerner = (e) => {
                if ( _this.catchClick(e, _this.$refs.account_dropdown_toggle, this.accountMenuSection)) {
                    window.removeEventListener('click', closeListerner);
                    _this.accountMenuSection = false;
                }
            }
            window.addEventListener('click', closeListerner);
            this.accountMenuSection = !this.accountMenuSection;
        }
    }
}
</script>

<style scoped>
    .account_menu_show {
        width: 224px;
        position: absolute;
        inset: 0px auto auto 0px;
        margin: 0px;
        transform: translate(-190px, 33px);
    }
</style>
