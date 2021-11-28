<template>
    <div class="intro-x dropdown mr-4 sm:mr-6">
        <div class="dropdown-toggle notification notification--bullet cursor-pointer" ref="notification_toggle" @click="handleNotification">
            <bell-icon size="1.5x" class="notification__icon dark:text-gray-300"></bell-icon>
        </div>
        <div class="notification-content pt-2" :class="notificationSection ? 'show noty-show' : 'hidden'">
            <div class="notification-content__box dropdown-menu__content box dark:bg-dark-6">
                <div class="notification-content__title">Notifications</div>

                <notification-item name="Sylvester Stallone" time="03:20 PM" image="../../images/profile-8.jpg">
                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20
                </notification-item>

                <notification-item name="Johnny Depp" time="01:10 PM" image="../../images/profile-7.jpg">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
                </notification-item>

                <notification-item name="Kevin Spacey" time="05:09 AM" image="../../images/profile-2.jpg">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
                </notification-item>

                <notification-item name="Robert De Niro" time="06:05 AM" image="../../images/profile-11.jpg">
                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20
                </notification-item>

                <notification-item name="Denzel Washington" time="05:09 AM" image="../../images/profile-11.jpg">
                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20
                </notification-item>

            </div>
        </div>
    </div>
</template>

<script>
import { BellIcon } from 'vue-feather-icons';
import NotificationItem from "../Common/NotificationItem";
export default {
    name: "NotificationsSection",
    components: {NotificationItem, BellIcon},
    props: ['catchClick'],
    data() {
        return {
            notificationSection: false,
        }
    },
    methods: {
        handleNotification() {
            let _this = this;
            const closeListerner = (e) => {
                if ( _this.catchClick(e, _this.$refs.notification_toggle, this.notificationSection)) {
                    window.removeEventListener('click', closeListerner);
                    _this.notificationSection = false;
                }
            }
            window.addEventListener('click', closeListerner);
            this.notificationSection = !this.notificationSection;
        }
    }
}
</script>

<style scoped>
    .noty-show {
        width: 350px;
        position: absolute;
        right: 0 !important;
    }
    @media screen and (min-device-width: 375px) and (max-device-width: 767px) {
        .noty-show {
            width: 280px;
        }
    }
    @media screen and (min-device-width: 200px) and (max-device-width: 374px) {
        .noty-show {
            width: 280px;
            right: -40px !important;
        }
    }
</style>
