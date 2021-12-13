<template>
    <!-- BEGIN: Chat Content -->
    <div class="intro-y col-span-12 lg:col-span-8 2xl:col-span-9">
        <div class="chat__box box">
            <!-- BEGIN: Chat Active -->
            <div class="hidden h-full flex flex-col" :style="{ height: (height - 200) + 'px' }">
                <div class="flex flex-col sm:flex-row border-b border-gray-200 dark:border-dark-5 px-5 py-4">
                    <div class="flex items-center mr-auto">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 flex-none image-fit relative">
                            <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" :src="'../../../images/profile-14.jpg'">
                        </div>
                        <div class="ml-3 mr-auto">
                            <div class="font-medium text-base">Denzel Washington</div>
                            <div class="text-gray-600 text-xs sm:text-sm">Hey, I am using chat <span class="mx-1">•</span> Online</div>
                        </div>
                    </div>
                </div>
                <div class="overflow-y-scroll scrollbar-hidden px-5 pt-5 flex-1">
                    <div class="chat__box__text-box flex items-end float-left mb-4">
                        <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
                            <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" :src="'../../../images/profile-14.jpg'">
                        </div>
                        <div class="bg-gray-200 dark:bg-dark-5 px-4 py-3 text-gray-700 dark:text-gray-300 rounded-r-md rounded-t-md">
                            Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor
                            <div class="mt-1 text-xs text-gray-600">2 mins ago</div>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="chat__box__text-box flex items-end float-right mb-4">
                        <div class="bg-theme-17 px-4 py-3 text-white rounded-l-md rounded-t-md">
                            Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor
                            <div class="mt-1 text-xs text-theme-33">1 mins ago</div>
                        </div>
                        <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                            <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" :src="'../../../images/profile-14.jpg'">
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="chat__box__text-box flex items-end float-right mb-4">
                        <div class="bg-theme-17 px-4 py-3 text-white rounded-l-md rounded-t-md">
                            Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor
                            <div class="mt-1 text-xs text-theme-33">59 secs ago</div>
                        </div>
                        <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                            <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" :src="'../../../images/profile-14.jpg'">
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="text-gray-500 dark:text-gray-600 text-xs text-center mb-10 mt-5">12 June 2020</div>
                    <div class="chat__box__text-box flex items-end float-left mb-4">
                        <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
                            <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" :src="'../../../images/profile-14.jpg'">
                        </div>
                        <div class="bg-gray-200 dark:bg-dark-5 px-4 py-3 text-gray-700 dark:text-gray-300 rounded-r-md rounded-t-md">
                            Lorem ipsum sit amen dolor, lorem ipsum sit amen dolor
                            <div class="mt-1 text-xs text-gray-600">10 secs ago</div>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="chat__box__text-box flex items-end float-right mb-4">
                        <div class="bg-theme-17 px-4 py-3 text-white rounded-l-md rounded-t-md">
                            Lorem ipsum
                            <div class="mt-1 text-xs text-theme-33">1 secs ago</div>
                        </div>
                        <div class="w-10 h-10 hidden sm:block flex-none image-fit relative ml-5">
                            <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" :src="'../../../images/profile-14.jpg'">
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    <div class="chat__box__text-box flex items-end float-left mb-4">
                        <div class="w-10 h-10 hidden sm:block flex-none image-fit relative mr-5">
                            <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" :src="'../../../images/profile-14.jpg'">
                        </div>
                        <div class="bg-gray-200 dark:bg-dark-5 px-4 py-3 text-gray-700 dark:text-gray-300 rounded-r-md rounded-t-md">
                            Denzel Washington is typing
                            <span class="typing-dots ml-1"> <span>.</span> <span>.</span> <span>.</span> </span>
                        </div>
                    </div>
                </div>
                <div class="pt-4 pb-10 sm:py-4 flex items-center border-t border-gray-200 dark:border-dark-5">
                    <textarea class="chat__box__input form-control dark:bg-dark-3 h-16 resize-none border-transparent px-5 py-3 shadow-none focus:ring-0" rows="1" placeholder="Type your message..."></textarea>
                    <div class="flex absolute sm:static left-0 bottom-0 ml-5 sm:ml-0 mb-5 sm:mb-0">
                        <div class="w-4 h-4 sm:w-5 sm:h-5 relative text-gray-600 mr-3 sm:mr-5">
                            <paperclip-icon class="w-full h-full"></paperclip-icon>
                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                        </div>
                    </div>
                    <a href="javascript:;" class="w-8 h-8 sm:w-10 sm:h-10 block bg-theme-17 text-white rounded-full flex-none flex items-center justify-center mr-5">
                        <send-icon class="w-4 h-4"></send-icon>
                    </a>
                </div>
            </div>
            <!-- END: Chat Active -->
            <!-- BEGIN: Chat Default -->
            <div class="h-full flex items-center py-16" :style="{ height: (height - 200) + 'px' }">
                <div class="mx-auto text-center">
                    <div class="w-16 h-16 flex-none image-fit rounded-full overflow-hidden mx-auto">
                        <img alt="Icewall Tailwind HTML Admin Template" :src="'../../../images/profile-14.jpg'">
                    </div>
                    <div class="mt-3">
                        <div class="font-medium">Hey, {{ $page.props.user.name }}</div>
                        <div class="text-gray-600 mt-1">Please click on below button to start messaging with us.</div>
                    </div>
                    <div class="start-chat mt-5">
                        <button class="btn btn-primary w-32 shadow-md mr-2">START CHAT</button>
                    </div>
                </div>
            </div>
            <!-- END: Chat Default -->
        </div>
    </div>
    <!-- END: Chat Content -->
</template>

<script>
import { PaperclipIcon, SendIcon } from 'vue-feather-icons';

export default {
    name: "OrderChat",
    props: ['height'],
    components: {PaperclipIcon, SendIcon}
}
</script>

<style scoped>

</style>
