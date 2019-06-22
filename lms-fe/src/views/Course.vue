<template>
    <div>
        <div>
            <p class="h1">{{ courseInfo.name }}</p>
        </div>
        <div>
            <p class="h4"> {{ professorInfo.name }} </p>
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
            response: ''
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
                this.response = JSON.parse(JSON.stringify(response))
                this.professorInfo = response.data;
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

</style>
