import Vue from 'vue'
import Router from 'vue-router'
import Regristro from './components/registro'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Regristro',
      component: Regristro
    }
  ]
})