/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import App from './components/App.vue'

require('./bootstrap');

//window.Vue = require('vue');

Vue.use(BootstrapVue)

Vue.prototype.$apiServerUrl = 'http://127.0.0.1:8000/api';
Vue.prototype.$http = axios;

const app = new Vue({
    el: '#app',
    components: { App },
});
