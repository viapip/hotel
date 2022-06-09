<template>

    <section class="discover">

        <!--        <div ref="margin" class="container" style="width:100%; overflow: hidden;"></div>-->
        <div class="discover__wrapper container">
            <div class="discover__overtitle">discover</div>
            <div class="discover__head">
                <h2>Attractions near
                    Baker Street Tube Station</h2>
                <div class="discover__remote">

                </div>
            </div>
            <div class="discover__content">
                <Swiper
                    class="discover-slider"
                    :slidesPerView="1"
                    :space-between="30"
                    :modules="modules"
                    :pagination="{
                              type: 'progressbar',
                            }"
                    :breakpoints="{
                    '320': {
                        slidesPerView: 1.6,
                        spaceBetween: 15
                    },
                    '640': {
                        slidesPerView: 2.6,
                        spaceBetween: 0
                    },
                    '1199': {
                        slidesPerView: 3
                    },
                }"
                >
                    <SwiperSlide
                        class="discover-slider__item"
                    >
                        <div style="overflow: hidden" class="discover-slider__img-wrapper">
                            <div class="discover-slider__img"
                                 style="background: url('./img/main/slider.jpg') center/cover no-repeat"></div>
                        </div>
                        <div class="discover-slider__content">
                            <h6>Madame Tussauds</h6>
                        </div>
                    </SwiperSlide>
                    <SwiperSlide
                        class="discover-slider__item"
                    >
                        <div style="overflow: hidden" class="discover-slider__img-wrapper">
                            <div class="discover-slider__img"
                                 style="background: url('./img/main/slider.jpg') center/cover no-repeat"></div>
                        </div>
                        <div class="discover-slider__content">
                            <h6>Madame Tussauds</h6>
                        </div>
                    </SwiperSlide>
                    <SwiperSlide
                        class="discover-slider__item"
                    >
                        <div style="overflow: hidden" class="discover-slider__img-wrapper">
                            <div class="discover-slider__img"
                                 style="background: url('./img/main/slider.jpg') center/cover no-repeat"></div>
                        </div>
                        <div class="discover-slider__content">
                            <h6>Madame Tussauds</h6>
                        </div>
                    </SwiperSlide>
                    <SwiperSlide
                        class="discover-slider__item"
                    >
                        <div style="overflow: hidden" class="discover-slider__img-wrapper">
                            <div class="discover-slider__img"
                                 style="background: url('./img/main/slider.jpg') center/cover no-repeat"></div>
                        </div>
                        <div class="discover-slider__content">
                            <h6>Madame Tussauds</h6>
                        </div>
                    </SwiperSlide>
                </Swiper>
            </div>
        </div>
    </section>
</template>

<script>

import {Navigation, Pagination} from 'swiper';
import {Swiper, SwiperSlide} from 'swiper/vue';

// import "swiper/css";
import "swiper/css/pagination";

export default {
    name: "DiscoverSlider",
    components: {
        Swiper,
        SwiperSlide
    },
    data() {
        return {
            modules: [Pagination, Navigation],
        }
    },
    mounted() {
    }
    // setup() {
    //     return {
    //         modules: [Scrollbar, Navigation],
    //     };
    // },
}
</script>

<style scoped>

/*@import "swiper/swiper.min.css";*/
</style>
