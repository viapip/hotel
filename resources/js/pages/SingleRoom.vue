<template>

    <header class="header" :style='[`background: url(/${data?.[0].preview_image}) center/cover no-repeat`]'>

        <div class="header__gradient"></div>
        <div class="container">
            <div class="header__wrapper">
                <h1> {{ data?.[0].title }}</h1>
                <div class="breadcrumb">
                    <a @click.prevent="linkTo('/')" href="#" class="breadcrumb__item">Home</a>
                    <a @click.prevent="linkTo('/rooms')" href="#" class="breadcrumb__item">Rooms</a>
                    <a href="#" class="breadcrumb__item">{{ data?.[0].title }}</a>
                </div>
            </div>
        </div>
        <a :href="data?.[0].link" class="button-blur">Book Now</a>
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
            :is-hidden="data"
        />

        <discover-slider/>
    </main>

</template>

<script>

import DiscoverSlider from "../components/DiscoverSlider";
import {useFetchData} from "../hooks/useFetchData";
import {onBeforeRouteUpdate, useRoute, useRouter} from "vue-router";
import router from "../router/router";
import RoomsItem from "../components/RoomsItem";
import OtherRooms from "../components/OtherRooms";
import linkTo from "../mixins/linkTo";
import {watch} from "vue";
import animationScroll from "../mixins/animationScroll";

export default {
    name: "SingleRoom",
    components: {OtherRooms, RoomsItem, DiscoverSlider},
    mixins: [linkTo, animationScroll],
    setup(props, context) {
        const route = useRoute()
        let {data, isLoading} = useFetchData('/api/room/' + route.params.slug)

        // watch(
        //     () => route.params.slug,
        //     async newId => {
        //         console.log('updated url', route)
        //         let response = await useFetchData('/api/room/' + route.params.slug)
        //         console.log(response, 'response from watch')
        //         data.value = response.data.value
        //     }
        // )
        onBeforeRouteUpdate(async (to, from) => {
            if (to.params.slug !== from.params.slug) {
                console.log('updated url', to.params.slug)
                 data.value = await (await fetch('/api/room/' + to.params.slug )).json()
            }
        })
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
    },
}
</script>

<style scoped>

</style>
