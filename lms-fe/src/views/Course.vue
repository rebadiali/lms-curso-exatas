<template>
    <div>
        <div>
            <p class="h1">{{ courseInfo.name }}</p>
        </div>
        <div>
            <p>Professor: {{ professorInfo.name }} </p>
        </div>
        <div>
            <div class="d-flex flex-column align-items-center col-md-12">
            <md-subheader>Questionarios do Curso:</md-subheader>
                <ul class="list-group col-md-5">
                    <template v-for="item in questionarios">
                        <li class="list-group-item" :key="item.id">
                            <span class="md-list-item-text">
                            <router-link :to="'/questionario/' + item.id"> {{ item.name }} </router-link>
                            </span>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
        <div v-show="type_user == 'professor'" class="mt-md-3">
            <b-button  :to="'/criar_questionario/' + courseID.id + '/' + professorInfo.id" variant="primary" class="link-criar">Criar Questionario</b-button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'course',
    data() {
        return{
            courseID: this.$route.params,
            courseInfo: '',
            questionarios: '',
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
                this.getQuestionarios(this.courseInfo.id);
            }).catch(error => {
                this.response = 'Error: ' + error.response.status
            })
        },
        getProfessor(id){
            axios.defaults.baseURL ='http://localhost:8000'
            axios.get('/api/professor/'+ id).then(response => {
                this.response = JSON.stringify(response)
                this.professorInfo = response.data[0];
            }).catch(error => {
                this.response = 'Error: ' + error.response.status
            })
        },
        getQuestionarios(id){
            axios.defaults.baseURL ='http://localhost:8000'
            axios.get('/api/questionnairebycourse?course_id=' + id).then(response => {
                this.questionarios =response.data;
                console.log('Questionarios: ' + this.questionarios);
            }).catch(error => {
                this.response = 'Error: ' + error.response
            })
        }
    },
    mounted(){
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
