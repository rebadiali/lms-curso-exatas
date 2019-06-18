<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
require('./assets/app.css');
import axios from 'axios';

export default {
  name: 'app',

  data: function() {
    return {
      userName: '',
      typeUser: '',
      idUser: '',
      response: ''
    }
  },

  methods: {
    getUser: function() {
      axios.defaults.baseURL ='http://localhost:8000';
      let token;
      //let $this = this;
      token = window.sessionStorage.tokenUser;
      axios.get('/api/users', {headers: { Authorization: `Bearer ${token}` }}).then(response => {
        this.idUser = response.data;
      }).catch(error => {
          this.response = 'Error: ' + error.response.status
      });
    },
    
    getUserByToken: (idUser) => {
     console.log('funciona porra do id:', idUser);
    }
  },
  mounted: function () {
    this.getUser()
    this.getUserByToken(this.idUser);
  }
}
</script>

<style <style lang="scss" scoped>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
.md-app {
    min-height: 350px;
    border: 1px solid rgba(#000, .12);
  }

  // Demo purposes only
.md-drawer {
  width: 230px;
  max-width: calc(100vw - 125px);
}
</style>