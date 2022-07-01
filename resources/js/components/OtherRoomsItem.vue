<template>
    <div :class="['other-rooms__item', 'collapse-room', {'active': isActive }]">
        <div class="collapse-room__subtitle">Room Only</div>
        <div class="collapse-room__wrapper">
            <div class="collapse-room__header">
                <div class="collapse-room__title">{{ room.title }}</div>
                <button class="collapse-room__button" @click="toggleRooms">
                    <span></span>
                    <span></span>
                </button>
            </div>
            <div class="collapse-room__action-block">
                <div class="collapse-room__hidden-wrapper">
                    <div class="collapse-room__img-wrapper">
                        <div :style="[`background-image: url(/${room.preview_image})`]"
                             class="collapse-room__img"></div>
                    </div>
                    <div class="collapse-room__content">
                        <ul class="collapse-room__list">
                            <li class="collapse-room__list-item"
                                v-for="feature of room.features"
                            >
                                {{ feature.title }}
                            </li>
                        </ul>
                        <a @click="$router.push('/' + room.slug)"
                           class="collapse-room__more view-more">
                            <svg width="57" height="57" viewBox="0 0 57 57" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M56.5 28.5C56.5 32.177 55.7758 35.818 54.3686 39.2151C52.9615 42.6123 50.899 45.6989 48.299 48.299C45.6989 50.899 42.6123 52.9615 39.2151 54.3686C35.818 55.7758 32.177 56.5 28.5 56.5C24.823 56.5 21.182 55.7758 17.7849 54.3686C14.3877 52.9615 11.301 50.899 8.70101 48.299C6.10097 45.6989 4.0385 42.6123 2.63137 39.2151C1.22424 35.818 0.5 32.177 0.5 28.5C0.5 24.823 1.22424 21.182 2.63137 17.7849C4.03851 14.3877 6.10097 11.301 8.70101 8.70101C11.3011 6.10097 14.3878 4.0385 17.7849 2.63137C21.182 1.22424 24.823 0.5 28.5 0.5C32.177 0.5 35.818 1.22424 39.2151 2.63137C42.6123 4.03851 45.699 6.10097 48.299 8.70101C50.899 11.3011 52.9615 14.3878 54.3686 17.7849C55.7758 21.182 56.5 24.823 56.5 28.5L56.5 28.5Z"
                                    stroke="#424454"></path>
                                <path d="M21 29H37M37 29L29 21M37 29L29 37" stroke="#424454" stroke-linecap="square"
                                      stroke-linejoin="bevel"></path>
                            </svg>
                            <span>View more</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "OtherRoomsItem",
    props: {
        room: {
            type: Object,
        }
    },
    data() {
        return {
            isActive: false
        };
    },
    methods: {
        toggleRooms() {
            this.isActive = !this.isActive
        },
    },
    mounted() {
        console.log(this.room, 'room')
    }
}
</script>

<style scoped>

</style>
