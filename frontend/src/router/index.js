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
      title: "FMI-Ball 2022"
    }
  },
  {
    path: '/impressum',
    name: 'Impressum',
    component: Impressum,
    meta: {
      title: "Impressum | FMI-Ball"
    }
  },
  {
    path: '/datenschutz',
    name: 'Privacy',
    component: Privacy,
    meta: {
      title: "Datenschutz | FMI-Ball"
    }
  },
  {
    path: '/karten-beta-as74i0f7faiush8',
    name: 'Tickets',
    component: Tickets,
    meta: {
      title: "Karten | FMI-Ball"
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
  window.scrollTo(0, 0)
})

export default router;
