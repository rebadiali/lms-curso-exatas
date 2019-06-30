<template>
  <div class="login-usuario">
    <form @submit.prevent="submitForm">
      <div class="simple-login-container">
        <h2>Login</h2>
        <div class="row">
            <div class="col-md-12 form-group">
                <input id="email" type="email" required v-model="email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="password" placeholder="Senha" class="form-control" id="password" maxlength="25" minlength="6" required v-model="password">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <button type="submit" class="btn btn-block btn-login col-md-12">Logar</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <span class="cadastro">
                Ainda não possui conta ?
                <router-link to="/registro-usuario" class="link-cadastro">Cadastrar-se</router-link>
              </span>
            </div>
        </div>
      </div>
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
                window.location.href = '/Dashboard';
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
  .login-usuario{
    background-color:#8cc4ff;
    font-size:14px;
    color:#fff;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .simple-login-container{
      width:300px;
      max-width:100%;
      margin: auto;
  }
  .simple-login-container h2{
      text-align:center;
      font-size:20px;
  }

  .simple-login-container .btn-login{
      background-color:#FF5964;
      color:#fff;
  }
  .cadastro{
    color:#fff;
    .link-cadastro{
      color: #FF5964;
      text-decoration: none;
      cursor: pointer;
      &:hover{
        color: rgb(245, 2, 18);
      }
    }
  }
</style>