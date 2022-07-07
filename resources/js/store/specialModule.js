




export const specialModule = {
    state: () => ({
        special : null
    }),
    getters: {},
    mutations: {
        setSpecial(state, data) {
            state.special = data;
        }
    },
    actions: {
        async fetchSpecial({state, commit}) {
            try {
                const response = await fetch('/api/special-offer')
                const json = await response.json();
                commit('setSpecial', json.slug)
            } catch (e) {
                console.log(e)
            }
        }

    },
    namespaced: true,
}
