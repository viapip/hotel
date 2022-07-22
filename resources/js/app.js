

require('./bootstrap');
// const sass = require('sass');


import {createApp} from "vue";
import App from "./App.vue";
import router from "./router/router";
import store from "./store/index";


const app = createApp(App)

app.config.optionMergeStrategies.custom = (to, from) => {
    return from || to
}

app.use(router)
app.use(store)
app.mount('#app')
