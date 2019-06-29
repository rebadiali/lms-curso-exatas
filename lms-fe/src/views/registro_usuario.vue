<template>
  <div class="registro-usuario">
     <form @submit.prevent="submitForm">
      <div class="simple-login-container">
        <h2>Cadastro</h2>
        <div class="row">
            <div class="col-md-12 form-group">
                <input id="email" type="text" required v-model="name" class="form-control" placeholder="Nome">
            </div>
        </div>
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
                <button type="submit" class="btn btn-block btn-login col-md-12">Registrar</button>
            </div>
        </div>
      </div>
    </form>
  </div>
</template>
<script>
  import axios from 'axios';

  export default {
    name: 'registro-usuario',
    data() {
      return {
        name: '',
        email: '',
        password: '',
        response: '',
        type: 'aluno'
      }
    },
    methods: {
      submitForm() {
            var matchedCase = new Array();
            matchedCase.push("[A-Z]");      // Uppercase Alpabates
            matchedCase.push("[0-9]");      // Numbers
            matchedCase.push("[a-z]");     // Lowercase Alphabates
            // Check the conditions
            var ctr = 0;
            for (var i = 0; i < matchedCase.length; i++) {
                if (new RegExp(matchedCase[i]).test(password.value)) {
                    ctr++;
                }
            }
          if(ctr <  3){
            alert(
              "Senha fraca. Sua senha deve conter:\n" +
              "Entre 6 e 25 caracteres \n" +
              "Letras maiúsculas e minúsculas \n" +
              "Números de 0 a 9 \n"
              )
          }else{
            axios.defaults.baseURL ='http://localhost:8000'
            axios.post('/api/user/register', {
                name: this.name,
                email: this.email,
                password: this.password,
                user_type: this.type
            }).then(response => {
                this.response = response
                alert('Cadastrado com sucesso');
                this.response = response;
                this.$router.push('/login-usuario');
            }).catch(error => {
                this.response = 'Error: ' + error.response.status
            })
        }
          }
      }
    }
</script>
<style lang="scss" scoped>
  .registro-usuario{
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
  a{
      color:#fff;
  }
</style>


