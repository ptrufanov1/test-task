import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import {createApp} from 'vue';
import App from '../vue/App.vue';

createApp(App)
    .mount('#app')

