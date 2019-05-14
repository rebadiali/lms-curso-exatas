import Vue from 'vue'
import Vuex from 'vuex'
import App from './App.vue'
import router from './router'
import 'es6-promise/auto'

Vue.use(Vuex)

new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})
