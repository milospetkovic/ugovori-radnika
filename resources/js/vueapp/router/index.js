import Vue from 'vue';
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'Home',
        component: () => import('../pages/Home.vue')
    },
    {
        path: '/login',
        name: 'Login',
        component: () => import('../pages/Login.vue')
    }
]

const router = new VueRouter({
    routes
})

export default router
