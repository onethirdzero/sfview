import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter) // Use the VueRouter plugin.

import App from './components/App'
import Welcome from './components/Welcome'
import Page from './components/Page'

const router = new VueRouter({
    mode: 'history', // Allows URL navigation without a page reload.
    routes: [
        {
            // Redirect to /home.
            // https://github.com/vuejs/vue-router/issues/866#issuecomment-278976528
            path: '/',
            redirect: '/home'
        },
        {
            path: '/home',
            name: 'welcome', // Handy for in-component navigation.
            component: Welcome,
            props: {
                title: "Home"
            }
        },
        {
            path: '/spa-page',
            name: 'page',
            component: Page,
            props: {
                title: "Second Page"
            }
        },
    ],
})

const app = new Vue({
    el: '#app',
    components: { App }, // The parent component the router uses as its entrypoint.
    router,
});
