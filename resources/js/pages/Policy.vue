<template>

    <header class="header header--contact" :style="[`background: url(${data?.image}) center/cover no-repeat`]">
        <div class="container">
            <div class="header__wrapper">
                <h1> {{ data?.title}} </h1>
                <div class="breadcrumb">
                    <a @click.prevent="linkTo('/')" href="#" class="breadcrumb__item">Home</a>
                    <a href="#" class="breadcrumb__item">Privacy and Data Policy </a>
                </div>
            </div>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>

    <main>
        <section class="policy">
            <div class="container container--sm">
                <div class="policy__title">
                    Privacy and Personal Data Policy - applicable to Users of this Hospitality Business when making a
                    reservation.
                </div>
                <span v-html="data?.description"></span>
            </div>
        </section>
    </main>

</template>

<script>
import {useFetchData} from "../hooks/useFetchData";
import linkTo from "../mixins/linkTo";

export default {
    name: "Policy",
    mixins: [linkTo],
    setup() {
        const {data, isLoading} = useFetchData('/api/privacy')
        return {
            data, isLoading
        }
    },
}
</script>

<style scoped>

</style>
