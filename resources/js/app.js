import './bootstrap';
import '../sass/app.scss'
import router from "@/router";
import store from "@/store";
import App from "@/components/admin/App.vue";
import { createApp } from 'vue/dist/vue.esm-bundler';


const app = createApp({})

app.use(router)
app.use(store)
app.component('app', App).mount('#app');
