<template>
    <div>
        <div>
            <p class="h1">{{ courseInfo.name }}</p>
        </div>
        <div>
            <p>Professor: {{ professorInfo.name }} </p>
        </div>
        <div>
           <!-- <md-list>
                <md-subheader>Questionarios do Curso:</md-subheader>
                <template v-for="item in questions">
                    <md-list-item :key="item.id">
                        <md-checkbox v-model="questionId" :value="item.id" />
                        <span class="md-list-item-text">{{ item.question }}</span>
                    </md-list-item>
                </template>
            </md-list>-->
        </div>
        <div v-if="type_user != 'professor'">
            <b-button  @click="criarQuestionario" variant="primary" class="link-criar">Criar Questionario</b-button>
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
            professorInfo: '',
            response: '',
            type_user: window.sessionStorage.typeUser
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
        criarQuestionario: function(){
            axios.defaults.baseURL ='http://localhost:8000'
            axios.post('/api/questionnaire', {
                professor_id: this.professorInfo.id,
                course_id: this.courseID
            }).then(response => {
                console.log(response);
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
