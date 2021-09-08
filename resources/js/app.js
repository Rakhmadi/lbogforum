import { createMetaManager } from 'vue-meta'
import App from './App.vue'
import { createApp } from 'vue'
import router from './router'
import GAuth from 'vue3-google-oauth2'
import { store } from './store'
import AOS from 'aos'
import Toaster from "@meforma/vue-toaster";
import 'aos/dist/aos.css'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min'
import '@mdi/font/css/materialdesignicons.min.css'
import modal from './components/component/modal.vue'
AOS.init();

const app = createApp(App);
app.component('modal',modal);
const gAuthOptions = { 
    clientId: '647291233126-97nmoe3tnqorroofhe5fv64m1vii99le.apps.googleusercontent.com',
    scope: 'email',
    prompt: 'select_account',
    }
app.use(router)
app.use(store);
app.use(createMetaManager());
app.use(Toaster)
app.use(GAuth,gAuthOptions)

app.mount('#app')
export default app