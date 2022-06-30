

export const contactsModule = {
    state: () => ({
        contacts : null
    }),
    getters: {},
    mutations: {
        setContacts(state, data) {
            state.contacts = data;
        }
    },
    actions: {
        async fetchContacts({state, commit}) {
            try {
                const response = await fetch('/api/contact')
                const json = await response.json();
                commit('setContacts', json)
            } catch (e) {
                console.log(e)
            }
        }

    },
    namespaced: true,
}
