<template>
    <div>
        <form @submit.prevent="submitForm" class="defaultForm">
            <div>
              <h1>Professor <span class="nameUser">{{ userName }}</span></h1>
              <label for="name">Nome do curso:</label><br>
              <input id="name" type="text" placeholder="Curso" v-model="name" required/>
            </div>
            <button :class="[name ? activeClass : '']" type="submit">Registrar</button>
        </form>
    </div>
</template>
<script>
  import axios from 'axios';

  export default {
    name: 'registro',
    data() {
      return {
      name: '',
      userName: window.sessionStorage.userName,
      professor_Id: window.sessionStorage.idUser,
      response: '',
      activeClass: 'active'
      }
    },
    methods: {
      submitForm: function() {
        axios.defaults.baseURL ='http://localhost:8000'
        axios.post('/api/course', {
          professor_id: this.professor_Id,
          name: this.name
        }).then(response => {
          this.response = JSON.stringify(response, null, 2)
          alert("Curso cadastrado com sucesso");
        }).catch(error => {
          this.response = 'Error: ' + error.response.status
        })
      },
      getUser: function () {
          // pegar usuario para passar o id do professor dinamicamente
      }
    }
  }
</script>
<style lang="scss" scoped>
$primary: #5968d7;

#app {
  display: flex;
  justify-content: center;
  font-family: 'Work Sans', sans-serif;
}

pre-content {
  width: 300px;
}
</style>


