
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueRouter from 'vue-router';
import router from './router';
Vue.use(VueRouter);
Vue.component('example', require('./components/App.vue'));

const app = new Vue({
    el: '#app',
    router
});
