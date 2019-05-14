import Vue from 'vue'
import Router from 'vue-router'
import CadAluno from './components/cadastro_aluno'
import CadCurso from './components/cadastro_curso'
import ListCurso from './components/lista_cursos'
import CadTheme from './components/cadastro_tema'
import CadQuestion from './components/cadastro_questao'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Vue',
      component: Vue
    },
    {
      path: '/cadastro-aluno',
      name: 'Cadastro-Aluno',
      component: CadAluno
    },
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
    }
  ]
})