<template>
    <div >
        <form @submit.prevent="submitForm">
            <div class="d-flex">
                <md-list>
                    <md-subheader>Questões:</md-subheader>
                    <template v-for="item in questions">
                        <md-list-item :key="item.id">
                            <md-checkbox v-model="questionId" :value="item.id" class="md-primary" />
                            <span class="md-list-item-text">{{ item.question }}</span>
                        </md-list-item>
                    </template>
                </md-list>

                <md-list>
                    <md-subheader>Temas:</md-subheader>
                    <template v-for="item in themes">
                        <md-list-item :key="item.id">
                            <md-checkbox v-model="themeId" :value="item.id" />
                            <span class="md-list-item-text">{{ item.theme }}</span>
                        </md-list-item>
                    </template>
                </md-list>
            </div>
            <md-button class="md-primary md-raised" @click="movie = 'pulp-fiction'" type="submit">Registrar</md-button>
        </form>
         <md-dialog-alert
            :md-active.sync="sucess"
            md-title="Questão associada !"
            md-content="<strong> Sua questão foi associada ao tema com sucesso !</strong>" />
    </div>
</template>
<script>
  import axios from 'axios';

  export default {
    name: 'cad-alternativas',
    data() {
      return {
        questions: '',
        questionId: '',
        themes: '',
        themeId: [],
        sucess: false
      }
    },
    methods: {
      submitForm() {
          axios.defaults.baseURL ='http://localhost:8000'
          axios.put('/api/question/'  + this.questionId + '/associate', {
              themeIds: this.themeId,
          }).then(response => {
              this.response = JSON.stringify(response, null, 2)
          }).catch(error => {
              this.response = 'Error: ' + error.response.status
          })
          this.sucess = true;
      },
      getQuestions: function (){
        axios.defaults.baseURL ='http://localhost:8000'
        axios.get('/api/question').then(response => {
            this.response = JSON.parse(JSON.stringify(response))
            this.questions = response.data;
        }).catch(error => {
            this.response = 'Error: ' + error.response.status
        })
      },
      getThemes: function (){
        axios.defaults.baseURL ='http://localhost:8000'
        axios.get('/api/theme').then(response => {
            this.response = JSON.parse(JSON.stringify(response))
            this.themes = response.data;
        }).catch(error => {
            this.response = 'Error: ' + error.response.status
        })
      }
    },
    mounted: function () {
        this.getQuestions();
        this.getThemes();
    }
  }
</script>
<style lang="scss" scoped>

</style>


