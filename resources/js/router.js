import { createWebHistory, createRouter } from "vue-router";

import Home from './Pages/Home.vue';

export const routes = [
    {
        name: 'index',
        path: '/',
        redirect: '/home',
    },
    {
        name: 'home',
        path: '/home',
        component: Home,
        meta: { unauthorized: true },
    },
];

const router = createRouter({
    history:createWebHistory(),
    routes
});
export default router;