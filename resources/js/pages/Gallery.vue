<template>
    <header class="header" style="background: url('./img/gallery/Rectangle 2.png') center/cover no-repeat">
        <div class="container">
            <div class="header__wrapper">
                <h1>Gallery</h1>
                <div class="breadcrumb">
                    <a href="#" class="breadcrumb__item">Home</a>
                    <a href="#" class="breadcrumb__item">Gallery</a>
                </div>
            </div>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>

    <section class="gallery gallery--preview ">
        <div class="container">
            <div class="gallery__header">
                <div class="gallery__subtitle">Some images of our hotel</div>
                <div class="gallery__title">The Marylebone Inn Hotel</div>
            </div>
            <div class="gallery__wrapper">
                <div v-for="(item, index) of imagesPreview" :key="index" class="gallery__item item-gallery">
                    <div :style="{paddingBottom: computedPadding(index)}" class="item-gallery__wrapper">
                        <a :href='item' data-fancybox="gallery-preview" class="item-gallery__img"
                           :style="{backgroundImage: `url(${item})`}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section class="gallery gallery__main">
            <div class="container">
                <div class="gallery__header">
                    <div class="gallery__subtitle">Some images of our hotel</div>
                    <div class="gallery__title">The Marylebone Inn Hotel</div>
                </div>
                <div class="gallery__wrapper">
                    <div v-for="(item, index) of images" :key="index" class="gallery__item item-gallery"  >
                        <div :style="{paddingBottom: computedPadding(index)}" class="item-gallery__wrapper">
                            <a :href='item' data-fancybox="gallery" class="item-gallery__img"
                               :style="{backgroundImage: `url(${item})`}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <section class="discover">
        <div class="discover__wrapper">
            <div class="discover__overtitle">discover</div>
            <h2>Attractions near
                Baker Street Tube Station</h2>
            <div class="discover-slider">
                <div class="discover-slider__item"
                     style="background: url('./img/main/slider.jpg') center/cover no-repeat">
                    <a href="#">
                        <h6>Madame Tussauds</h6>
                    </a>
                </div>
                <div class="discover-slider__item"
                     style="background: url('./img/main/slider.jpg') center/cover no-repeat">
                    <a href="#">
                        <h6>Madame Tussauds</h6>
                    </a>
                </div>
                <div class="discover-slider__item"
                     style="background: url('./img/main/slider.jpg') center/cover no-repeat">
                    <a href="#">
                        <h6>Madame Tussauds</h6>
                    </a>
                </div>
                <div class="discover-slider__item"
                     style="background: url('./img/main/slider.jpg') center/cover no-repeat">
                    <a href="#">
                        <h6>Madame Tussauds</h6>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
// import {MagicGrid} from 'magic-grid/dist/magic-grid.min.js'

import MagicGrid from "magic-grid";
import {Fancybox} from '@fancyapps/ui'

export default {
    name: "Gallery",
    data() {
        return {
            galleryItems: [],
            ruleGrid: [325, 471, 416, 576, 359, 485, 473, 454, 567, 576, 359, 346, 473, 454, 428],
            percentForFunction: 416 / 100,
            gutter: window.innerWidth > 950? 30 : 10,
            images: ['./img/gallery/firstBLock/1.png', './img/gallery/firstBLock/2.png', './img/gallery/firstBLock/3.png', './img/gallery/firstBLock/4.png', './img/gallery/firstBLock/5.png', './img/gallery/firstBLock/6.png', './img/gallery/firstBLock/7.png', './img/gallery/firstBLock/8.png', './img/gallery/firstBLock/9.png', './img/gallery/firstBLock/10.png', './img/gallery/firstBLock/11.png', './img/gallery/firstBLock/12.png', './img/gallery/firstBLock/13.png', './img/gallery/firstBLock/14.png', './img/gallery/firstBLock/15.png'],
            imagesPreview: ['./img/gallery/firstBLock/1.png', './img/gallery/firstBLock/2.png', './img/gallery/firstBLock/3.png', './img/gallery/firstBLock/4.png', './img/gallery/firstBLock/5.png', './img/gallery/firstBLock/6.png', './img/gallery/firstBLock/7.png', './img/gallery/firstBLock/8.png', './img/gallery/firstBLock/9.png', './img/gallery/firstBLock/customBig.jpg', './img/gallery/firstBLock/customVert.jpg']

        }
    },
    computed: {},
    methods: {
        test() {
            new MagicGrid({
                container: ".gallery--preview .gallery__wrapper",
                static: true,
                animate: true,
                // items: 20,
                gutter: this.gutter,
            }).listen()
        },
        test1() {
            new MagicGrid({
                container: ".gallery__main .gallery__wrapper",
                static: true,
                animate: true,

                gutter: this.gutter,
                // items: 20,
                // gutter: this.gutter,
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
        // this.magicGrid.listen()
        console.log(this.gutter)
        this.test();
        Fancybox.bind("[data-fancybox]", {
            infinite: false,

        });
        this.test1()
    }
}
</script>

<style scoped>
/*@import "@fancyapps/ui/dist/fancybox.css";*/

</style>
