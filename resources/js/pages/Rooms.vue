<template>

    <header class="header" :style="[`background: url('${data?.banner}') center/cover no-repeat`]">
        <div class="container">
            <div class="header__wrapper">
                <h1>{{ data?.title }}</h1>
                <div class="breadcrumb">
                    <a @click.prevent="linkTo('/')" href="#" class="breadcrumb__item">Home</a>
                    <a href="#" class="breadcrumb__item">Rooms</a>
                </div>
            </div>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>

    <main>
        <section>
            <div class="container container--sm">
                <rooms-item
                    v-for="room in data?.items"
                    :key="room.id"
                    :room="room"
                />
            </div>
        </section>
        <DiscoverSlider/>
    </main>

</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
import RoomsItem from "../components/RoomsItem";
import {useFetchData} from "../hooks/useFetchData";
import linkTo from "../mixins/linkTo";

export default {
    name: "Rooms",
    components: {RoomsItem, DiscoverSlider},
    mixins: [linkTo],
    setup(props) {
        const {data, isLoading} = useFetchData('/api/rooms-page')
        console.log(data)
        return {
            data, isLoading
        }
    },
    data() {
        return {
            // data: null,
        }
    },
    methods: {
    },
}
</script>

<style scoped>

</style>
