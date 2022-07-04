<template>

    <header class="header" :style='[`background: url(/${data?.[0].preview_image}) center/cover no-repeat`]'>

        <div class="header__gradient"></div>
        <div class="container">
            <div class="header__wrapper">
                <h1> {{ data?.[0].title }}</h1>
                <div class="breadcrumb">
                    <a @click.prevent="linkTo('/')" href="#" class="breadcrumb__item">Home</a>
                    <a @click.prevent="linkTo('/rooms')" href="#" class="breadcrumb__item">Rooms</a>
                    <a href="#" class="breadcrumb__item">Single room</a>
                </div>
            </div>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>

    <main>
        <section>
            <div class="container container--sm">
                <rooms-item
                    v-for="room in data"
                    :key="room.id"
                    :room="room"
                />
            </div>
        </section>

        <other-rooms
            :rooms="data?.[0].others"
        />

        <discover-slider/>
    </main>

</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
import {useFetchData} from "../hooks/useFetchData";
import {useRoute, useRouter} from "vue-router";
import router from "../router/router";
import RoomsItem from "../components/RoomsItem";
import OtherRooms from "../components/OtherRooms";
import linkTo from "../mixins/linkTo";

export default {
    name: "SingleRoom",
    components: {OtherRooms, RoomsItem, DiscoverSlider},
    mixins: [linkTo],
    setup(props, context) {
        const route = useRoute()
        console.log(route.params)
        const {data, isLoading} = useFetchData('/api/room/' + route.params.slug)
        return {
            data, isLoading
        }
    },
    data() {
        return {}
    },
    // beforeCreate() {
    //     this.params = this.$router.params
    // }
    mounted() {
        console.log(this.$router.getRoutes(), 'router');
    }
}
</script>

<style scoped>

</style>
