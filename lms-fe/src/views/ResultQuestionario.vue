<template>
    <h1>Resultado</h1>
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
                idUser: this.idUser,
                questionId: this.question_id
            }).then(response => {
                this.response = JSON.stringify(response, null, 2)
               console.log(this.response);
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
