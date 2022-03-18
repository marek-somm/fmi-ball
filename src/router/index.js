import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import About from '../views/About.vue';
import Tickets from '../views/Tickets.vue';
import Sponsor from '../views/Sponsor.vue';
import Greetings from '../views/Greetings.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/greetings',
    name: 'Greetings',
    component: Greetings
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (to.hash) {
      return { el: to.hash }

    }
  },
});

export default router;
