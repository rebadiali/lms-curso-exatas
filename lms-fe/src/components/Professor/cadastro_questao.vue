<template>
    <div id="app">
        <form @submit.prevent="submitForm" class="defaultForm">
            <div class="d-flex">
                <md-checkbox class="md-primary" v-for="item in data" :key="item.id" v-model="themeId" :value="item.id">{{ item.theme }}</md-checkbox>
            </div>
            <div class="marg-20">
            <label for="question">Questão:</label><br>
            <input id="question" type="text" v-model="question" required/>
            </div>
            <button :class="[question ? activeClass : '']" type="submit">Registrar</button>
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

.marg-20{
  margin: 20px 0;
}
pre-content {
  width: 300px;
}
</style>


