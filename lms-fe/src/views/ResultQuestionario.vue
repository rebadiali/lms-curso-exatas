<template>
    <div>
        <h1>Resultado</h1>
        <div class="col-md-4 text-left">
            <p>Total de questões respondidas: {{ this.response.data.total }}</p>
            <p>Total de respostas corretas: {{ this.response.data.correct }}</p>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    name: 'resultado',
    data() {
        return{
            idUser: window.sessionStorage.idUser,
            question_id:  this.$route.params.id,
        }
    },
    methods: {
        getResult: function(){
            axios.defaults.baseURL ='http://localhost:8000'
            console.log('user:', this.idUser, 'question:', this.question_id)
            axios.get('/api/grading', {
                student_id: this.idUser,
                questionnaire_id: this.question_id
            }).then(response => {
                this.response = response
               console.log(this.response.data.correct);
            }).catch(error => {
                this.response = 'Error: ' + error.response.status
            })
        }
    },
    mounted(){
        this.getResult();
    }
}
</script>
<style lang="scss" scoped>

</style>
