


export const discoveryModule = {
    state: () => ({
        discovery : null
    }),
    getters: {},
    mutations: {
        setDiscovery(state, data) {
            state.discovery = data;
        }
    },
    actions: {
        async fetchDiscovery({state, commit}) {
            try {
                const response = await fetch('/api/discover')
                const json = await response.json();
                commit('setDiscovery', json)
            } catch (e) {
                console.log(e)
            }
        }

    },
    namespaced: true,
}
