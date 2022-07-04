<template>

    <main-screen-slider
        :banner="data?.banner"
        :is-multiple-title="true"
    />

    <main>
        <section class="about-page">
            <div class="container container--sm container--content-sm">
                <h2>{{ data?.title }}</h2>
                <div v-html="data?.description" class="about-page__text">
                </div>
            </div>


            <about-slider
                :images="data?.images.split(',')"
            />



            <div class="container container--sm">
                <div class="events__text">
                    {{ data?.description_bottom }}
                </div>
            </div>
        </section>
        <contact-form/>
    </main>
</template>

<script>
import MainScreenSlider from "../components/FirstScreenSlider";
import ArrowsSlider from "../components/UI/ArrowsSlider";
import DiscoverSlider from "../components/DiscoverSlider";
import {Swiper, SwiperSlide} from "swiper/vue";
import AboutSlider from "../components/AboutSlider";
import {useFetchData} from "../hooks/useFetchData";
import ContactForm from "../components/ContactForm";
export default {
    name: "About",
    components: {
        ContactForm,
        AboutSlider,
        MainScreenSlider,
    },
    setup() {
        const {data, isLoading} = useFetchData('/api/about-page')
        return {
            data, isLoading,
        }
    },
}
</script>

<style scoped>

</style>
