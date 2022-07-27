<template>

    <section class="advantages scroll-animation">
        <Swiper
            ref="swiper"
            class=""
            :slidesPerView="1"
            :modules="modules"
            :speed="1000"
            @swiper="onSwiper"
        >
            <SwiperSlide class="scroll-animation__child" v-for="(image, index) in images" :key="index">
                <div class="advantages__wrapper" :style="[`background: url(${image}) center/cover no-repeat`]">
                </div>
            </SwiperSlide>
        </Swiper>

        <div class="advantages__block scroll-animation__child">
            <div class="advantages__background scroll-animation__child"></div>
            <div class="container">
                <div class="advantages__block-wrapper">
                    <h2 class="scroll-animation__child">{{ title }}</h2>
                    <div v-html="text" class="advantages__text scroll-animation__child"></div>
                </div>
                <ArrowsSlider
                    :isDouble="true"
                    :prop-classes="'scroll-animation__child'"
                    @clickPrev="swiper.slidePrev()"
                    @clickNext="swiper.slideNext()"
                />
            </div>
        </div>
    </section>

</template>

<script>
import MainScreenSlider from "./FirstScreenSlider";
import DiscoverSlider from "./DiscoverSlider";
import {EffectFade, Navigation, Pagination, Autoplay} from 'swiper';
import {Swiper, SwiperSlide, useSwiper} from 'swiper/vue';
import ArrowsSlider from "./UI/ArrowsSlider";

export default {
    name: "Advantages",
    components: {
        ArrowsSlider,
        DiscoverSlider,
        MainScreenSlider,
        Swiper,
        SwiperSlide,
    },
    props: {
        title: {
            type: String,
            default: 'Convenient Location'
        },
        text: {
            type: String,
            default: 'The Location is ideal for business or leisure stay and our convenient location offers easy access to the entire city. Paddington Rail Station and the Heathrow Express service are a 10-minute taxi ride from Marylebone Inn. Buckingham Palace is within 2 miles from the building. In the heart of the West End, Marylebone Inn is surrounded by restaurants and shops, which can be reached in 5 minutes on foot. Regent’s Park is also a 5-minute walk away and the city’s popular theatres are just Tube ride away.'
        },
        images: {
            type: Array,
            default: ['./img/main/03_cutaway-london-big-ben.jpg']
        },
    },
    data() {
        return {
            swiper : null,
            modules: [EffectFade, Pagination, Navigation, Autoplay],
            data: null,
        }
    },
    methods: {
        onSwiper(swiper) {
            this.swiper = swiper;
        },
    },


}
</script>

<style scoped>

</style>
