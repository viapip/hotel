<template>

    <section  class="rooms-main scroll-animation">
        <div class="container">
            <h2 class="scroll-animation__child">{{ title }}</h2>
            <div class="rooms-main__text scroll-animation__child">
                {{ description }}
            </div>
            <div class="rooms-main__cards">
                <main-rooms-item
                    v-for="room of rooms"
                    :room="room"
                />
            </div>
            <div @click.prevent="$router.push('/rooms')" class="rooms-main__view-more scroll-animation__child">
                <a href="#" class="view-more">
                    <svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M56.5 28.5C56.5 32.177 55.7758 35.818 54.3686 39.2151C52.9615 42.6123 50.899 45.6989 48.299 48.299C45.6989 50.899 42.6123 52.9615 39.2151 54.3686C35.818 55.7758 32.177 56.5 28.5 56.5C24.823 56.5 21.182 55.7758 17.7849 54.3686C14.3877 52.9615 11.301 50.899 8.70101 48.299C6.10097 45.6989 4.0385 42.6123 2.63137 39.2151C1.22424 35.818 0.5 32.177 0.5 28.5C0.5 24.823 1.22424 21.182 2.63137 17.7849C4.03851 14.3877 6.10097 11.301 8.70101 8.70101C11.3011 6.10097 14.3878 4.0385 17.7849 2.63137C21.182 1.22424 24.823 0.5 28.5 0.5C32.177 0.5 35.818 1.22424 39.2151 2.63137C42.6123 4.03851 45.699 6.10097 48.299 8.70101C50.899 11.3011 52.9615 14.3878 54.3686 17.7849C55.7758 21.182 56.5 24.823 56.5 28.5L56.5 28.5Z"
                            stroke="#424454"/>
                        <path d="M21 29H37M37 29L29 21M37 29L29 37" stroke="#424454" stroke-linecap="square"
                              stroke-linejoin="bevel"/>
                    </svg>
                    <span>View more</span>
                </a>
            </div>

        </div>
    </section>
</template>

<script>
import MainRoomsItem from "./MainRoomsItem";

export default {
    name: "MainRooms",
    components: {MainRoomsItem},
    props: {
        rooms: {
            type: Array
        },
        title: {
            type: String,
        },
        description: {
            type: String,
        }
    },
}
</script>

<style scoped>

</style>
