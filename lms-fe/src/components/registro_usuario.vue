<template>
  <div class="registro-usuario">
    <h2>Registro de usuário</h2>
    <form @submit.prevent="submitForm">
      <md-field md-clearable>
        <label>Nome</label>
        <md-input v-model="initial"></md-input>
      </md-field>

      <md-field md-clearable>
        <label>Email</label>
        <md-input v-model="initial"></md-input>
      </md-field>

      <md-field>
        <label>Senha</label>
        <md-input v-model="password" type="password"></md-input>
      </md-field>

      <md-button class="md-raised md-primary">Enviar</md-button>
    </form>
  </div>
</template>
<script>
  import axios from 'axios';

  export default {
    name: 'registro-usuario',
    data() {
      return {
        initial: '',
        password: ''
      }
    },
    methods: {
      submitForm() {
      axios.defaults.baseURL ='http://localhost:8000'
      axios.post('/api/user', {
          name: this.name,
          user_type: this.user_type,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation
      }).then(response => {
          this.response = JSON.stringify(response, null, 2)
      }).catch(error => {
          this.response = 'Error: ' + error.response.status
      })
      }
    }
  }
</script>
<style lang="scss" scoped>
  .md-field:last-child {
    margin-bottom: 40px;
  }
  .registro-usuario {
    width: 70%;
    margin: 0 auto;
  }
</style>


