<template>
    <Swiper
        ref="swiper"
        class="about-slider"
        :slidesPerView="1"
        :modules="modules"
        :speed="1000"
        @swiper="onSwiper"
    >
        <SwiperSlide v-for="image in images">
            <div class="about-slider__img" :style="[`background: url(${image}) center/cover no-repeat`]">
            </div>
        </SwiperSlide>
    <div class="container">
        <arrows-slider
            @clickPrev="swiper.slidePrev()"
            @clickNext="swiper.slideNext()"/>
    </div>
    </Swiper>


</template>

<script>
import MainScreenSlider from "./FirstScreenSlider";
import DiscoverSlider from "./DiscoverSlider";
import {EffectFade, Navigation, Pagination, Autoplay} from 'swiper';
import {Swiper, SwiperSlide} from 'swiper/vue';
import ArrowsSlider from "./UI/ArrowsSlider";

export default {
    name: "AboutSlider",
    components: {
        ArrowsSlider,
        DiscoverSlider,
        MainScreenSlider,
        Swiper,
        SwiperSlide,
    },
    props: {
        images: {
            type: Array,
            default() {
                return ['/img/about/slider.jpg','/img/about/slider.jpg',];
            }
        }
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
