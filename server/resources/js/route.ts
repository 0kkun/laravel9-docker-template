import TopPage from '@/pages/TopPage.vue'
import LoginPage from '@/pages/Auth/LoginPage.vue'
import SignUpPage from '@/pages/Auth/SignUpPage.vue'
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
  {
    path: '/sign-up',
    name: 'SignUpPage',
    component: SignUpPage,
  },
]
const router = createRouter({
  routes,
  history: createWebHistory(),
})
export default router
