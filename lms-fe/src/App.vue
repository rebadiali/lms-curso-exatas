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
        window.sessionStorage.idUser = response.data.id;
        window.sessionStorage.typeUser = response.data.user_type;
        window.sessionStorage.userName = response.data.name;
      }).catch(error => {
          this.response = 'Error: ' + error.response
      });
    },

  },
  mounted: function () {
    this.getUser();
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