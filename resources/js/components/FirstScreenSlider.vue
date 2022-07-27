<template>

    <Swiper
        class="main-screen-slider"
        @mousemove="parallaxEffect"
        :slidesPerView="1"
        :modules="modules"
        :pagination="pagination"
        :effect="'fade'"
        :speed="1000"
        :autoplay="{
          delay: 5000,
          disableOnInteraction: true,
    }"
    >

    <SwiperSlide v-for="(item, index) of banner" :key="index"
    >
        <div style="overflow: hidden">
    <header :class="['header','header--big', {'multiple': isMultipleTitle }]"
            :style="{
        background: `url(${isMultipleTitle ? item.image : item}) center/cover no-repeat`,
        // backgroundPosition: 'calc(50% + '+ moveX + ') calc(50% + ' + moveY + ')',
        // backgroundPosition: 'calc(50% + '+ moveX + ') calc(50% + ' + moveY + ')',
        transform: `translate3d(${moveX}, ${moveY}, 0px)` + `scale(${scale})`,

    }">
        <div class="header__gradient"></div>
        <div class="container">
            <h1>{{ isMultipleTitle ? item.title : title }}</h1>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>
        </div>
    </SwiperSlide>

    </Swiper>
</template>
<script>

import {EffectFade, Navigation, Pagination, Autoplay} from 'swiper';
import {Swiper, SwiperSlide} from 'swiper/vue';
import {debounce} from "lodash";

// import "swiper/css";
// import "swiper/css/pagination";

export default {
    name: "MainScreenSlider",
    components: {
        Swiper,
        SwiperSlide
    },
    props: {
        banner: {
            type: Array,
            default: (props) => {
                 return ['./img/main/banner.jpg', './img/main/nationalgallerylondon.jpg']

            },
        },
        title: {
            type: String,
            default: "Welcome to Caucasus",
        },
        isMultipleTitle: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            dataAPi: [
                {url: './img/main/banner.jpg', title: 'Welcome to London'},
                {url: './img/main/nationalgallerylondon.jpg', title: 'Welcome to London1'},
                {url: './img/main/banner.jpg', title: 'Welcome to London2'},
                {url: './img/main/nationalgallerylondon.jpg', title: 'Welcome to London3'},
                {url: './img/main/banner.jpg', title: 'Welcome to London4'},
            ],
            modules: [EffectFade, Pagination, Navigation, Autoplay],
            moveX: 0,
            moveY: 0,
            scale: 1.1,
            isMobile: window.innerWidth <= 992,
            pagination: {
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + '<i></i>' + '<b></b>' + "</span>";
                },
            },
        }
    },
    methods: {
        parallaxEffect(e) {
            // console.log(e)
            if (this.isMobile) return false;
            this.moveX = e.pageX * -1 / 25 + 'px'
            this.moveY = e.pageY * -1 / 25 + 'px'
            console.log(this.moveY, this.moveX)
        },
    },
    mounted () {
        console.log(this.isMobile)
    },
}
</script>

<style scoped>

</style>
