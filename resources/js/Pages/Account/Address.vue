<template>
    <app-layout>
        <!-- BEGIN: Content -->
        <div class="my-account">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Update Address
                </h2>
            </div>
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Profile Menu -->
                <side-nav :user="user"></side-nav>
                <!-- END: Profile Menu -->
                <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                    <!-- BEGIN: Address Information -->
                    <address-information :user-id="user.id" :address="address" :all-state="state" :all-country="country"></address-information>
                    <!-- END: Address Information -->
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import SideNav from "../../Components/Account/SideNav";
import AddressInformation from "../../Components/Account/AddressInformation";

export default {
    name: "Address",
    props: ['user', 'address', 'state', 'country'],
    components: {AddressInformation, SideNav, AppLayout},
}
</script>

<style scoped>

</style>
