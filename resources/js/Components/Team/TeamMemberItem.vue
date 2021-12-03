<template>
    <div class="intro-y col-span-12 mb-3 md:col-span-6">
        <div class="box">
            <div class="flex flex-col lg:flex-row items-center py-5 px-5">
                <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                    <img :alt="member.name" class="rounded-full" :src="member.profile_photo_url">
                </div>
                <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                    <div class="font-medium">{{ member.name }}</div>
                    <div class="text-gray-600 text-xs mt-0.5">{{ member.email }}</div>
                </div>
                <div class="flex mt-4 lg:mt-0">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TeamMemberItem",
    props: ['member'],
}
</script>

<style scoped>

</style>
