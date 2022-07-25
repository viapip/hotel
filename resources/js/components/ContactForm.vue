<template>
<div class="scroll-animation">
    <section :class="['contact', {'other-page' : !isContactPage}, 'scroll-animation__child']">
        <div class="container container--sm scroll-animation__child">
            <h2 class="contact__title scroll-animation__child">
                Contact
            </h2>
            <div class="contact__text scroll-animation__child">
                <span v-html="contacts?.name"></span>
                <br>
                {{ contacts?.address }}
                <br>
                {{ contacts?.phone }}
                <br>
                {{ contacts?.email }}
            </div>
            <form action="#" class="contact-form scroll-animation__child" v-on:submit="onSubmit">
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
                            :options="country"
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
                            :options="typeQuestions"
                            v-model="typeOfIssueSelected"
                        >
<!--                            <template #option="{ value }">-->
<!--                                <span style="margin: 0">{{ value }}</span>-->
<!--                            </template>-->
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
</div>
</template>

<script>
import DiscoverSlider from "../components/DiscoverSlider";
import VSelect from 'vue-select'

import {mapState} from "vuex";

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
            country: [
                "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Austria", "Azerbaijan", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Channel Islands", "Chile", "China", "Colombia", "Comoros", "Congo", "Costa Rica", "Côte d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "DR Congo", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Faeroe Islands", "Finland", "France", "French Guiana", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Holy See", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nepal", "Netherlands", "Nicaragua", "Niger", "Nigeria", "North Korea", "North Macedonia", "Norway", "Oman", "Pakistan", "Panama", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Réunion", "Romania", "Russia", "Rwanda", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "San Marino", "Sao Tome & Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "State of Palestine", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "The Bahamas", "Timor-Leste", "Togo", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Venezuela", "Vietnam", "Western Sahara", "Yemen", "Zambia", "Zimbabwe",
                // {
                //     title: 'Question#1',
                //     id: 0,
                // },
                // {
                //     title: 'Question#2',
                //     id: 1,
                // },
            ],
            typeQuestions: [
                "Meeting and Events information",
                "Compliments/Concerns about previous hotel stay",
                "Group requests - 10 or more rooms",
                "Career opportunities",
                "Partnership",
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
            console.log(window.location)
            try {
                const url = new URL(window.location.origin + '/api/form')
                url.search = new URLSearchParams(data).toString()
                console.log(url)
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: data
                })
                console.log(123)
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
