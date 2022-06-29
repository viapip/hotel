<template>
    <div
        class="room">
        <div class="room__overtitle">
            Room Only
        </div>
        <h3
            @click="$router.push(`/rooms/` + room.slug)"
        >{{room?.title}}</h3>
        <Swiper
            class="room__swiper"
            :slidesPerView="1"
            :modules="modules"
            :pagination="pagination"
            :speed="1000"
        >
            <SwiperSlide
                class="room__swiper-slide"
                v-for="item in room?.images.split(',')"
                :key="item"
            >
                <div class="room__wrapper-img">
                    <div
                        class="room__img"
                        :style="[`background-image: url(${item})`]"
                    ></div>
                </div>
            </SwiperSlide>

        </Swiper>

        <div class="room__description">
            <span>{{ room?.meters }} sq.m.</span>
            <span v-html="room?.description"></span>
        </div>
        <div class="room-features">
            <div class="room-features__title">Room Features:</div>
            <ul class="room-features__ul">
                <li class="room-features__li"
                    v-for="feature in room?.features"
                    :key="feature.id"
                >
                    {{ feature.title }}
                </li>
            </ul>
        </div>
        <div class="room__bottom">
            <a href="{{ room?.link }}" class="button">Book Now</a>
            <div class="room__price">
                <span>RATES FROM</span>
                £ {{ room?.price }}
            </div>
        </div>
    </div>
</template>

<script>

import {EffectFade, Navigation, Pagination, Autoplay} from 'swiper';
import {Swiper, SwiperSlide} from 'swiper/vue';


export default {
    name: "RoomsItem",
    components: {
        Swiper,
        SwiperSlide
    },
    props: {
        room: {
            type: Object
        }
    },
    data() {
        return {
            modules: [EffectFade, Pagination, Navigation, Autoplay],
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
