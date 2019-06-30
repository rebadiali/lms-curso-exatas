import Vue from 'vue'
import Router from 'vue-router'
import CadCurso from './components/Professor/cadastro_curso'
import ListCursoAluno from './components/Aluno/lista_cursos'
import CadTheme from './components/Professor/cadastro_tema'
import CadQuestion from './components/Professor/cadastro_questao'
import CadAlternativas from './components/Professor/cad_alternativas'
import AssociacaoQT from  './components/Professor/association_quest_theme'
import QuestionarioC from './components/Professor/criar_questionaire'
import Questionario from './views/Questionario'
import RegistroUsuario from './views/registro_usuario'
import LoginUsuario from './views/login_usuario'
import Course from './views/Course'
import Dashboard from './views/Dashboard.vue'

Vue.use(Router)

const router =  new Router({
  mode: 'history',
  routes: [
    //-- area de usuario comum
    {
      path: '/registro-usuario',
      name: 'Registro-usuario',
      component: RegistroUsuario
    },
    {
      path: '/',
      name: 'Login-usuario',
      component: LoginUsuario
    },
    //--- area de usuario expecifico
    {
      path: '/Dashboard',
      name: 'Dashboard',
      component: Dashboard,
      redirect: '/lista-de-cursos',
      children: [
        {
          path: '/cadastro-curso',
          name: 'Cadastro-Curso',
          component: CadCurso
        },
        {
          path: '/lista-de-cursos',
          name: 'Lista-de-cursos',
          component: ListCursoAluno
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
        {
          path: '/cadastro-alternativas',
          name: 'cad-alternativas',
          component: CadAlternativas
        },
        {
          path: '/associacao_quest_tema',
          name: 'associacao_quest_tema',
          component: AssociacaoQT
        },
        {
          path: '/course/:id',
          name: 'course',
          component: Course
        },
        {
          path: '/criar_questionario/:id/:professor',
          name: 'criar_questionario',
          component: QuestionarioC
        },
        {
          path: '/questionario/:id',
          name: 'questionario',
          component: Questionario
        }

      ]
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
