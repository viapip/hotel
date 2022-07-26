<template>
    <div
        v-if="!isHidden"
        class="room scroll-animation">
        <div class="room__overtitle scroll-animation__child">
            Room Only
        </div>
        <h3 class="scroll-animation__child"
            @click="$router.push(`/rooms/` + room.slug)"
        >{{room?.title}}</h3>
        <Swiper
            class="room__swiper scroll-animation__child"
            :slidesPerView="1"
            :modules="modules"
            :pagination="pagination"
            :speed="1000"
            :autoplay="{
          delay: 2000,
          disableOnInteraction: true,
    }"
        >
            <SwiperSlide
                class="room__swiper-slide"
                v-for="item in room?.images.split(',')"
                :key="item"
            >
                <div class="room__wrapper-img">
                    <div
                        class="room__img"
                        :style="[`background-image: url(/${item})`]"
                    ></div>
                </div>
            </SwiperSlide>

        </Swiper>

        <div class="room__description scroll-animation__child">
            <span>{{ room?.meters }} sq.m.</span>
            <span v-html="room?.description"></span>
        </div>
        <div class="room-features scroll-animation__child">
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
        <div class="room__bottom scroll-animation__child">
            <a :href="room?.link" class="button">Book Now</a>
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
import animationScroll from "../mixins/animationScroll";


export default {
    name: "RoomsItem",
    mixins: [animationScroll],
    components: {
        Swiper,
        SwiperSlide
    },
    props: {
        room: {
            type: Object
        },

        isHidden: {
            type: Boolean,
            default: false,
        }
    },
    data() {
        return {
            props: {
            },
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
