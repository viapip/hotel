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
import Gallery from "../pages/Gallery";
import NotFound from "../pages/NotFound";


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
        path: '/rooms/:slug',
        component: SingleRoom,
    },
    {
        path: '/special-offer',
        component: SpecialOffer,
    },
    {
        path: '/gallery',
        component: Gallery,
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'not-found',
        // alias: '*',
        component: NotFound,
    },
]


const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior() {
        window.scrollTo(0,0);
    }
});

export default router
