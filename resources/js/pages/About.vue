<template>

    <MainScreenSlider/>

    <main>
        <section class="about-page">
            <div class="container container--sm container--content-sm">
                <h2>About Marylebone</h2>
                <div class="about-page__text">
                    Marylebone Inn Hotel is definitely a great spot from which to explore all that this fantastic city has
                    to offer.
                    <br>
                    <br>
                    Whether you are visiting London for one night, one month or longer, Marylebone Inn will provide you with
                    a comfortable and secure base, conveniently located and at the most competitive prices guaranteed. We
                    are known for providing the most comfortable beds in the most modern rooms at very competitive prices.

                    <br>
                    <br>
                    <br>
                    <img src="img/about/about.jpg" alt="">

                    <br>
                    <br>
                    <br>
                    Our en-suite rooms provide the perfect alternative to a hotel. We have 22 fully refurbished en-suite
                    bedrooms available. Each has its own brand new kitchen and bathrooms with plasma TV's and broadband in
                    every room.

                </div>
            </div>
            <div class="about-slider">
                <img src="img/about/slider.jpg" alt="">
            </div>

            <div class="container container--sm">
                <div class="events__text">
                    Our desire is to ensure you feel entirely at home, which is stylishly furnished and boasts a relaxed and
                    friendly atmosphere, sure to appeal to business and pleasure guests.
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
import MainScreenSlider from "../components/MainScreenSlider";
export default {
    name: "About",
    components: {MainScreenSlider}
}
</script>

<style scoped>

</style>
