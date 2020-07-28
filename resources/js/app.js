/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


//Global Mixins for the Backend URL
Vue.mixin({
    data: function() {
        return {
            backendUrl:'http://homestead.test'
        }
    }
})


Vue.component('user-dashboard', require('./components/users/UserDashboard.vue').default);
Vue.component('admin-dashboard', require('./components/admins/AdminDashboard.vue').default)
Vue.component('admin-page', require('./components/admins/AdminPage.vue').default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.filter('capitalize', function (value) {
    if (!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase() + value.slice(1)
})

import router from "./routes";

const app = new Vue({
    el: '#app',
    router
});
