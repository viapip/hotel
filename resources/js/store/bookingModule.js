




export const bookingModule = {
    state: () => ({
        booking : '#test'
    }),
    getters: {},
    mutations: {
        setBooking(state, data) {
            state.booking = data;
        }
    },
    actions: {
        async fetchBooking({state, commit}) {
            try {
                const response = await fetch('/api/book-now')
                const json = await response.json();
                commit('setBooking', json.link)
            } catch (e) {
                console.log(e)
            }
        }

    },
    namespaced: true,
}
