import Vue from 'vue'
import Vuex from 'vuex'
import App from './App.vue'
import router from './router'
import 'es6-promise/auto'
import VueMaterial from 'vue-material'
import 'vue-material/dist/theme/default.css'
import 'vue-material/dist/vue-material.min.css';
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)
Vue.use(Vuex)
Vue.use(VueMaterial)

new Vue({
  el: '#app',
  router,
  render: (h) => h(App),
  components: {
    App
  }
})
