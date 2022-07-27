<template>
    <header class="header" :style="`background: url('${contacts?.image}') center/cover no-repeat`">

        <div class="header__gradient"></div>
        <div class="container">
            <div class="header__wrapper">
                <h1>{{ contacts?.title }}</h1>
                <div class="breadcrumb">
                    <a @click.prevent="linkTo('/')" href="#" class="breadcrumb__item">Home</a>
                    <a href="#" class="breadcrumb__item">{{ contacts?.title }}</a>
                </div>
            </div>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>

    <main>
        <contact-form
            :is-contact-page="true"
        />
        <DiscoverSlider/>
    </main>
</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
import VSelect from 'vue-select'
import ContactForm from "../components/ContactForm";
import linkTo from "../mixins/linkTo";

import {mapState} from "vuex";
import animationScroll from "../mixins/animationScroll";
export default {
    name: "Contact",
    components: {ContactForm, DiscoverSlider, VSelect},
    mixins: [linkTo, animationScroll],
    data(){
        return {
            options: [
                {
                    title: 'Question#1',
                    id: 0,
                },
                {
                    title: 'Question#2',
                    id: 1,
                },
            ]
        }
    },
    methods: {
        dropdownShouldOpen(VueSelect) {
            if (this.options !== null) {
                return VueSelect.open
            }

            return VueSelect.options.length !== 0 && VueSelect.open
        },
    },
    computed: {
        ...mapState({
            contacts: state => state.contacts.contacts
        })
    }
}
</script>

<style scoped>

</style>
