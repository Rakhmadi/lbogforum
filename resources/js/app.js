import { createMetaManager } from 'vue-meta'
import App from './App.vue'
import { createApp } from 'vue'
import router from './router'
import GAuth from 'vue3-google-oauth2'
import { store } from './store'
import AOS from 'aos'
import 'aos/dist/aos.css'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min'
import '@mdi/font/css/materialdesignicons.min.css'

AOS.init();
const app = createApp(App);

app.use(router)
app.use(store);
app.use(createMetaManager());

app.mount('#app')
export default app