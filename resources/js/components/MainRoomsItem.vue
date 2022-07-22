<template>
    <div @click="$router.push('/rooms/'+ room.slug)" class="room-card-small scroll-animation__child">
        <div class="image-wrapper-full-width">
            <div class="room-card-small__img" :style="[`backgroundImage : url('${room.preview_image}')`]">
                </div>
        </div>
        <h6>{{ room.title }}</h6>
        <div v-html="room.description" class="room-card-small__text">
        </div>
    </div>
</template>

<script>
export default {
    name: "MainRoomsItem",
    props: {
        room: {
            type: Object
        }
    },
}
</script>

<style scoped>

</style>
