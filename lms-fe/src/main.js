import Vue from 'vue'
import App from './App.vue'
import router from './router'
import VueMaterial from 'vue-material'
import 'vue-material/dist/theme/default.css'
import 'vue-material/dist/vue-material.min.css';

Vue.use(VueMaterial)

new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})
