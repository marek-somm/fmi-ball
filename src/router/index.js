import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import About from '../views/About.vue';
import Tickets from '../views/Tickets.vue';
import Sponsor from '../views/Sponsor.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: {
      index: 0,
      prev: 'Home',
      next: 'About',
    },
  },
  {
    path: '/about',
    name: 'About',
    component: About,
    meta: {
      index: 1,
      prev: 'Home',
      next: 'Tickets',
    },
  },
  {
    path: '/tickets',
    name: 'Tickets',
    component: Tickets,
    meta: {
      index: 2,
      prev: 'About',
      next: 'Sponsor',
    },
  },
  {
    path: '/sponsor',
    name: 'Sponsor',
    component: Sponsor,
    meta: {
      index: 3,
      prev: 'Tickets',
      next: 'Sponsor',
    },
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

router.afterEach((to, from) => {
  let srcIndex = from.meta.index
  let dstIndex = to.meta.index

  let baseClass = "animate__animated animate__faster"
  if (from.name === 'Home') {
    from.meta.leaveClass = baseClass + " animate__fadeOut"
    to.meta.enterClass = baseClass + " animate__slideInUp"
    to.meta.leaveClass = baseClass + " animate__fadeOut"
  } else if (to.name === 'Home') {
    from.meta.leaveClass = baseClass + " animate__slideOutDown"
    to.meta.enterClass = baseClass + " animate__fadeIn"
    to.meta.leaveClass = baseClass + " animate__slideOutDown"
  } else if (srcIndex < dstIndex) {
    to.meta.enterClass = baseClass + " animate__slideInUp"
    from.meta.leaveClass = baseClass + " animate__slideOutUp"
    to.meta.leaveClass = baseClass + " animate__slideOutUp"
  } else if (srcIndex > dstIndex){
    to.meta.enterClass = baseClass + " animate__slideInDown"
    from.meta.leaveClass = baseClass + " animate__slideOutDown"
    to.meta.leaveClass = baseClass + " animate__slideOutDown"
  } else {
    to.meta.enterClass = baseClass + ""
    from.meta.leaveClass = baseClass + ""
  }
})

export default router;
