<template>
    <div>
        <form @submit.prevent="submitForm" class="defaultForm">
            <div>
              <h1>Professor {{ userName }}</h1>
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
      professor_Id: window.sessionStorage.id,
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

.defaultForm {
  max-width: 400px;
  padding: 20px 30px;
  margin: 0 auto;
  box-shadow: 1px 1px 1px #ccc;
  label{
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 0.03em;
    font-weight: bold;
  }
  input, textarea {
    border: none;
    border-bottom: 2px solid #448aff;
    border-radius: 0!important;
    color: #333;
    width: 100%;
    outline: none;
  }
  input, textarea, button {
    border-radius: 4px;
    padding: 8px 15px;
    font-family: 'Work Sans', sans-serif;
    font-weight: 300;
  }
  div {
    margin: 20px 0;
  }
}

button {
  color: white;
  border: none;
  width: 100%;
  max-width: 200px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  background: #448aff;
  cursor: pointer;
  box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.3);
  transition: 0.25s all ease;
  &:hover {
    transform: translateY(2px);
  }
}

.active {
  background: $primary;
}

pre-content {
  width: 300px;
}
</style>


