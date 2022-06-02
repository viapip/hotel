

require('./bootstrap');
// const sass = require('sass');


import {createApp} from "vue";
import App from "./App.vue";
import router from "./router/router";


const app = createApp(App)


// app.mount('#app')

app.use(router)
app.mount('#app')
