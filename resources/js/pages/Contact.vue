<template>
    <header class="header" style="background: url('./img/contact/banner.jpg') center/cover no-repeat">
        <div class="container">
            <div class="header__wrapper">
                <h1>Contact</h1>
                <div class="breadcrumb">
                    <a href="#" class="breadcrumb__item">Home</a>
                    <a href="#" class="breadcrumb__item">Contact</a>
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
export default {
    name: "Contact",
    components: {ContactForm, DiscoverSlider, VSelect},
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
}
</script>

<style scoped>

</style>
