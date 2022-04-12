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
    meta: {
      title: "FMI-Ball 2022"
    }
  },
  {
    path: '/impressum',
    name: 'Impressum',
    component: Impressum,
    meta: {
      title: "Impressum - FMI-Ball"
    }
  },
  {
    path: '/datenschutz',
    name: 'Privacy',
    component: Privacy,
    meta: {
      title: "Datenschutz - FMI-Ball"
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
})

export default router;
