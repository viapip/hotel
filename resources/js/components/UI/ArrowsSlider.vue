<template>
    <div :class="['buttons-slider', isDouble ? 'is-double':'is-long', propClasses]">
        <div :class="['buttons-slider__wrapper']">
            <button @click="$emit('clickPrev')" class="buttons-slider__item is-prev">
                <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 1L1 9L9 17" stroke="black"/>
                </svg>
            </button>
            <button @click="$emit('clickNext')" class="buttons-slider__item is-next">
                <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L9 9L1 17" stroke="black"/>
                </svg>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "ArrowsSlider",
    props: {
        isDouble: {
            type: Boolean,
            default: true,
        },
        propClasses: {
            type: String,
            default: ''
        }
    },
    methods: {
    },
}
</script>

<style scoped>

</style>
