import { createMetaManager } from 'vue-meta'
import App from './App.vue'
import { createApp } from 'vue'
import router from './router'
import Equal from 'equal-vue'
import 'equal-vue/dist/style.css'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap'
import '@mdi/font/css/materialdesignicons.min.css'
import AOS from 'aos'
import 'aos/dist/aos.css'
import HelloWorld from './components/ExampleComponent.vue';
AOS.init();
const app = createApp(App);
app.use(Equal)

app.component('hello-world', HelloWorld);

// mount the app to the DOM
app.use(router)
app.use(createMetaManager());

app.mount('#app')
export default app