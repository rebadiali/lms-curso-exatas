<template>
  <div>
    <div>
      <b-navbar type="dark" variant="primary">
        <b-navbar-nav>
          <b-nav-item to="/">Home</b-nav-item>
          <b-nav-item href="/cadastro-tema">Tema</b-nav-item>

          <!-- Navbar dropdowns -->
          <b-nav-item-dropdown text="Cursos" right>
            <b-dropdown-item to="/lista-de-cursos">Cursos</b-dropdown-item>
            <b-dropdown-item to="/cadastro-curso">Cadastro de Curso</b-dropdown-item>
          </b-nav-item-dropdown>

          <b-nav-item-dropdown text="Questões" right>
            <b-dropdown-item to="/cadastro-questao">Cadastro de Questões</b-dropdown-item>
            <b-dropdown-item to="/cadastro-alternativas">Alternativas</b-dropdown-item>
            <b-dropdown-item to="/associacao_quest_tema">Associar Tema e Questão</b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-navbar>
    </div>
      <router-view></router-view>
  </div>
</template>

<script>
  export default {
    name: 'dashboard',
    data(){
      return {
      }
    },
    methods: {
    }
  }
</script>
<style lang="scss" scoped>
 .md-app {
    min-height: 350px;
    border: 1px solid rgba(#000, .12);
  }

   // Demo purposes only
  .md-drawer {
    width: 230px;
    max-width: calc(100vw - 125px);
  }
</style>
