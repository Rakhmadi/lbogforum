import { createMetaManager } from 'vue-meta'
import App from './App.vue'
import { createApp } from 'vue'
import router from './router'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min'
import '@mdi/font/css/materialdesignicons.min.css'
import AOS from 'aos'
import 'aos/dist/aos.css'
import HelloWorld from './components/ExampleComponent.vue';
AOS.init();
const app = createApp(App);

app.component('hello-world', HelloWorld);

app.use(router)
app.use(createMetaManager());

app.mount('#app')
export default app