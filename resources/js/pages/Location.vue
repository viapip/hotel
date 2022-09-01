<template>

    <header class="header" :style="[`background: url(${data?.banner}) center/cover no-repeat`]">

        <div class="header__gradient"></div>
        <div class="container">
            <div class="header__wrapper">
                <h1>{{ data?.title }}</h1>
                <div class="breadcrumb">
                    <a @click.prevent="linkTo('/')" href="#" class="breadcrumb__item">Home</a>
                    <a href="#" class="breadcrumb__item">Location</a>
                </div>
            </div>
        </div>
        <a :href="booking" class="button-blur">Book Now</a>
    </header>

    <main>
        <section class="location scroll-animation">
            <div class="container container--sm">
                <div v-html="data?.description" class="location__text scroll-animation__child">
                </div>
                <div class="location__get scroll-animation__child" @click="openModal">Get directions</div>
            </div>
        </section>
        <DiscoverSlider/>
        <div v-if="isOpenModal" @click="closeModal" class="location-modal">
            <div class="location-modal__wrapper">
                <div id="locationMap" class="location-modal__content"></div>
            </div>
        </div>

        <div v-if="isOpenModal" class="modal-overlay"></div>
    </main>
</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
import {useFetchData} from "../hooks/useFetchData";
import loaderGoogleMaps from "../mixins/loaderGoogleMaps";
import linkTo from "../mixins/linkTo";
import animationScroll from "../mixins/animationScroll";
import {mapState} from "vuex";
export default {
    name: "Location",
    components: {DiscoverSlider},
    mixins: [loaderGoogleMaps, linkTo, animationScroll],
    setup(props) {
        const {data, isLoading} = useFetchData('/api/location-page');
        return {
            data, isLoading
        }
    },
    data() {
        return {
            isOpenModal: false,
        }
    },
    methods: {
        openModal() {
            this.isOpenModal = !this.isOpenModal;
            document.body.classList.add('openModal')
            this.loadGoogleMaps()
        },
        closeModal(e) {
            console.log(e.target)
            if (e.target.classList.contains('location-modal__wrapper')) {
                this.isOpenModal = false
                document.body.classList.remove('openModal');
                window.initMap = null;
            }
        },
        initMap(google) {
            const map = new google.maps.Map(
                document.getElementById("locationMap"),
                {
                    zoom: 14,
                    center: { lat: 51.5208603, lng: -0.1595759 },
                    disableDefaultUI: true,
                }
            );
            const marker = new google.maps.Marker({
                position: { lat: 51.5208603, lng: -0.1595759 },
                icon: '/img/GMap/end.png',
                map: map
            });
        },
    },
    computed: {
        ...mapState({
            booking: state => state.booking.booking,
        })
    },
    mounted() {
    },
}
</script>

<style scoped>

</style>
