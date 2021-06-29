require('./bootstrap');

import Vue from 'vue';
//import VueRouter from 'vue-router'
//import VueLoader from 'vue-loader'
//import VueX from 'vuex'
import App from "./vueapp/app"

const app = new Vue({
    el: '#app',
    components: { App }
});




