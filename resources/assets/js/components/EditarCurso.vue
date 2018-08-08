<template>
    <div class="container">

    </div>
</template>

<script>
    export default {
    	props: ['cursoId'],
        mounted() {
        	var self = this

            axios.get('/cursos/' + this.cursoId + '/simulados')
            .then(function (response) {
                self.simulados = response.data
            })
            .catch(function (error) {
                console.log(error.response.data.errors)
            })
        },
        data: function () {
        	return {
        		simulados: null
        	}
        },
    }
</script>
