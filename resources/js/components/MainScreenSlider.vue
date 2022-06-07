<template>

    <Swiper
        class="main-screen-slider"
        :slidesPerView="1"
        :modules="modules"
        :pagination="pagination"
    >

    <SwiperSlide
    >
    <header class="header header--big" style="background: url('./img/main/banner.jpg') center/cover no-repeat">
        <div class="container">
            <h1>Welcome to London</h1>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>

    </SwiperSlide>
    <SwiperSlide
    >
    <header class="header header--big" style="background: url('./img/main/banner.jpg') center/cover no-repeat">
        <div class="container">
            <h1>Welcome to London</h1>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>

    </SwiperSlide>
    <SwiperSlide
    >
    <header class="header header--big" style="background: url('./img/main/banner.jpg') center/cover no-repeat">
        <div class="container">
            <h1>Welcome to London</h1>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>
    <div class="pagination"></div>
    </SwiperSlide>

    </Swiper>
</template>
<script>

import {Navigation, Pagination} from 'swiper';
import {Swiper, SwiperSlide} from 'swiper/vue';

// import "swiper/css";
// import "swiper/css/pagination";

export default {
    name: "MainScreenSlider",
    components: {
        Swiper,
        SwiperSlide
    },
    data() {
        return {
            modules: [Pagination, Navigation],
            pagination: {
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + '<i></i>' + '<b></b>' + "</span>";
                },
            },
        }
    },
}
</script>

<style scoped>

</style>
