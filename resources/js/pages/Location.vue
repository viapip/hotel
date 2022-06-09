<template>

    <header class="header" style="background: url('./img/location/banner.jpg') center/cover no-repeat">
        <div class="container">
            <div class="header__wrapper">
                <h1>Location</h1>
                <div class="breadcrumb">
                    <a href="#" class="breadcrumb__item">Home</a>
                    <a href="#" class="breadcrumb__item">Location</a>
                </div>
            </div>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>

    <main>
        <section class="location">
            <div class="container container--sm">
                <div class="location__text">
                    Both Regents Park and Hyde Park are located within walking distance of the hotel. World famous Baker Street is within a few yards from the Hotel. The Sherlock Holmes and Madame Tussauds as well as open air theatres, many cafe's and restaurants. Oxford Street, the largest and most famous street famous for shopping in central London is within 5 minutes walk from the hotel.
                </div>
                <div class="location__get">Get directions</div>
            </div>
        </section>
        <DiscoverSlider/>
    </main>
</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
export default {
    name: "Location",
    components: {DiscoverSlider}
}
</script>

<style scoped>

</style>
