import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import WelcomeView from "@/views/WelcomeView.vue";

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
    children: [{
      path: '/',
      name: 'welcome',
      component: WelcomeView,
    },
      {
      path: '/customers',
      name: 'customers',
      component: () => import('../views/CustomersView.vue'),
    },
    {
      path: '/parts',
      name: 'parts',
      component: () => import('../views/PartsView.vue'),
    },
    {
      path: '/warehouses',
      name: 'warehouses',
      component: () => import('../views/WarehousesView.vue'),
    },
    {
      path: '/orders',
      name: 'orders',
      component: () => import('../views/OrdersView.vue'),
    },
    {
      path: '/nomenclature',
      name: 'nomenclature',
      component: () => import('../views/NomenclatureView.vue'),
    },]
  },
  // {
  //   path: '/parts',
  //   name: 'parts',
  //   component: () => import('../views/ProfileView.vue'),
  // },
  // {
  //   path: '/warehouses',
  //   name: 'warehouses',
  //   component: () => import('../views/ProfileView.vue'),
  // },
  // {
  //   path: '/orders',
  //   name: 'orders',
  //   component: () => import('../views/ProfileView.vue'),
  // },
  // {
  //   path: '/nomenclature',
  //   name: 'nomenclature',
  //   component: () => import('../views/ProfileView.vue'),
  // },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach((to, from, next) => {
  window.scrollTo(0,0)
  next()
})

export default router
