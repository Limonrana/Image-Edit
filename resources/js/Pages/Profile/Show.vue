<template>
    <app-layout>
        <!-- BEGIN: Content -->
        <div class="my-account">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Update Profile
                </h2>
            </div>
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Profile Menu -->
                <side-nav :user="user"></side-nav>
                <!-- END: Profile Menu -->
                <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                    <!-- BEGIN: Personal Information -->
                    <profile-information :user="user"></profile-information>
                    <!-- END: Personal Information -->
                    <!-- BEGIN: Address Information -->
                    <div class="intro-y box mt-5">
                        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base mr-auto">
                                Personal Information
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="grid grid-cols-12 gap-x-5">
                                <div class="col-span-12 xl:col-span-6">
                                    <div>
                                        <label for="update-profile-form-6" class="form-label">Email</label>
                                        <input id="update-profile-form-6" type="text" class="form-control" placeholder="Input text" value="morganfreeman@left4code.com" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-7" class="form-label">Name</label>
                                        <input id="update-profile-form-7" type="text" class="form-control" placeholder="Input text" value="Morgan Freeman" disabled>
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-8" class="form-label">ID Type</label>
                                        <select id="update-profile-form-8" class="form-select">
                                            <option>IC</option>
                                            <option>FIN</option>
                                            <option>Passport</option>
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-9" class="form-label">ID Number</label>
                                        <input id="update-profile-form-9" type="text" class="form-control" placeholder="Input text" value="357821204950001">
                                    </div>
                                </div>
                                <div class="col-span-12 xl:col-span-6">
                                    <div class="mt-3 xl:mt-0">
                                        <label for="update-profile-form-10" class="form-label">Phone Number</label>
                                        <input id="update-profile-form-10" type="text" class="form-control" placeholder="Input text" value="65570828">
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-11" class="form-label">Address</label>
                                        <input id="update-profile-form-11" type="text" class="form-control" placeholder="Input text" value="10 Anson Road, International Plaza, #10-11, 079903 Singapore, Singapore">
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-12" class="form-label">Bank Name</label>
                                        <select id="update-profile-form-12" data-search="true" class="tom-select w-full">
                                            <option value="1">SBI - STATE BANK OF INDIA</option>
                                            <option value="1">CITI BANK - CITI BANK</option>
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="update-profile-form-13" class="form-label">Bank Account</label>
                                        <input id="update-profile-form-13" type="text" class="form-control" placeholder="Input text" value="DBS Current 011-903573-0">
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end mt-4">
                                <button type="button" class="btn btn-primary w-20 mr-auto">Save</button>
                                <a href="" class="text-theme-24 flex items-center"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete Account </a>
                            </div>
                        </div>
                    </div>
                    <!-- END: Address Information -->
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import SideNav from "../../Components/Profile/SideNav";
    import ProfileInformation from "../../Components/Profile/ProfileInformation";

    export default {
        props: ['sessions', 'user'],

        components: { ProfileInformation, SideNav, AppLayout },
        data() {
            return {

            }
        },
        methods: {

        }
    }
</script>
