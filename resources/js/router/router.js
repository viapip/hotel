import {createRouter, createWebHistory} from "vue-router";
// import Main from "../pages/Main";
// import About from "../pages/About";
// import Contact from "../pages/Contact";
// import Events from "../pages/Events";
// import Location from "../pages/Location";
// import Policy from "../pages/Policy";
// import Rooms from "../pages/Rooms";
// import SingleRoom from "../pages/SingleRoom";
// import SpecialOffer from "../pages/SpecialOffer";
// import Gallery from "../pages/Gallery";
// import NotFound from "../pages/NotFound";


const Main = () => import("../pages/Main")
const About = () => import("../pages/About")
const Contact = () => import("../pages/Contact")
const Events = () => import("../pages/Events")
const Location = () => import("../pages/Location")
const Policy = () => import("../pages/Policy")
const Rooms = () => import("../pages/Rooms")
const SingleRoom = () => import("../pages/SingleRoom")
// const SpecialOffer = () => import("../pages/SpecialOffer")
const Gallery = () => import("../pages/Gallery")
const NotFound = () => import("../pages/NotFound")


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
    // {
    //     path: '/special-offer',
    //     component: SpecialOffer,
    // },
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
