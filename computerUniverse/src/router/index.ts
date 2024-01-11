import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import WelcomeView from "@/views/WelcomeView.vue";
import guard from "@/router/middleware";

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
        beforeEnter: (to, from, next) => {
          guard(next)
        },
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
      beforeEnter: (to, from, next) => {
        guard(next)
      },
      component: () => import('../views/OrdersView.vue'),
    },
    {
      path: '/nomenclature',
      name: 'nomenclature',
      beforeEnter: (to, from, next) => {
        guard(next)
      },
      component: () => import('../views/NomenclatureView.vue'),
    },]
  }
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
