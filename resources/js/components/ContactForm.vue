<template>

    <section :class="['contact', {'other-page' : !isContactPage}]">
        <div class="container container--sm">
            <h2 class="contact__title">
                Contact
            </h2>
            <div class="contact__text">
                <span v-html="contacts?.name"></span>
                <br>
                {{ contacts?.address }}
                <br>
                {{ contacts?.phone }}
                <br>
                {{ contacts?.email }}
            </div>
            <form action="#" class="contact-form" v-on:submit="onSubmit">
                <div class="contact-form__line">
                    <div class="form-group required">
                        <input
                            name="first_name"
                            type="text"
                            class="form-text"
                            placeholder="First Name*"
                            required>
                    </div>
                    <div class="form-group required">
                        <input
                            name="last_name"
                            type="text"
                            class="form-text"
                            placeholder="Last Name*"
                            required>
                    </div>
                </div>
                <div class="contact-form__line">
                    <div class="form-group required">
                        <input
                            name="email"
                            type="email"
                            class="form-text"
                            placeholder="Your email*"
                            required>
                    </div>
                    <div class="form-group required">
                        <input
                            name="phone"
                            type="tel"
                            class="form-text"
                            placeholder="Phone number*"
                            required>
                    </div>
                </div>
                <div class="contact-form__line">
                    <div class="form-group">

                        <VSelect
                            label="title"
                            class="custom-select"
                            placeholder="Country"
                            :options="options"
                            v-model="countrySelected"
                        >
<!--                            <template #option="{ title, id }">-->
<!--                                <span style="margin: 0">{{ title }}</span>-->
<!--                            </template>-->
                            <template #search="{ attributes, events }">
                                <input
                                    class="vs__search"
                                    :required="!countrySelected"
                                    v-bind="attributes"
                                    v-on="events"
                                />
                            </template>
                            <template #no-options="{ search, searching, loading }">
                                This is the no options slot.
                            </template>
                        </VSelect>
                    </div>
                    <div class="form-group required">
                        <input name="state" type="text" class="form-text" placeholder="State*">
                    </div>
                </div>
                <div class="contact-form__line">
                    <div style="margin-right: 0" class="form-group">

                        <VSelect
                            label="title"
                            class="custom-select"
                            placeholder="Select the type of issue or question"
                            :options="options"
                            v-model="typeOfIssueSelected"
                        >
                            <template #option="{ title, id }">
                                <span style="margin: 0">{{ title }}</span>
                            </template>
                            <template #search="{ attributes, events }">
                                <input
                                    class="vs__search"
                                    :required="!typeOfIssueSelected"
                                    v-bind="attributes"
                                    v-on="events"
                                />
                            </template>
                            <template #no-options="{ search, searching, loading }">
                                This is the no options slot.
                            </template>
                        </VSelect>
                    </div>
                </div>
                <div class="contact-form__line">
                    <div class="form-group">
                        <input name="comments" type="text" class="form-text" placeholder="Enter your comments:">
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
</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
import VSelect from 'vue-select'

import { mapState} from "vuex";

export default {
    name: "ContactForm",
    components: {DiscoverSlider, VSelect},
    props: {
        isContactPage: {
            type: Boolean,
            default: false,
        }
    },
    data() {
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
            ],
            countrySelected: null,
            typeOfIssueSelected: null,
        }
    },
    methods: {
        async onSubmit(e) {
                e.preventDefault();
                let formData = new FormData(e.target)
                formData = Object.fromEntries(formData)
                formData.type_issue = this.typeOfIssueSelected.title
                formData.country = this.countrySelected.title
                let data = JSON.stringify(formData)

                // console.log(data)

            try {
                // const response = await fetch('https://jsonplaceholder.typicode.com/posts', {
                //     method: 'POST',
                //     headers: {
                //         'Content-Type': 'application/json'
                //     },
                //     body: data
                // })

            } catch (e) {
                console.log(e)
            }

            // console.log(this.typeOfIssueSelected)
        },
    },
    computed: {
        ...mapState({
            contacts: state => state.contacts.contacts
        })
    }
}
</script>

<style scoped>

</style>
