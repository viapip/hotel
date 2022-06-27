<template>

    <header class="header" :style="[`background: url(${data?.banner}) center/cover no-repeat`]">
        <div class="container">
            <div class="header__wrapper">
                <h1>{{ data?.title }}</h1>
                <div class="breadcrumb">
                    <a href="#" class="breadcrumb__item">Home</a>
                    <a href="#" class="breadcrumb__item">Location</a>
                </div>
            </div>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>

    <main>
        <section class="location">
            <div class="container container--sm">
                <div class="location__text">
                    {{ data?.description }}
                </div>
                <div class="location__get">Get directions</div>
            </div>
        </section>
        <DiscoverSlider/>
    </main>
</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
import {useFetchData} from "../hooks/useFetchData";
export default {
    name: "Location",
    components: {DiscoverSlider},
    setup(props) {
        const {data, isLoading} = useFetchData('/api/location-page');
        return {
            data, isLoading
        }
    },
    data() {
        return {
            location: null
        }
    },
    methods: {
    },
    mounted() {
    },
}
</script>

<style scoped>

</style>
