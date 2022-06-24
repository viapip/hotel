<template>

    <header class="header" :style="[`background: url(${location?.banner}) center/cover no-repeat`]">
        <div class="container">
            <div class="header__wrapper">
                <h1>{{ location?.title }}</h1>
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
                    {{ location?.description }}
                </div>
                <div class="location__get">Get directions</div>
            </div>
        </section>
        <DiscoverSlider/>
    </main>
</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
export default {
    name: "Location",
    components: {DiscoverSlider},
    data() {
        return {
            location: null
        }
    },
    methods: {
        async fetchDataLocation() {
            try {
                const response = await fetch(process.env.MIX_HOST_API + '/api/location-page')
                this.location = await response.json();
            } catch (e) {
                console.log(e)
            }
        },
    },
    mounted() {
        this.fetchDataLocation();
    },
}
</script>

<style scoped>

</style>
