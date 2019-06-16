
<template>
    <div>
      <md-table md-card>
        <md-table-toolbar>
          <h1 class="md-title">Professores</h1>
          <md-button @click="getListCourse" class="md-fab md-mini md-primary">
            <md-icon>add</md-icon>
          </md-button>
        </md-table-toolbar>
        <md-table-row>
          <md-table-head md-numeric>ID</md-table-head>
          <md-table-head md-numeric>Professor</md-table-head>
        </md-table-row>
        <md-table-row v-for="item in data" :key="item.id">
          <md-table-cell md-label="ID" md-sort-by="id" md-numeric>{{ item.id }}</md-table-cell>
          <md-table-cell md-label="Professor" md-sort-by="professor" md-numeric>{{ item.professor_id }}</md-table-cell>
        </md-table-row>
      </md-table>
    </div>
</template>
<script>
  import axios from 'axios';

  export default {
    name: 'registro',
    data() {
      return {
      response: '',
      data:''
      }
    },
    methods: {
      getListCourse: function(){
        axios.defaults.baseURL ='http://localhost:8000'
        axios.get('/api/user/professor').then(response => {
            this.response = JSON.parse(JSON.stringify(response))
            this.data = response.data;
        }).catch(error => {
            this.response = 'Error: ' + error.response.status
        })
      }
    }
  }
</script>
<style lang="scss" scoped>
</style>


