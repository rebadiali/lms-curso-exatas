<template>
    <div >
        <form @submit.prevent="submitForm">
            <div>
                <md-header>Selecione um tema para seu questionario.</md-header>
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
        sucess: false
      }
    },
    methods: {
      submitForm() {
          axios.defaults.baseURL ='http://localhost:8000'
          axios.post('/api/alternative', {
              questionnaire_id: this.questionnaire,
              theme_id: this.themeId,
              quantity: this.quantity
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
            this.response = JSON.parse(JSON.stringify(response))
            this.themes = response.data;
        }).catch(error => {
            this.response = 'Error: ' + error.response.status
        })
      }
    },
    mounted: function () {
        this.getThemes();
    }
  }
</script>
<style lang="scss" scoped>

</style>


