<template>
    <div id="app">
        <form @submit.prevent="submitForm">
            <div class="d-flex">
                <md-checkbox v-for="item in data" :key="item.id" v-model="themeId" :value="item.id">{{ item.name }}</md-checkbox>
            </div>
            <div class="marg-20">
            <label for="question">Questão:</label><br>
            <input id="question" type="text" v-model="question" required/>
            </div>
            <button :class="[question ? activeClass : '']" type="submit">Registrar</button>
            <p>{{ themeId }}</p>
        </form>
         <md-dialog-alert
            :md-active.sync="sucess"
            md-title="Questão Criada !"
            md-content="<strong>Sua questão foi criada com sucesso !</strong>" />
    </div>
</template>
<script>
  import axios from 'axios';

  export default {
    name: 'cadastro-questao',
    data() {
      return {
      question: '',
      response: '',
      themeId: [],
      activeClass: 'active',
      data: '',
      sucess: false
      }
    },
    methods: {
      submitForm() {
          axios.defaults.baseURL ='http://localhost:8000'
          axios.post('/api/question', {
              pergunta: this.question,
              tema_id: this.themeId
          }).then(response => {
              this.response = JSON.stringify(response, null, 2)
          }).catch(error => {
              this.response = 'Error: ' + error.response.status
          })
          this.sucess = true;
      }
    },
    mounted: function () {
        axios.defaults.baseURL ='http://localhost:8000'
        axios.get('/api/theme').then(response => {
            this.response = JSON.parse(JSON.stringify(response))
            this.data = response.data;
        }).catch(error => {
            this.response = 'Error: ' + error.response.status
        })
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

form {
  width: 50%;
  padding: 10px 40px;
  label{
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 0.03em;
    font-weight: bold;
  }
  input, textarea {
    border: 1px solid #ccc;
    color: #333;
    width: calc(100% - 30px);
  }
  input, textarea, button {
    border-radius: 4px;
    padding: 8px 15px;
    font-family: 'Work Sans', sans-serif;
    font-weight: 300;
  }
}

.d-flex{
  justify-content: space-between;
}

button {
  color: white;
  border: none;
  width: 100%;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  background: #ccc;
  cursor: pointer;
  box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.3);
  transition: 0.25s all ease;
  &:hover {
    transform: translateY(2px);
  }
}
.marg-20{
  margin: 20px 0;
}
.active {
  background: $primary;
}

pre-content {
  width: 300px;
}
</style>


