<template>

    <main-screen-slider
        :banner="data?.banner"
        :is-multiple-title="true"
    />

    <main>
        <section class="about-page scroll-animation">
            <div class="container container--sm container--content-sm">
                <h2 class="scroll-animation__child">{{ data?.title }}</h2>
                <div v-html="data?.description" class="about-page__text scroll-animation__child">
                </div>
            </div>


            <about-slider
                :images="data?.images.split(',')"
            />



            <div class="container container--sm">
                <div class="events__text scroll-animation__child">
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
import animationScroll from "../mixins/animationScroll";
export default {
    name: "About",
    mixins: [animationScroll],
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
