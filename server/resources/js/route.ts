import TopPage from '@/pages/TopPage.vue'
import LoginPage from '@/pages/Auth/LoginPage.vue'
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/top',
    name: 'TopPage',
    component: TopPage,
  },
  {
    path: '/login',
    name: 'LoginPage',
    component: LoginPage,
  },
]
const router = createRouter({
  routes,
  history: createWebHistory(),
})
export default router
