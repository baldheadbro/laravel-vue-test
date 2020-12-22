/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import router from './router';
import ServiceApp from './components/ServiceApp';

window.Vue.use(VueRouter);
window.Vue.prototype.$url = 'http://192.168.43.248/';

const app = new Vue({
    el: '#app',
    render: h => h(ServiceApp),
    router
});
