<template>
  <div class="login-usuario">
    <h2>Login de usuário</h2>
    <form @submit.prevent="submitForm">
      <md-field md-clearable>
        <label>Email</label>
        <md-input id="email" type="email" required v-model="email"></md-input>
      </md-field>

      <md-field>
        <label>Senha</label>
        <md-input id="password" type="password" maxlength="25" minlength="6" required v-model="password"></md-input>
      </md-field>

      <md-button class="md-raised md-primary" type="submit">Enviar</md-button>
    </form>
  </div>
</template>
<script>
  import axios from 'axios';

  export default {
    name: 'login-usuario',
    data() {
      return {
        email: '',
        password: '',
        response: '',
        token: ''
      }
    },
    methods: {
        submitForm() {
            axios.defaults.baseURL ='http://localhost:8000'
            axios.post('/api/user/login', {
                email: this.email,
                password: this.password
            }).then(response => {
                this.token = response.data.token
                this.response = response
                sessionStorage.tokenUser = response.data.token;
                this.$router.push('/Dashboard');
            }).catch(error => {
                this.response = 'Error: ' + error.response
                alert('Senha incorreta');
            })
        }
    }
  }
  function getUserByToken(token){
        return axios.get('/api/users', {
            headers: { Authorization: `Bearer ${token}` }
        });
    }
</script>
<style lang="scss" scoped>
  .md-field:last-child {
    margin-bottom: 40px;
  }
  .login-usuario {
    max-width: 600px;
    margin: 0 auto;
    padding: 10px 15px;
    box-shadow: 2px 2px 4px rgba(75, 75, 75, 0.5);
  }

  @media(max-width: 992px){
    .login-usuario {
      max-width: 90%;
    }
  }
</style>