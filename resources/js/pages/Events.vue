<template>

    <main-screen-slider
        :banner="data?.banner"
        :is-multiple-title="true"
    />

    <main>
        <section class="events">
            <div class="container">
                <h2>{{ data?.title }}</h2>
                <div v-html="data?.description" class="events__text">
                </div>
            </div>
        </section>

        <section class="events-links">
            <div class="container">
                <ul class="events-links_list">
                    <li class="events-links__item" v-for="item of data?.events">
                        <a :href="item.link" target="_blank" class="events-links__link">{{ item.title }}</a>
                    </li>
                </ul>
            </div>
        </section>

        <discover-slider/>
    </main>
</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
import FirstScreenSlider from "../components/FirstScreenSlider";
import MainScreenSlider from "../components/FirstScreenSlider";
import {useFetchData} from "../hooks/useFetchData";

export default {
    name: "Events",
    components: {MainScreenSlider, FirstScreenSlider, DiscoverSlider},
    setup() {
        const {data, isLoading} = useFetchData('/api/events-page')
        return {
            data, isLoading,
        }
    }
}
</script>

<style scoped>

</style>
