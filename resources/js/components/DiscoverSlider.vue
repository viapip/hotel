<template>

    <section class="discover scroll-animation">

        <!--        <div ref="margin" class="container" style="width:100%; overflow: hidden;"></div>-->
        <div class="discover__wrapper container">
            <div class="discover__overtitle scroll-animation__child">{{ discovery?.under_title }}</div>
            <div class="discover__head">
                <h2 class="scroll-animation__child">{{ discovery?.title }}</h2>
                <div class="discover__remote scroll-animation__child">
                    <ArrowsSlider
                        :isDouble="false"
                        @clickPrev="swiper.slidePrev()"
                        @clickNext="swiper.slideNext()"
                    />
                </div>
            </div>
            <div class="discover__content">
                <Swiper
                    class="discover-slider"
                    :slidesPerView="1"
                    :space-between="30"
                    :modules="modules"
                    @swiper="onSwiper"
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
                        @click="openModal(item)"
                        class="discover-slider__item scroll-animation__child"
                        v-for="item of discovery?.items"
                    >
                        <div class="discover-slider__inner">
                            <div style="overflow: hidden" class="discover-slider__img-wrapper">
                                <div class="discover-slider__img"
                                     :style="[`background: url(/${item.image}) center/cover no-repeat`]"></div>
                                <div class="discover-slider__gradient"></div>
                            </div>
                            <div class="discover-slider__content">
                                <button class="discover-slider__button">
                                    view the route
                                </button>
                                <h6>{{ item.title }}</h6>
                            </div>
                        </div>
                    </SwiperSlide>
                </Swiper>

            </div>
            <div v-if="isOpenModal" @click="closeModal" class="discover__modal modal-discover">
                <div class="modal-discover__wrapper">
                    <div class="modal-discover__content">
                        <img :src="'/'+ modalContent?.image" alt="" class="modal-discover__img">
                        <div class="modal-discover__content-wrapper">

                            <div class="modal-discover__footer">
                                <div class="modal-discover__footer-title">{{ modalContent?.from }}</div>
                                <div class="modal-discover__footer-buttons">
                                    <div class="modal-discover__footer-button active">
                                        <input  type="radio" value="DRIVING" id="type1" name="mode"
                                                @change="changeMode"/>
                                        <label for="type1">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect width="16" height="16" fill="url(#pattern0)"/>
                                                <defs>
                                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox"
                                                             width="1" height="1">
                                                        <use xlink:href="#image0_530_1659"
                                                             transform="scale(0.00195312)"/>
                                                    </pattern>
                                                    <image id="image0_530_1659" width="512" height="512"
                                                           xlink:href="data:image/png;base64,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"/>
                                                </defs>
                                            </svg>
                                        </label>

                                    </div>
                                    <div class="modal-discover__footer-button active">
                                        <input checked type="radio" id="type2" value="WALKING" name="mode"
                                               @change="changeMode"/>
                                        <label for="type2">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <rect width="16" height="16" fill="url(#pattern1)"/>
                                                <defs>
                                                    <pattern id="pattern1" patternContentUnits="objectBoundingBox"
                                                             width="1" height="1">
                                                        <use xlink:href="#image0_644_2074"
                                                             transform="scale(0.00195312)"/>
                                                    </pattern>
                                                    <image id="image0_644_2074" width="512" height="512"
                                                           xlink:href="data:image/png;base64,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"/>
                                                </defs>
                                            </svg>
                                        </label>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-discover__title"> {{ modalContent?.title }}</div>
                            <div v-html="modalContent?.description" class="modal-discover__text">
                            </div>
                        </div>
                    </div>
                    <div id="map" class="modal-discover__map"></div>
                </div>
            </div>
            <div v-if="isOpenModal" class="modal-overlay"></div>
        </div>
    </section>
</template>

<script>

import {Navigation, Pagination} from 'swiper';
import {Swiper, SwiperSlide} from 'swiper/vue';
import "swiper/css/pagination";
import ArrowsSlider from "./UI/ArrowsSlider";
import {Loader, LoaderOptions} from 'google-maps';
import loaderGoogleMaps from "../mixins/loaderGoogleMaps";
import {mapState} from "vuex";

