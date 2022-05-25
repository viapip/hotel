<template>
    <Header/>
    <router-view></router-view>
    <Footer/>
</template>

<script>
import ExampleComponent from "./components/ExampleComponent";
import Header from "./components/Header";
import Footer from "./components/Footer";
export default {
    components: {
        Footer,
        Header,
        // ExampleComponent
    },
    methods: {

    }
}
</script>

<style>

</style>
