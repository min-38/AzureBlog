import { createWebHistory, createRouter } from "vue-router";

import Home from './Pages/Home.vue';
import StudyList from './Pages/Study/List.vue';
import StudyUpload from './Pages/Study/Upload.vue';

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
    {
        name: 'study.list',
        path: '/study/list',
        component: StudyList,
        meta: { unauthorized: true },
    },
    {
        name: 'study.upload',
        path: '/study/upload',
        component: StudyUpload,
        meta: { unauthorized: true },
    },
];

const router = createRouter({
    history:createWebHistory(),
    routes
});
export default router;