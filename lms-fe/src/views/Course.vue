<template>
    <div>
        <div>
            <p class="h1 titlePage">{{ courseInfo.name }}</p>
        </div>
        <div>
            <p>Professor: {{ professorInfo.name }} </p>
        </div>
        <div>
           <md-list>
            <md-subheader>Questionarios do Curso:</md-subheader>
            <template v-for="item in questionarios">
                <md-list-item :key="item.id">
                    <md-checkbox v-model="questionariosId" :value="item.id" />
                    <span class="md-list-item-text">{{ item.questionarios }}</span>
                </md-list-item>
            </template>
            </md-list>
        </div>
        <div v-show="type_user != 'professor'">
            <b-button  :to="'/questionario/' + courseID.id + '/' + professorInfo.id" variant="primary" class="link-criar">Criar Questionario</b-button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'cad-alternativas',
    data() {
        return{
            courseID: this.$route.params,
            courseInfo: '',
            questionarios: '',
            professorInfo: '',
            response: '',
            type_user: window.sessionStorage.typeUser,
        }
    },
    methods: {
        getCourse: function (){
            axios.defaults.baseURL ='http://localhost:8000'
            axios.get('/api/course/'+ this.courseID.id).then(response => {
                this.response = JSON.parse(JSON.stringify(response))
                this.courseInfo = response.data;
                this.getProfessor(this.courseInfo.professor_id);
            }).catch(error => {
                this.response = 'Error: ' + error.response.status
            })
        },
        getProfessor: function(id){
            axios.defaults.baseURL ='http://localhost:8000'
            axios.get('/api/professor/'+ id).then(response => {
                this.response = JSON.stringify(response)
                this.professorInfo = response.data[0];
            }).catch(error => {
                this.response = 'Error: ' + error.response.status
            })
        },
        getQuestionarios: function(){
            axios.defaults.baseURL ='http://localhost:8000'
            axios.get('/api/questionnaire').then(response => {
                this.response = JSON.parse(JSON.stringify(response))
                this.questionarios = response.data;
            }).catch(error => {
                this.response = 'Error: ' + error.response.status
            })
        }
    },
    mounted: function (){
        this.getCourse();
    }
}

</script>

<style lang="scss" scoped>
    .link-criar{
        text-decoration: none !important;
        color: #ffffff !important;
    }
</style>
