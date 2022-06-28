<template>

    <MainScreenSlider/>

    <main>
        <section class="about-page">
            <div class="container container--sm container--content-sm">
                <h2>{{ data?.title }}</h2>
                <div class="about-page__text">
                    {{ data?.description }}
                </div>
            </div>


            <about-slider
                :images="data?.images.split(',')"
            />



            <div class="container container--sm">
                <div class="events__text">
                    {{ data?.description_bottom }}
                </div>
            </div>
        </section>
        <section class="about-contact">
            <div class="container container--sm">
                <h2>Contact</h2>
                <div class="about-contact__contact">
                    Marylebone Inn Hotel
                    <br>
                    119 Gloucester Place W1U 6JX London United Kingdom
                    <br>
                    +44 (0) 207 486 7872
                    <br>
                    info@marhotel.co.uk
                </div>
                <form action="#" class="about-contact-form">
                    <div class="about-contact-form__line">
                        <div class="required">
                            <input type="text" class="form-text" placeholder="First Name*" required>
                        </div>
                        <div class="required">
                            <input type="text" class="form-text" placeholder="Last Name*" required>
                        </div>
                    </div>

                    <input type="text" class="form-text" placeholder="Enter your comments:">
                    <div class="form-term">
                        <input type="checkbox" id="term">
                        <label for="term">I accept the Terms and Conditions and the Privacy and Personal Data Policy, which
                            is an integral part thereof*</label>
                    </div>
                    <button class="button">Submit</button>
                </form>
            </div>
        </section>
    </main>
</template>

<script>
import MainScreenSlider from "../components/FirstScreenSlider";
import ArrowsSlider from "../components/UI/ArrowsSlider";
import DiscoverSlider from "../components/DiscoverSlider";
import {Swiper, SwiperSlide} from "swiper/vue";
import AboutSlider from "../components/AboutSlider";
import {useFetchData} from "../hooks/useFetchData";
export default {
    name: "About",
    components: {
        AboutSlider,
        MainScreenSlider,
    },
    setup() {
        const {data, isLoading} = useFetchData('/api/about-page')
        return {
            data, isLoading,
        }
    },
}
</script>

<style scoped>

</style>
