require('./bootstrap');

import Vue from 'vue';
//import VueRouter from 'vue-router'
//import VueLoader from 'vue-loader'
//import VueX from 'vuex'
import App from './vueapp/app'
import Vuetify from "vuetify/lib";
import router from './vueapp/router'


const vuetify = new Vuetify({})

Vue.use(Vuetify)

new Vue({
    vuetify,
    router,
    render: h => h(App)
}).$mount('#app')



