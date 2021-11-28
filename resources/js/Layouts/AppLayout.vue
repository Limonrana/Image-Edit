<template>
    <div>
        <mobile-menu :logout="logout" />
        <top-bar :logout="logout" />
        <div class="wrapper">
            <div class="wrapper-box">
                <side-menu :logout="logout" />
                <div class="content">
                    <slot></slot>
                </div>
            </div>
        </div>
        <dark-mode-switcher />
<!--        <div class="min-h-screen bg-gray-100">-->
<!--            <nav class="bg-white border-b border-gray-100">-->
<!--                &lt;!&ndash; Primary Navigation Menu &ndash;&gt;-->
<!--                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">-->
<!--                    <div class="flex justify-between h-16">-->
<!--                        <div class="flex">-->
<!--                            &lt;!&ndash; Logo &ndash;&gt;-->
<!--                            <div class="flex-shrink-0 flex items-center">-->
<!--                                <inertia-link :href="route('dashboard')">-->
<!--                                    <jet-application-mark class="block h-9 w-auto" />-->
<!--                                </inertia-link>-->
<!--                            </div>-->

<!--                            &lt;!&ndash; Navigation Links &ndash;&gt;-->
<!--                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">-->
<!--                                <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">-->
<!--                                    Dashboard-->
<!--                                </jet-nav-link>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="hidden sm:flex sm:items-center sm:ml-6">-->
<!--                            &lt;!&ndash; Settings Dropdown &ndash;&gt;-->
<!--                            <div class="ml-3 relative">-->
<!--                                <jet-dropdown align="right" width="48">-->
<!--                                    <template #trigger>-->
<!--                                        <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">-->
<!--                                            <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />-->
<!--                                        </button>-->

<!--                                        <span v-else class="inline-flex rounded-md">-->
<!--                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">-->
<!--                                                {{ $page.props.user.name }}-->

<!--                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">-->
<!--                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />-->
<!--                                                </svg>-->
<!--                                            </button>-->
<!--                                        </span>-->
<!--                                    </template>-->

<!--                                    <template #content>-->
<!--                                        &lt;!&ndash; Account Management &ndash;&gt;-->
<!--                                        <div class="block px-4 py-2 text-xs text-gray-400">-->
<!--                                            Manage Account-->
<!--                                        </div>-->

<!--                                        <jet-dropdown-link :href="route('profile.show')">-->
<!--                                            Profile-->
<!--                                        </jet-dropdown-link>-->

<!--                                        <div class="border-t border-gray-100"></div>-->

<!--                                        &lt;!&ndash; Authentication &ndash;&gt;-->
<!--                                        <form @submit.prevent="logout">-->
<!--                                            <jet-dropdown-link as="button">-->
<!--                                                Log Out-->
<!--                                            </jet-dropdown-link>-->
<!--                                        </form>-->
<!--                                    </template>-->
<!--                                </jet-dropdown>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        &lt;!&ndash; Hamburger &ndash;&gt;-->
<!--                        <div class="-mr-2 flex items-center sm:hidden">-->
<!--                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">-->
<!--                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">-->
<!--                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />-->
<!--                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />-->
<!--                                </svg>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--                &lt;!&ndash; Responsive Navigation Menu &ndash;&gt;-->
<!--                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">-->
<!--                    <div class="pt-2 pb-3 space-y-1">-->
<!--                        <jet-responsive-nav-link :href="route('dashboard')" :active="route().current('dashboard')">-->
<!--                            Dashboard-->
<!--                        </jet-responsive-nav-link>-->
<!--                    </div>-->

<!--                    &lt;!&ndash; Responsive Settings Options &ndash;&gt;-->
<!--                    <div class="pt-4 pb-1 border-t border-gray-200">-->
<!--                        <div class="flex items-center px-4">-->
<!--                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="flex-shrink-0 mr-3" >-->
<!--                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />-->
<!--                            </div>-->

<!--                            <div>-->
<!--                                <div class="font-medium text-base text-gray-800">{{ $page.props.user.name }}</div>-->
<!--                                <div class="font-medium text-sm text-gray-500">{{ $page.props.user.email }}</div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="mt-3 space-y-1">-->
<!--                            <jet-responsive-nav-link :href="route('profile.show')" :active="route().current('profile.show')">-->
<!--                                Profile-->
<!--                            </jet-responsive-nav-link>-->

<!--                            &lt;!&ndash; Authentication &ndash;&gt;-->
<!--                            <form method="POST" @submit.prevent="logout">-->
<!--                                <jet-responsive-nav-link as="button">-->
<!--                                    Log Out-->
<!--                                </jet-responsive-nav-link>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </nav>-->

<!--            &lt;!&ndash; Page Heading &ndash;&gt;-->
<!--            <header class="bg-white shadow" v-if="$slots.header">-->
<!--                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">-->
<!--                    <slot name="header"></slot>-->
<!--                </div>-->
<!--            </header>-->

<!--            &lt;!&ndash; Page Content &ndash;&gt;-->
<!--            <main>-->
<!--                <slot></slot>-->
<!--            </main>-->
<!--        </div>-->
    </div>
</template>

<script>
    import { Inertia } from '@inertiajs/inertia';
    import MobileMenu from "../Components/Partials/MobileMenu";
    import TopBar from "../Components/Partials/TopBar";
    import SideMenu from "../Components/Partials/SideMenu";
    import DarkModeSwitcher from "../Components/Partials/DarkModeSwitcher";

    export default {
        components: { DarkModeSwitcher, SideMenu, TopBar, MobileMenu },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },
        mounted() {
            this.manageUI();
        },
        methods: {
            manageUI() {
                // Body Class Remove and Add
                if (document.body.classList.contains('login')) {
                    document.body.classList.remove('login');
                }
                document.body.classList.add('main');

                // Main Div Overflow Hidden and Show
                Inertia.on('start', () => {
                    let main = document.querySelector('.main');
                    if (main) {
                        main.style.overflow = 'hidden';
                    }
                });

                Inertia.on('finish', () => {
                    let main = document.querySelector('.main');
                    if (main) {
                        main.style.overflow = 'auto';
                    }
                });
            },
            logout() {
                this.$inertia.post(route('logout'));
            }
        }
    }
</script>
