<template>

    <main-screen-slider/>

    <main>
        <section class="events">
            <div class="container">
                <h2>Events</h2>
                <div class="events__text">
                    The hotel is conveniently located to Baker Street Station with the Jubilee and Metropolitan line taking you to Wembley Park for Wembley Stadium or the Jubilee line taking you directly to North Greenwich for The 02 Arena, both venues staging major sporting or music events.
                </div>
            </div>
        </section>

        <discover-slider/>
    </main>
</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
import FirstScreenSlider from "../components/FirstScreenSlider";
import MainScreenSlider from "../components/FirstScreenSlider";
export default {
    name: "Events",
    components: {MainScreenSlider, FirstScreenSlider, DiscoverSlider}
}
</script>

<style scoped>

</style>
