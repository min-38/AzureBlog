import './bootstrap';
import { createApp } from 'vue'
import axios from 'axios';
import router from './router.js';
import App from './App.vue'

createApp(App)
    .use(router)
    .mount("#app");