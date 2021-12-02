<template>
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" :src="user.profile_photo_url">
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{ user.name }}</div>
                    <div class="text-gray-600">{{ user.email }}</div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center">
                        <MailIcon size="1.5x" class="w-4 h-4 mr-2"></MailIcon> {{ user.email }}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <PhoneIcon size="1.5x" class="w-4 h-4 mr-2"></PhoneIcon> {{ user.phone }}
                    </div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 pt-5 lg:pt-0">
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-theme-17 dark:text-theme-3 text-xl">201</div>
                    <div class="text-gray-600">Orders</div>
                </div>
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-theme-17 dark:text-theme-3 text-xl">1k</div>
                    <div class="text-gray-600">Purchases</div>
                </div>
                <div class="text-center rounded-md w-20 py-3">
                    <div class="font-medium text-theme-17 dark:text-theme-3 text-xl">492</div>
                    <div class="text-gray-600">Reviews</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { MailIcon, PhoneIcon } from 'vue-feather-icons';
export default {
    name: "ProfileInfo",
    props: ['user'],
    components: {MailIcon, PhoneIcon}
}
</script>

<style scoped>

</style>
