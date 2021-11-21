<template>
    <!-- header area start  -->
    <header>
        <TopHeader />
        <div class="header__main header-sticky header-main-1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-8">
                        <Logo />
                    </div>
                    <div class="col-xl-10 col-lg-9 col-4">
                        <Navbar />
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->
</template>

<script>
import Logo from './Logo.vue'
import TopHeader from "./TopHeader";
import Navbar from "./Navbar";
export default {
    name: "Header",
    components: {Navbar, TopHeader, Logo }
}
</script>

<style scoped>

</style>
