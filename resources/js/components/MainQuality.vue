<template>
    <section class="quality scroll-animation">
        <div class="container">
            <div class="quality__wrapper">
                <h2 class="scroll-animation__child">{{ title }}</h2>
                <div class="quality__text scroll-animation__child">
                    {{ text }}
                </div>
                <a :href="buttonLink"  class="button scroll-animation__child">
                    {{ buttonText }}
                </a>
            </div>
        </div>
    </section>
</template>

<script>
import {mapState} from "vuex";

export default {
    name: "MainQuality",
    props: {
        title: {
            type: String,
            default: "Quality Services",
        },
        text: {
            type: String,
            default: "Our friendly guest services team is available 24 hours a day solely dedicated to assisting you with any aspect of your stay. Marylebone Inn Hotel is definitely a great spot from which to explore all that this fantastic city has to offer. Whether you are visiting London for one night, one month or longer, Marylebone Inn will provide you with a comfortable and secure base, conveniently located and at the most competitive prices guaranteed. We are known for providing the most comfortable beds in the most modern rooms at very competitive prices.",
        },
        buttonText: {
            type: String,
            default: "Book Now",
        },
        buttonLink: {
            type: String,
            default: "/",
        },
    },
    computed: {
        ...mapState({
            booking: state => state.booking.booking,
        })
    },
}
</script>

<style scoped>

</style>
