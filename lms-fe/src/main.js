import Vue from 'vue'
import Vuex from 'vuex'
import App from './App.vue'
import Login from './components/login_usuario.vue'
import router from './router'
import 'es6-promise/auto'
import VueMaterial from 'vue-material'
import 'vue-material/dist/theme/default.css'
import 'vue-material/dist/vue-material.min.css';

Vue.use(Vuex)
Vue.use(VueMaterial)

new Vue({
  el: '#app',
  router,
  render: function (h) {
    if (sessionStorage.tokenUser) {
      tokenUser = '';
      tokenUser = sessionStorage.tokenUser;
      alert(this.tokenUser)
      return h(App);
    }else{
      return h(Login);
    }
  },
  components: {
    App,
    Login 
  }
})
