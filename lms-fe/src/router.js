import Vue from 'vue'
import Router from 'vue-router'
import CadCurso from './components/cadastro_curso'
import ListCurso from './components/lista_cursos'
import CadTheme from './components/cadastro_tema'
import CadQuestion from './components/cadastro_questao'
import RegistroUsuario from './views/registro_usuario'
import LoginUsuario from './views/login_usuario'
import Home from './views/Home'
import Dashboard from './views/Dashboard.vue'

Vue.use(Router)

const router =  new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/Dashboard',
      name: 'Dashboard',
      component: Dashboard,
      children: [
        {
          path: '/cadastro-curso',
          name: 'Cadastro-Curso',
          component: CadCurso
        },
        {
          path: '/lista-de-cursos',
          name: 'Lista-de-cursos',
          component: ListCurso
        },
        {
          path: '/cadastro-tema',
          name: 'cadastro-tema',
          component: CadTheme
        },
        {
          path: '/cadastro-questao',
          name: 'cadastro-questao',
          component: CadQuestion
        },
      ]
    },
    {
      path: '/registro-usuario',
      name: 'Registro-usuario',
      component: RegistroUsuario
    },
    {
      path: '/login-usuario',
      name: 'Login-usuario',
      component: LoginUsuario
    }
  ]
})

router.beforeEach((to, from, next) => {
  const whiteList = ['/login-usuario','/','/registro-usuario']
  
  if (sessionStorage.tokenUser) {
    if(whiteList.includes(to.path)){
      next('/Dashboard');
      return false;
    }
    next();

  }else if(whiteList.includes(to.path)) { 
    next();
    return false;
  
  }else{
    next('/');
  }

})

export default router;
