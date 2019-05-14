<template>
  <div>
    <md-tabs md-sync-route>
      <md-tab id="tab-home" md-label="Home" to="home"></md-tab>
      <md-tab id="tab-cadastro-aluno" md-label="Aluno" to="cadastro-aluno"></md-tab>
      <md-tab id="tab-cadastro-curso" md-label="Curso" to="cadastro-curso"></md-tab>
      <md-tab id="tab-lista-de-cursos" md-label="Lista de Cursos" to="lista-de-cursos"></md-tab>
    </md-tabs>
  </div>
</template>

<script>
  export default {
    name: 'top-bar',
    data(){
      return {}
    },
    methods: {

    }
  }
</script>