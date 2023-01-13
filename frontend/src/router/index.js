import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/content/Home.vue';
import Impressum from '../views/Impressum.vue';
import Privacy from '../views/Privacy.vue';
import Tickets from '../views/Tickets.vue';


const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: {
      title: "FMI-Ball 2023"
    }
  },
  {
    path: '/impressum',
    name: 'Impressum',
    component: Impressum,
    meta: {
      title: "FMI-Ball Impressum"
    }
  },
  {
    path: '/datenschutz',
    name: 'Privacy',
    component: Privacy,
    meta: {
      title: "FMI-Ball Datenschutz"
    }
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

router.afterEach((to, from) => {
  document.title = to.meta.title;
  window.scrollY(0)
})

export default router;
