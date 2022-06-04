import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
// import plugin
import VueToastr from "vue-toastr";
// import inertia link
import { Link } from '@inertiajs/inertia-vue'


// use plugin
Vue.use(VueToastr, {
    /* OverWrite Plugin Options if you need */
});

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        Vue.use(plugin)
        Vue.component('inertia-link',Link)
        new Vue({
            render: h => h(App, props),
        }).$mount(el)
    },
})
