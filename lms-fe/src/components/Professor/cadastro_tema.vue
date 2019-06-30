<template>
    <div id="app">
        <form @submit.prevent="submitForm" class="defaultForm">
            <div class="d-flex">
                <md-checkbox v-for="item in data" :key="item.id" v-model="courseId" :value="item.id" class="md-primary">{{ item.name }}</md-checkbox>
            </div>
            <div>
              <label for="themename">Tema:</label><br>
              <input id="themename" type="text" placeholder="Digite o tema" v-model="themename" required/>
            </div>
            <button :class="[themename ? activeClass : '']" type="submit">Registrar</button>
        </form>
        <md-dialog-alert
            :md-active.sync="sucess"
            md-title="Tema Criado !"
            md-content="<strong>Seu Tema foi criado com sucesso !</strong>" />
    </div>
</template>
<script>
  import axios from 'axios';

  export default {
    name: 'cadastro-tema',
    data() {
      return {
        themename: '',
        courseId: [],
        response: '',
        activeClass: 'active',
        data: '',
        sucess: false
      }
    },
    methods: {
      submitForm() {
        axios.defaults.baseURL ='http://localhost:8000'
        axios.post('/api/theme', {
            name: this.themename,
            course_id: this.courseId
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
        axios.get('/api/course').then(response => {
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
</style>


