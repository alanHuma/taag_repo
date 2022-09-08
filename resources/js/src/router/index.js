import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    redirect: 'newbook',
  },
  {
    path: '/newbook',
    name: 'newbook',
    component: () => import('@/views/books/NewBook.vue'),
  },

  {
    path: '/listbook',
    name: 'listbook',
    component: () => import('@/views/books/IndexBook.vue'),
  },
  {
    path: '/editbook/:id',
    name: 'editbook',
    component: () => import('@/views/books/EditBook.vue'),
    props: true
  },
 
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
})

export default router
