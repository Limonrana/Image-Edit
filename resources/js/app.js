require('./bootstrap');

import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue';
import { Inertia } from '@inertiajs/inertia';
import { InertiaProgress } from '@inertiajs/progress';
import VueMoment from 'vue-moment'

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
Vue.mixin({ methods: { route: window.route } });
Vue.use(VueMoment);

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

Inertia.on('start', () => {
    document.querySelector('.main').style.overflow = 'hidden';
});

Inertia.on('finish', () => {
    document.querySelector('.main').style.overflow = 'auto';
});
