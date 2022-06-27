<template>
    <div
        class="room">
        <div class="room__overtitle">
            Room Only
        </div>
        <h3>{{title}}</h3>
        <Swiper
            @click="$router.push(`/` + slug)"
            class="room__swiper"
            :slidesPerView="1"
            :modules="modules"
            :pagination="pagination"
            :speed="1000"
        >
            <SwiperSlide
                class="room__swiper-slide"
                v-for="item in images"
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
            <span>{{ meters }} sq.m.</span>
            <span>{{ description }}</span>
        </div>
        <div class="room-features">
            <div class="room-features__title">Room Features:</div>
            <ul class="room-features__ul">
                <li class="room-features__li"
                    v-for="feature in features"
                    :key="feature.id"
                >
                    {{ feature.title }}
                </li>
            </ul>
        </div>
        <div class="room__bottom">
            <a href="{{ link }}" class="button">Book Now</a>
            <div class="room__price">
                <span>RATES FROM</span>
                £ {{ price }}
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
        images: {
            type: Array,
            default: ['img/rooms/room.jpg','img/rooms/room.jpg',]
        },
        title : {
            type: String,
            default: 'Single room'
        },
        meters : {
            type: String,
            default: '8'
        },
        description : {
            type: String,
            default: 'Single Bed (Extra beds are not available for this room)'
        },
        price : {
            type: String,
            default: '95.00'
        },
        link : {
            type: String,
            default: '#'
        },
        slug : {
            type: String,
            default: 'single-room'
        },
        features : {
            type: Array,
            default: () => {
                return [{
                    "id": 4,
                    "title": "Hair dryer",
                    "created_at": "2022-06-24T11:22:34.000000Z",
                    "updated_at": "2022-06-24T11:22:34.000000Z",
                    "pivot": {
                        "room_id": "3",
                        "feature_id": "4"
                    }
                }]
            }
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
