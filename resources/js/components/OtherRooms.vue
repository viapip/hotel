<template>

    <section v-if="isHidden" class="other-rooms scroll-animation">
        <div class="container container--sm">
            <div class="other-rooms__wrapper">
                <div class="other-rooms__title scroll-animation__child">
                    Other Rooms
                </div>
                <div class="other-rooms__wrapper scroll-animation__child">
                    <other-rooms-item
                        v-for="room of rooms"
                        :room="room"
                        :key="room.id"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import OtherRoomsItem from "./OtherRoomsItem";
export default {
    name: "OtherRooms",
    components: {OtherRoomsItem},
    props: {
        rooms: {
            type: Array,
            required: true,
        },
        isHidden: {
            type: Boolean,
            default: false
        }
    },
    data () {
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
    },
    updated() {
        console.log(this.rooms, 'rooms')
    }
}
</script>

<style scoped>

</style>
