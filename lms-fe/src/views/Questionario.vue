<template>
    <div>
        <div class="col-md-12 mt-md-3 justify-content-start">
            <form @submit.prevent="setAnswer">
                <div class="col-md-4 text-left">
                    <h2>{{ questionarios.name }}</h2>
                    <h6>Professor: {{professorInfo.name}}</h6>
                    <h6>Curso: {{ courseInfo.name }} </h6>
                </div>
                <div class="col-md-4 mt-md-3 text-left">
                    <template v-for="(theme, index) in questionarios.themes" >
                        <div :key="theme.id">
                            {{ adicionaObjeto(index) }}
                            <template v-for="questions in theme.questions" >
                                <div  :key="questions.question">
                                    <p>{{ questions.question }}</p>
                                    {{ getQuestion(index,questions.id) }}
                                </div>
                                <template v-for="alternatives in questions.alternatives">
                                    <div :key="alternatives.id">
                                        <input  type="radio" class="md-primary" v-model="alternative_id[index]" :value="alternatives.id"/>
                                            {{ alternatives.alternative }}
                                        {{ getAlternative(index) }}
                                    </div>
                                </template>
                            </template>
                        </div>
                    </template>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group justify-content-center d-flex">
                        <button type="submit" class="btn btn-block btn-login col-md-3">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'questionario',
    data() {
        return{
            questionnaire: this.$route.params,
            type_user: window.sessionStorage.typeUser,
            idUser: window.sessionStorage.idUser,
            questionarios: '',
            courseInfo: '',
            professorInfo: '',
            questionarioId: '',
            arrayRespostas: [],
            variavelTeste: {},
            alternative_id: [],
            question_id: []
        }
    },
    methods: {
        getQuestionarios(id){
            axios.defaults.baseURL ='http://localhost:8000'
            axios.get('api/questionnaire/' + id).then(response => {
                this.questionarios = response.data;
                this.questionarioId = response.data.id;
                this.getCourse(this.questionarios.course_id);
                this.getProfessor(this.questionarios.professor_id);
            }).catch(error => {
                this.response = 'Error: ' + error.response
            })
        },
        getCourse: function (id){
            axios.defaults.baseURL ='http://localhost:8000'
            axios.get('/api/course/'+ id).then(response => {
                this.courseInfo = response.data;
            }).catch(error => {
                this.response = 'Error: ' + error.response.status
            })
        },
        getProfessor(id){
            axios.defaults.baseURL ='http://localhost:8000'
            axios.get('/api/professor/'+ id).then(response => {
                this.professorInfo = response.data[0];
            }).catch(error => {
                this.response = 'Error: ' + error.response.status
            })
        },
        adicionaObjeto: function(index){
            this.arrayRespostas[index] = {
                "questionnaire_id": this.questionarioId,
                "student_id": this.idUser
            };
            return ;
        },
        getAlternative: function(index){
            this.arrayRespostas[index].alternative_id = this.alternative_id[index];
            return;
        },
        getQuestion: function(index,id){
            this.question_id[index] = id;
            this.arrayRespostas[index].question_id = this.question_id[index];
            return;
        },
        setAnswer: function(){
            axios.defaults.baseURL ='http://localhost:8000'
            axios.post('/api/answer', this.arrayRespostas).then(response => {
                this.response = JSON.stringify(response, null, 2)
                this.$router.push('/result/' + this.questionnaire.id);
            }).catch(error => {
                this.response = 'Error: ' + error.response.status
            })
        }
    },
    mounted(){
        this.getQuestionarios(this.questionnaire.id);
    }
}

</script>

<style lang="scss" scoped>
    .link-criar{
        text-decoration: none !important;
        color: #ffffff !important;
    }
    .btn-login{
        background-color:#FF5964;
        color:#fff;
    }
</style>
