<template>
    <header class="header" style="background: url('./img/gallery/Rectangle 2.png') center/cover no-repeat">

        <div class="header__gradient"></div>
        <div class="container">
            <div class="header__wrapper">
                <h1>{{ data?.title }}</h1>
                <div class="breadcrumb">
                    <a @click.prevent="linkTo('/')" href="#" class="breadcrumb__item">Home</a>
                    <a href="#" class="breadcrumb__item">{{ data?.title }}</a>
                </div>
            </div>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>

    <gallery-grid
        v-for="item in data?.items"
        :item="item"
    />
    <DiscoverSlider/>
</template>

<script>
// import {MagicGrid} from 'magic-grid/dist/magic-grid.min.js'

import MagicGrid from "magic-grid";
import {Fancybox} from '@fancyapps/ui'
import DiscoverSlider from "../components/DiscoverSlider";
import GalleryGrid from "../components/GalleryGrid";
import {useFetchData} from "../hooks/useFetchData";
import linkTo from "../mixins/linkTo";

export default {
    name: "Gallery",
    components: {GalleryGrid, DiscoverSlider},
    mixins: [linkTo],
    setup() {
        const {data, isLoading} = useFetchData('/api/gallery')
        return {
            data
        }
    },
    data() {
        return {}
    },
    computed: {},
    methods: {

        test(item) {
            new MagicGrid({
                container: `.gallery--${item.id} .gallery__wrapper`,
                static: true,
                animate: true,
                // items: 20,
                gutter: this.gutter,
            }).listen()
        },
    },
    mounted() {}
}
</script>

<style scoped>
/*@import "@fancyapps/ui/dist/fancybox.css";*/

</style>
