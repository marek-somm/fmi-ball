import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import Greetings from '../views/Greetings.vue';
import Newsletter from '../views/Newsletter.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/test',
    name: 'Test',
    component: Greetings
  },
  {
    path: '/newsletter',
    name: 'Newsletter',
    component: Newsletter
  },
  {
    path: "/:catchAll(.*)",
    name: "NotFound",
    redirect: { name: 'Home' }
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (to.hash) {
      return { el: to.hash };

    }
  },
});

export default router;
