import {Loader} from "google-maps";

export default {
    data() {
        return {
            google: null,
        }
    },
    methods: {
        async loadGoogleMaps() {
            const options = {
                version: 'weekly'
            }
            const loader = new Loader('AIzaSyCxc1PVWFAIR-0cN2f4N5Cj183nbV81Llw', options);
            this.google = await loader.load();
            this.initMap(this.google);
        },
    }

}
