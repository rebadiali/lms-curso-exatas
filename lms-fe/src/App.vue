<template>
  <div id="app">
    <menu-lateral></menu-lateral>
  </div>
</template>

<script>
import menuLateral from "./components/menu_lateral";

export default {
  name: 'app',
  components: {
    menuLateral
  }
}
</script>

<style <style lang="scss" scoped>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
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