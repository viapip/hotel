<template>

    <first-screen-slider
        :banner="[data?.banner]"
        :title="data?.title"
    />

    <main>

        <main-about
            :title="data?.about_title"
            :sub-title="data?.about_subtitle"
            :text="data?.about_text"
            :button-text="data?.about_button"
            :button-link="data?.about_button_link"
        />

        <section class="rooms-main">
            <div class="container">
                <h2>Comfortable Rooms</h2>
                <div class="rooms-main__text">
                    At Marylebone Inn you will always get a quality, modern room to enjoy a respectable night's sleep.
                    Every room is fitted with the finest modern accessories including plasma TV's. High speed Internet
                    is also available free of charge.
                </div>
                <div class="rooms-main__cards">
                    <div class="room-card-small">
                        <div class="image-wrapper-full-width">
                            <img src="img/main/card.jpg" alt="">
                        </div>
                        <h6>Single room</h6>
                        <div class="room-card-small__text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore.
                        </div>
                    </div>
                    <div class="room-card-small">
                        <div class="image-wrapper-full-width">
                            <img src="img/main/card.jpg" alt="">
                        </div>
                        <h6>Single room</h6>
                        <div class="room-card-small__text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore.
                        </div>
                    </div>
                    <div class="room-card-small">
                        <div class="image-wrapper-full-width">
                            <img src="img/main/card.jpg" alt="">
                        </div>
                        <h6>Single room</h6>
                        <div class="room-card-small__text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore.
                        </div>
                    </div>
                </div>
                <div class="rooms-main__view-more">
                    <a href="#" class="view-more">
                        <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M56.5 28.5C56.5 32.177 55.7758 35.818 54.3686 39.2151C52.9615 42.6123 50.899 45.6989 48.299 48.299C45.6989 50.899 42.6123 52.9615 39.2151 54.3686C35.818 55.7758 32.177 56.5 28.5 56.5C24.823 56.5 21.182 55.7758 17.7849 54.3686C14.3877 52.9615 11.301 50.899 8.70101 48.299C6.10097 45.6989 4.0385 42.6123 2.63137 39.2151C1.22424 35.818 0.5 32.177 0.5 28.5C0.5 24.823 1.22424 21.182 2.63137 17.7849C4.03851 14.3877 6.10097 11.301 8.70101 8.70101C11.3011 6.10097 14.3878 4.0385 17.7849 2.63137C21.182 1.22424 24.823 0.5 28.5 0.5C32.177 0.5 35.818 1.22424 39.2151 2.63137C42.6123 4.03851 45.699 6.10097 48.299 8.70101C50.899 11.3011 52.9615 14.3878 54.3686 17.7849C55.7758 21.182 56.5 24.823 56.5 28.5L56.5 28.5Z"
                                stroke="#424454"/>
                            <path d="M21 29H37M37 29L29 21M37 29L29 37" stroke="#424454" stroke-linecap="square"
                                  stroke-linejoin="bevel"/>
                        </svg>
                        <span>View more</span>
                    </a>
                </div>

            </div>
        </section>

        <main-advantages
            :title="advantages?.title"
            :text="advantages?.text"
            :images="[advantages?.image]"
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

export default {
    name: "Main",
    components: {
        MainQuality,
        MainAbout,
        MainAdvantages,
        ArrowsSlider,
        DiscoverSlider,
        FirstScreenSlider,
        Swiper,
        SwiperSlide,
    },
    data() {
        return {
            swiper: null,
            modules: [EffectFade, Pagination, Navigation, Autoplay],
            data: null,
            advantages: null
        }
    },
    methods: {

        onSwiper(swiper) {
            this.swiper = swiper;
        },

        async fetchData() {
            try {
                const response = await fetch(process.env.MIX_HOST_API + '/api/home')
                this.data = await response.json();
                this.advantages = this.data.location[0]

            } catch (e) {
                console.log(e)
            }

        },
    },
    async mounted() {
        await this.fetchData()
        console.log(this.data)
    },

}
</script>

<style scoped>
</style>
