import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import axios from  'axios'

import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { fas } from '@fortawesome/free-solid-svg-icons'
library.add(fas);
import { far } from '@fortawesome/free-regular-svg-icons';
library.add(far);
import { dom } from "@fortawesome/fontawesome-svg-core";
dom.watch();

const app = createApp(App)
app.use(store)
app.use(router)
app.use(axios)
app.component("font-awesome-icon", FontAwesomeIcon);
app.mount('#app')
