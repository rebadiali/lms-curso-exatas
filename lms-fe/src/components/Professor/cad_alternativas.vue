<template>
    <div id="app">
        <form @submit.prevent="submitForm" class="defaultForm">
            <div class="quest-wrapper">
                <md-checkbox v-for="item in data" :key="item.id" v-model="questionId" :value="item.id">{{ item.question }}</md-checkbox>
            </div>
            <div class="marg-20">
                <label for="question">Cadastre as alternativas para a questão acima:</label><br>
                <input id="question" type="text" v-model="alternatives" required/>
                <md-checkbox v-model="correct" value="1">Sim</md-checkbox>
                <md-checkbox v-model="correct" value="0">Não</md-checkbox>
            </div>
            <button class="active" type="submit">Registrar</button>
        </form>
         <md-dialog-alert
            :md-active.sync="sucess"
            md-title="alternativa Criada !"
            md-content="<strong>Sua alternativa foi criada com sucesso !</strong>" />
    </div>
</template>
<script>
  import axios from 'axios';

  export default {
    name: 'cad-alternativas',
    data() {
      return {
      alternatives: '',
      correct: '',
      response: '',
      questionId: '',
      data: '',
      sucess: false
      }
    },
    methods: {
      submitForm() {
          axios.defaults.baseURL ='http://localhost:8000'
          axios.post('/api/alternative', {
              question_id: this.questionId,
              alternative: this.alternatives,
              is_correct: this.correct
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
        axios.get('/api/question').then(response => {
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

pre-content {
  width: 300px;
}
</style>


