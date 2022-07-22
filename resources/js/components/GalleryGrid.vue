<template>
    <section :class="['gallery', 'gallery--' + item.id]">
        <div class="container">
            <div class="gallery__header">
                <div class="gallery__subtitle">{{ item.category_undertitle }}</div>
                <div class="gallery__title">{{ item.category_title }}</div>
            </div>
            <div v-if="item.images" class="gallery__wrapper">
                <div v-for="(image, index) of item.images.split(',')" :key="index" class="gallery__item item-gallery scroll-animation ">
                    <div :style="{paddingBottom: computedPadding(index)}" class="item-gallery__wrapper scroll-animation__child slowly">
                        <a :href='image' :data-fancybox="['gallery-' + item.id]" class="item-gallery__img"
                           :style="{backgroundImage: `url(${image})`}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

import MagicGrid from "magic-grid";
import {Fancybox} from '@fancyapps/ui'
import animationScroll from "../mixins/animationScroll";

export default {
    name: "GalleryGrid",
    props: {
      item: {
          type: Object,
          required: true,
      }
    },
    mixins: [animationScroll],
    data () {
        return {
            ruleGrid: [325, 471, 416, 576, 359, 485, 473, 454, 567, 576, 359, 346, 473, 454, 428],
            percentForFunction: 416 / 100,
            gutter: window.innerWidth > 950? 30 : 10,
            images: ['./img/gallery/firstBLock/1.png', './img/gallery/firstBLock/2.png', './img/gallery/firstBLock/3.png', './img/gallery/firstBLock/4.png', './img/gallery/firstBLock/5.png', './img/gallery/firstBLock/6.png', './img/gallery/firstBLock/7.png', './img/gallery/firstBLock/8.png', './img/gallery/firstBLock/9.png', './img/gallery/firstBLock/10.png', './img/gallery/firstBLock/11.png', './img/gallery/firstBLock/12.png', './img/gallery/firstBLock/13.png', './img/gallery/firstBLock/14.png', './img/gallery/firstBLock/15.png'],

        }
    },
    methods: {
        test() {
            new MagicGrid({
                container: `.gallery--${this.item.id} .gallery__wrapper`,
                static: true,
                animate: true,
                // items: 20,
                gutter: this.gutter,
            }).listen()
        },
        getCounter(i) {
            const max = this.ruleGrid.length - 1
            if (i > max) {
                return i % max - 1
            } else {
                return i
            }
        },
        computedPadding(index) {
            let percent = 0
            const counter = this.getCounter(index)
            percent = Math.ceil(this.ruleGrid[counter] / this.percentForFunction) + '%'
            return percent
        }

    },
    mounted() {
        if (this.item.images) {

        this.test();
        Fancybox.bind("[data-fancybox]", {
            infinite: false,
        });
        }
    }
}
</script>

<style scoped>

</style>
