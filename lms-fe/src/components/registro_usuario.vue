<template>
  <div>
    <md-field md-clearable>
      <label>Cleareable</label>
      <md-input v-model="initial"></md-input>
    </md-field>
  </div>
</template>
<script>
  import axios from 'axios';

  export default {
    name: 'registro-usuario',
    data() {
      return {
        initial: 'Initial Value',
        password: 'mysecurepassword'
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
</style>


