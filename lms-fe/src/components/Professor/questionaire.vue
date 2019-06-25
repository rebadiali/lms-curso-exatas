<template>
     <div >
        <form @submit.prevent="submitForm">
            <div>
                <div>
                    <p class="h4">Selecione um tema para seu questionario.</p>
                </div>
                <md-list>
                    <md-subheader>Temas:</md-subheader>
                    <template v-for="item in themes">
                        <md-list-item :key="item.id">
                            <input class="input-number" v-model="item.number" type="number">
                            <span class="md-list-item-text">{{ item.theme }}</span>
                        </md-list-item>
                    </template>
                </md-list>
            </div>
            <md-button class="md-primary md-raised" @click="movie = 'pulp-fiction'" type="submit">Registrar</md-button>
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
        questionnaire: this.$route.params,
        themes: '',
        themeId: '',
        sucess: false,
        CursoInfo: this.$route.params,
      }
    },
    methods: {
      submitForm: function() {
          axios.defaults.baseURL ='http://localhost:8000';
          let number_questions = [];
          this.themes.forEach(function(item,index) {
                let obj = {
                  theme_id: item.id,
                  quantity: Number(item.number)
                };
                number_questions[index] = obj;
          })
          console.log('esta porra : '+ JSON.stringify(number_questions));

          axios.post('/api/questionnaire', {
            name: "Questionario teste",
            professor_id: this.CursoInfo.professor,
            course_id: this.CursoInfo.id,
            number_of_questions: number_questions
          }).then(response => {
              this.response = JSON.stringify(response, null, 2)
          }).catch(error => {
              this.response = 'Error: ' + error.response.status
          })
          this.sucess = true;
      },
      getThemes: function (){
        axios.defaults.baseURL ='http://localhost:8000'
        axios.get('/api/theme').then(response => {
            this.response = JSON.parse(JSON.stringify(response));
            this.themes = response.data;
            this.themes.forEach(function(item) {
                item.number = 0;
            });
            console.log(this.themes);
        }).catch(error => {
            this.response = 'Error: ' + error.response
            console.log('deu merda');
        })
      }
    },
    mounted: function () {
        this.getThemes();
    }
  }
</script>
<style lang="scss" scoped>
    .input-number{
        width: 40px;
        margin-right: 15px;
    }
</style>


