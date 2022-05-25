import {createRouter, createWebHistory} from "vue-router";
import Main from "../pages/Main";
import About from "../pages/About";
import Contact from "../pages/Contact";
import Events from "../pages/Events";
import Location from "../pages/Location";
import Policy from "../pages/Policy";
import Rooms from "../pages/Rooms";
import SingleRoom from "../pages/SingleRoom";
import SpecialOffer from "../pages/SpecialOffer";


const routes = [
    {
        path: '/',
        component: Main,
    },
    {
        path: '/about',
        component: About,
    },
    {
        path: '/contact',
        component: Contact,
    },
    {
        path: '/events',
        component: Events,
    },
    {
        path: '/location',
        component: Location,
    },
    {
        path: '/policy',
        component: Policy,
    },
    {
        path: '/rooms',
        component: Rooms,
    },
    {
        path: '/single-room',
        component: SingleRoom,
    },
    {
        path: '/special-offer',
        component: SpecialOffer,
    },
]


const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router
