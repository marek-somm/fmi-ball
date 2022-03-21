import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import Impressum from '../views/Impressum.vue';
import Newsletter from '../views/Newsletter.vue';
import Privacy from '../views/Privacy.vue';


const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/newsletter',
    name: 'Newsletter',
    component: Newsletter
  },
  {
    path: '/impressum',
    name: 'Impressum',
    component: Impressum
  },
  {
    path: '/datenschutz',
    name: 'Privacy',
    component: Privacy
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
