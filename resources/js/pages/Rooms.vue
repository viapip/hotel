<template>

    <header class="header" style="background: url('./img/rooms/banner.jpg') center/cover no-repeat">
        <div class="container">
            <div class="header__wrapper">
                <h1>Rooms</h1>
                <div class="breadcrumb">
                    <a href="#" class="breadcrumb__item">Home</a>
                    <a href="#" class="breadcrumb__item">Rooms</a>
                </div>
            </div>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>

    <main>
        <section>
            <div class="container container--sm">
                <rooms-item
                    v-for="room in data?.items"
                    :key="room.id"
                    :title="room.title"
                    :description="room.description"
                    :features="room.features"
                    :images="[room.images]"
                    :link="room.link"
                    :meters="room.meters"
                    :price="room.price"
                />
            </div>
        </section>
        <DiscoverSlider/>
    </main>

</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
import RoomsItem from "../components/RoomsItem";

export default {
    name: "Rooms",
    components: {RoomsItem, DiscoverSlider},
    data() {
        return {
            data: null,
        }
    },
    methods: {
       async fetchData() {
          try {
              const response = await fetch(process.env.MIX_HOST_API);
              this.data = response.json();
          } catch (e) {
              console.log(e)
          }
        },
    },
}
</script>

<style scoped>

</style>
