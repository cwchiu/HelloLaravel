import VueRouter from 'vue-router';

const routes = [
  {
    path: '/',
    component: require('./components/Index.vue')
  },
  {
    path: '/create',
    component: require('./components/Create.vue')
  },
  {
    path: '/:id',
    component: require('./components/Show.vue')
  },
  {
    path: '/:id/edit',
    component: require('./components/Edit.vue')
  }
];

const router = new VueRouter({ routes });
export default router;