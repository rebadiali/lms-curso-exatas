
<template>
    <div>
      <md-table md-card>
        <md-table-toolbar>
          <h1 class="md-title">Cursos</h1>
        </md-table-toolbar>
        <md-table-row>
          <md-table-head>Nome</md-table-head>
        </md-table-row>
        <template v-for="item in data">
          <md-table-row :key="item.id" class="tableRow">
            <md-table-cell md-label="Name" md-sort-by="name">
              <router-link :to="'course/'+item.id">{{ item.name }} </router-link>
            </md-table-cell>
          </md-table-row>
        </template>
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
      data:'',
      activeClass: 'active'
      }
    },
    methods: {
      getListCourse: function(){
        axios.defaults.baseURL ='http://localhost:8000'
        axios.get('/api/course').then(response => {
            this.response = JSON.parse(JSON.stringify(response))
            this.data = response.data;
        }).catch(error => {
            this.response = 'Error: ' + error.response.status
        })
      }
    },
    mounted: function(){
      this.getListCourse();
    }
  }
</script>
<style lang="scss" scoped>
.link-course{
  text-decoration: none;
  color: #000000;
}
.tableRow:nth-child(even) {
  background: #448aff;
}
.tableRow:nth-child(even) a {
  color: #fff;
}
</style>