export default {
    name: "DiscoverSlider",
    components: {
        ArrowsSlider,
        Swiper,
        SwiperSlide,
    },
    mixins: [loaderGoogleMaps],
    data() {
        return {
            swiper: null,
            modules: [Pagination, Navigation],
            isOpenModal: false,
            modalContent: null,
            GMapsIsReady: false,
            directionsRenderer: null,
            directionsService: null,
            map: null,
            mapsMode: 'WALKING',
            endPoint: '/img/GMap/end.png',
            startPoint: '/img/GMap/start.png',
            markers: [],
            styledMap: [
                {
                    elementType: "geometry",
                    stylers: [{color: "#f5f5f5"}],
                },
                {
                    elementType: "labels.icon",
                    stylers: [{visibility: "off"}],
                },
                {
                    elementType: "labels.text.fill",
                    stylers: [{color: "#616161"}],
                },
                {
                    elementType: "labels.text.stroke",
                    stylers: [{color: "#f5f5f5"}],
                },
                {
                    featureType: "administrative.land_parcel",
                    elementType: "labels.text.fill",
                    stylers: [{color: "#bdbdbd"}],
                },
                {
                    featureType: "poi",
                    elementType: "geometry",
                    stylers: [{color: "#eeeeee"}],
                },
                {
                    featureType: "poi",
                    elementType: "labels.text.fill",
                    stylers: [{color: "#757575"}],
                },
                {
                    featureType: "poi.park",
                    elementType: "geometry",
                    stylers: [{color: "#e5e5e5"}],
                },
                {
                    featureType: "poi.park",
                    elementType: "labels.text.fill",
                    stylers: [{color: "#9e9e9e"}],
                },
                {
                    featureType: "road",
                    elementType: "geometry",
                    stylers: [{color: "#ffffff"}],
                },
                {
                    featureType: "road.arterial",
                    elementType: "labels.text.fill",
                    stylers: [{color: "#757575"}],
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry",
                    stylers: [{color: "#dadada"}],
                },
                {
                    featureType: "road.highway",
                    elementType: "labels.text.fill",
                    stylers: [{color: "#616161"}],
                },
                {
                    featureType: "road.local",
                    elementType: "labels.text.fill",
                    stylers: [{color: "#9e9e9e"}],
                },
                {
                    featureType: "transit.line",
                    elementType: "geometry",
                    stylers: [{color: "#e5e5e5"}],
                },
                {
                    featureType: "transit.station",
                    elementType: "geometry",
                    stylers: [{color: "#eeeeee"}],
                },
                {
                    featureType: "water",
                    elementType: "geometry",
                    stylers: [{color: "#c9c9c9"}],
                },
                {
                    featureType: "water",
                    elementType: "labels.text.fill",
                    stylers: [{color: "#9e9e9e"}],
                },
            ]
        }
    },
    methods: {
        log() {
            console.log(123)
        },
        setModalContent(content) {
            this.modalContent = content;
        },

        clearModalContent() {
            this.modalContent = null;
        },

        changeMode(e) {
            this.mapsMode = e.target.value;
            this.calculateAndDisplayRoute(this.directionsService, this.directionsRenderer);
        },

        onSwiper(swiper) {
            this.swiper = swiper
        },

        closeModal(e) {
            console.log(e)
            if (!e.target.closest('.modal-discover__wrapper')) {
                this.isOpenModal = false
                document.body.classList.remove('openModal');
                window.initMap = null;
                this.clearModalContent()
            }
        },

        toggleActive(e) {
            e.stopPropagation();
            e.target.classList.toggle('active')
        },

        openModal(item) {
            this.setModalContent(item)
            this.isOpenModal = !this.isOpenModal;
            document.body.classList.add('openModal')
            this.loadGoogleMaps()
        },

        initMap(google) {
            this.directionsRenderer = new google.maps.DirectionsRenderer();
            this.directionsService = new google.maps.DirectionsService();
            this.map = new google.maps.Map(
                document.getElementById("map"),
                {
                    zoom: 14,
                    center: {lat: Number(this.modalContent.latitude_a), lng: Number(this.modalContent.longitude_a)},
                    disableDefaultUI: true,
                }
            );
            this.map.setOptions({styles: this.styledMap})
            this.directionsRenderer.setMap(this.map);
            this.directionsRenderer.setOptions({suppressMarkers: true});
            this.directionsRenderer.setOptions({polylineOptions: {strokeColor: "#565656", strokeWeight: 4}});

            this.calculateAndDisplayRoute(this.directionsService, this.directionsRenderer);
        },

        calculateAndDisplayRoute(directionsService, directionsRenderer) {
            console.log(this.modalContent.latitude_a)
            const start = {
                location: {lat: Number(this.modalContent.latitude_a), lng: Number(this.modalContent.longitude_a)},
                icon: this.startPoint,
            }
            const end = {
                location: {lat: Number(this.modalContent.latitude_b), lng: Number(this.modalContent.longitude_b)},
                icon: this.endPoint,
            }
            directionsService
                .route({
                    origin: start.location,
                    destination: end.location,
                    travelMode: google.maps.TravelMode[this.mapsMode],
                })
                .then((response) => {
                    console.log(response)
                    this.deletingMarkers()
                    this.addedMarkers(start);
                    this.addedMarkers(end);
                    directionsRenderer.setDirections(response);
                })
                .catch((e) => window.alert("Directions request failed due to " + status));
        },

        addedMarkers(item) {
            const marker = new google.maps.Marker({
                position: item.location,
                icon: item.icon,
                map: this.map
            });
            this.markers.push(marker);
        },

        deletingMarkers() {
            if (this.markers.length) {
                this.markers.forEach(marker => marker.setMap(null))
            }
            this.markers = []
        },

    },
    computed: {
        ...mapState({
            discovery: state => state.discovery.discovery
        })
    },
    mounted() {

        // this.loadGoogleMaps()
    },
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
