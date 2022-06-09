<template>

    <MainScreenSlider/>

    <main>
        <section class="events">
            <div class="container">
                <h2>Events</h2>
                <div class="events__text">
                    The hotel is conveniently located to Baker Street Station with the Jubilee and Metropolitan line taking you to Wembley Park for Wembley Stadium or the Jubilee line taking you directly to North Greenwich for The 02 Arena, both venues staging major sporting or music events.
                </div>
            </div>
        </section>
        <DiscoverSlider/>
    </main>
</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
import MainScreenSlider from "../components/MainScreenSlider";
export default {
    name: "Events",
    components: {MainScreenSlider, DiscoverSlider}
}
</script>

<style scoped>

</style>
