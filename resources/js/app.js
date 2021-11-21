require('./bootstrap');

import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
Vue.mixin({ methods: { route: window.route } });

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props }) {
        new Vue({
            render: h => h(App, props),
        }).$mount(el)
    },
})

InertiaProgress.init({ color: '#4B5563' });
