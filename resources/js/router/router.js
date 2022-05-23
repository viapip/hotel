import {createRouter, createWebHistory} from "vue-router";
import Main from "../pages/Main";


const routes = [
    {
        path: '/',
        component: Main,
    }
]


const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router
