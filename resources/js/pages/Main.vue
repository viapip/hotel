<template>

    <first-screen-slider
        :banner="data?.banner.split(`,`)"
        :title="data?.title"
    />

    <main>
        <main-about
            :title="data?.about_title"
            :sub-title="data?.about_subtitle"
            :text="data?.about_text"
            :button-text="data?.about_button"
            :button-link="data?.about_button_link"
            :image="data?.about_image"
        />

        <main-rooms
            :rooms="data?.rooms"
            :title="data?.rooms_title"
            :description="data?.rooms_text"
        />

        <main-advantages
            v-if="data?.location"
            :title="data?.location[0]?.title"
            :text="data?.location[0]?.text"
            :images="data?.location[0]?.image.split(',')"
        />

        <main-quality
            :title="data?.quality_title"
            :text="data?.quality_text"
            :button-text="data?.quality_button"
            :button-link="data?.quality_link"
        />

        <discover-slider/>
    </main>


</template>

<script>
import FirstScreenSlider from "../components/FirstScreenSlider";
import DiscoverSlider from "../components/DiscoverSlider";
import {EffectFade, Navigation, Pagination, Autoplay} from 'swiper';
import {Swiper, SwiperSlide, useSwiper} from 'swiper/vue';
import ArrowsSlider from "../components/UI/ArrowsSlider";
import MainAdvantages from "../components/MainAdvantages";
import MainAbout from "../components/MainAbout";
import MainQuality from "../components/MainQuality";
import {useFetchData} from "../hooks/useFetchData";
import MainRooms from "../components/MainRooms";
import animationScroll from "../mixins/animationScroll";

export default {
    name: "Main",
    mixins: [animationScroll],
    components: {
        MainRooms,
        MainQuality,
        MainAbout,
        MainAdvantages,
        ArrowsSlider,
        DiscoverSlider,
        FirstScreenSlider,
        Swiper,
        SwiperSlide,
    },
    setup(props) {
        const {data, isLoading} = useFetchData('/api/home')

        return {
            data, isLoading
        }
    },
    data() {
        return {
            swiper: null,
            modules: [EffectFade, Pagination, Navigation, Autoplay],
        }
    },
    methods: {

        onSwiper(swiper) {
            this.swiper = swiper;
        },


    },
    mounted() {
    }

}
</script>

<style scoped>
</style>
