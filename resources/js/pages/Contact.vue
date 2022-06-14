<template>
    <header class="header" style="background: url('./img/contact/banner.jpg') center/cover no-repeat">
        <div class="container">
            <div class="header__wrapper">
                <h1>Contact</h1>
                <div class="breadcrumb">
                    <a href="#" class="breadcrumb__item">Home</a>
                    <a href="#" class="breadcrumb__item">Contact</a>
                </div>
            </div>
        </div>
        <a href="#" class="button-blur">Book Now</a>
    </header>

    <main>
        <section class="contact">
            <div class="container container--sm">
                <div class="contact__title">
                    Contact
                </div>
                <div class="contact__text">
                    Marylebone Inn Hotel
                    <br>
                    119 Gloucester Place W1U 6JX London United Kingdom
                    <br>
                    +44 (0) 207 486 7872
                    <br>
                    info@marhotel.co.uk
                </div>
                <form action="#" class="contact-form">
                    <div class="contact-form__line">
                        <div class="form-group required">
                            <input type="text" class="form-text" placeholder="First Name*" required>
                        </div>
                        <div class="form-group required">
                            <input type="text" class="form-text" placeholder="Last Name*" required>
                        </div>
                    </div>
                    <div class="contact-form__line">
                        <div class="form-group required">
                            <input type="email" class="form-text" placeholder="Your email*" required>
                        </div>
                        <div class="form-group required">
                            <input type="tel" class="form-text" placeholder="Phone number*" required>
                        </div>
                    </div>
                    <div class="contact-form__line">
                        <div class="form-group">

                            <VSelect
                                label="title"
                                class="custom-select"
                                placeholder="Select the type of issue or question"
                                :options="options"
                                :appendToBody="true"
                                :closeOnSelect="false"
                            >
                                <template #option="{ title, id }">
                                    <span style="margin: 0">{{ title }}</span>
                                </template>
                                <template #no-options="{ search, searching, loading }">
                                    This is the no options slot.
                                </template>
                            </VSelect>
                        </div>
                        <div class="form-group required">
                            <input type="text" class="form-text" placeholder="State*">
                        </div>
                    </div>
                    <div class="contact-form__line">
                        <div style="margin-right: 0" class="form-group">

                            <VSelect
                                label="title"
                                class="custom-select"
                                placeholder="Select the type of issue or question"
                                :options="options"
                                :appendToBody="true"
                                :closeOnSelect="false"
                            >
                                <template #option="{ title, id }">
                                    <span style="margin: 0">{{ title }}</span>
                                </template>
                                <template #no-options="{ search, searching, loading }">
                                    This is the no options slot.
                                </template>
                            </VSelect>
                        </div>
                    </div>
                    <div class="contact-form__line">
                        <div class="form-group">
                            <input type="text" class="form-text" placeholder="Enter your comments:">
                        </div>
                    </div>

                    <div class="form-term">
                        <input type="checkbox" id="term" required>
                        <label for="term">I accept the Terms and Conditions and the Privacy and Personal Data Policy, which
                            is an integral part thereof*</label>
                    </div>
                    <div class="form-term">
                        <input type="checkbox" id="promotions">
                        <label for="promotions">Please notify me of any special offers or promotions</label>
                    </div>
                    <button class="button button--dark">Submit</button>
                </form>
            </div>
        </section>
        <DiscoverSlider/>
    </main>
</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
import VSelect from 'vue-select'
export default {
    name: "Contact",
    components: {DiscoverSlider, VSelect},
    data(){
        return {
            options: [
                {
                    title: 'Question#1',
                    id: 0,
                },
                {
                    title: 'Question#2',
                    id: 1,
                },
            ]
        }
    },
    methods: {
        dropdownShouldOpen(VueSelect) {
            if (this.options !== null) {
                return VueSelect.open
            }

            return VueSelect.options.length !== 0 && VueSelect.open
        },
    },
}
</script>

<style scoped>

</style>
