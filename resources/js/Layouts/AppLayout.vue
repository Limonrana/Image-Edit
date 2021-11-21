<template>
    <div class="layout">
        <Header />
        <div class="offcanvas-overlay"></div>
        <Search />
        <slot></slot>
        <!-- footer area start  -->
        <footer>
            <Footer />
            <FooterBottom />
        </footer>
        <!-- footer area end -->
    </div>
</template>

<script>
    import { Head, Link } from '@inertiajs/inertia-vue';
    import Header from "../Components/Header/Header";
    import Search from "../Components/Search";
    import Footer from "../Components/Footer";
    import FooterBottom from "../Components/FooterBottom";

    export default {
        props: {
            title: String,
        },

        components: {
            FooterBottom,
            Footer,
            Search,
            Header,
            Head,
            Link,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
