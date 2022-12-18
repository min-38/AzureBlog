import './bootstrap';
import {createApp} from 'vue'
import axios from 'axios';
import router from './router.js';
import App from './App.vue'
import Datepicker from '@vuepic/vue-datepicker';
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import '@/../css/quill.css';

const app = createApp(App);
app.config.globalProperties.$axios = axios; 
app.use(router);
app.component('QuillEditor', QuillEditor);
app.component('Datepicker', Datepicker);
app.mount("#app");