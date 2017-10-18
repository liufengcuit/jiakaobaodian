import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Success from '@/components/Success'
import Errors from '@/components/Error'
import Register from '@/components/Register'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Hello',
      component: HelloWorld
    },
    {
      path: '/success',
      name: 'Success',
      component: Success
    },
    {
      path: '/error',
      name: 'Errors',
      component: Errors
    },
    {
      path: '/register',
      name: 'Register',
      component: Register
    }
  ]
})
