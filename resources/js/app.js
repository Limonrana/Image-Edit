require('./bootstrap');

import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue';
import { InertiaProgress } from '@inertiajs/progress';
import VueMoment from 'vue-moment';
import VueSweetalert2 from 'vue-sweetalert2';
import Toast from "vue-toastification";

// Import the Toast & VueSweetalert2 CSS!
import 'sweetalert2/dist/sweetalert2.min.css';
import "vue-toastification/dist/index.css";

const options = {
    position: "top-right",
    timeout: 5000,
    closeOnClick: true,
    pauseOnFocusLoss: true,
    pauseOnHover: true,
    draggable: true,
    draggablePercent: 0.6,
    showCloseButtonOnHover: false,
    hideProgressBar: true,
    closeButton: "button",
    icon: true,
    rtl: false,
    transition: "Vue-Toastification__fade",
    maxToasts: 20,
    newestOnTop: true
};

const optionsSweetAlert = {
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
};

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
Vue.mixin({ methods: { route: window.route } });
Vue.use(VueMoment);
Vue.use(Toast, options);
Vue.use(VueSweetalert2, optionsSweetAlert);

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props }) {
        new Vue({
            render: h => h(App, props),
        }).$mount(el)
    },
})

InertiaProgress.init({ color: '#fff', showSpinner: true });
