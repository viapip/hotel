<template>

    <section class="other-rooms">
        <div class="container container--sm">
            <div class="other-rooms__wrapper">
                <div class="other-rooms__title">
                    Other Rooms {{rooms?.[0].title}}
                </div>
                <div class="other-rooms__wrapper">
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
        console.log(this.rooms, 'room')
    },
    updated() {
        console.log(this.rooms, 'rooms')
    }
}
</script>

<style scoped>

</style>
