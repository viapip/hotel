<template>
    <Header/>
    <router-view></router-view>
    <Footer/>
</template>

<script>
import ExampleComponent from "./components/ExampleComponent";
import Header from "./components/Header";
import Footer from "./components/Footer";
import {mapActions} from "vuex";
import animationScroll from "./mixins/animationScroll";
export default {
    components: {
        Footer,
        Header,
        // ExampleComponent
    },
    methods: {
        ...mapActions({
            fetchContacts: 'contacts/fetchContacts',
            fetchDiscovery: 'discovery/fetchDiscovery',
            fetchSpecial: 'special/fetchSpecial',
            fetchBooking: 'booking/fetchBooking'
        })
    },
    mounted() {
        // this.fetchSpecial();
        this.fetchContacts();
        this.fetchDiscovery();
        this.fetchBooking();
    },
}
</script>

<style>

</style>
