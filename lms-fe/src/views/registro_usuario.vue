<template>
  <div class="registro-usuario">
    <h2>Registro de usuário</h2>
    <form @submit.prevent="submitForm">
      <md-field md-clearable>
        <label>Nome</label>
        <md-input id="name" type="text" required v-model="name"></md-input>
      </md-field>

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
    name: 'registro-usuario',
    data() {
      return {
        name: '',
        email: '',
        password: '',
        response: ''
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
          if(ctr <  4){
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
                password: this.password
            }).then(response => {
                this.response = response
            }).catch(error => {
                this.response = 'Error: ' + error.response.status
            })
          } 
      }
    }
  }
</script>
<style lang="scss" scoped>
  .md-field:last-child {
    margin-bottom: 40px;
  }
  .registro-usuario {
    max-width: 600px;
    margin: 0 auto;
    padding: 10px 15px;
    box-shadow: 2px 2px 4px rgba(75, 75, 75, 0.5);
  }

  @media(max-width: 992px){
    .registro-usuario {
      max-width: 90%;
    }
  }
</style>


