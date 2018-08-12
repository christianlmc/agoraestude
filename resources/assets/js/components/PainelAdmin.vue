<template>
    <div class="columns is-multiline">
    	<div class="column is-4" v-for="curso in cursos">
    		<div class="hvr-grow-shadow">
    			<div class="card"">
    				<a :href="'/admin/cursos/' + curso.id">
    					<div class="card-image">
    						<figure class="image is-4by3">
    							<img src="/storage/ae-4by3.png" alt="Placeholder image">
    						</figure>
    					</div>
    					<div class="card-content">
    						<p class="title is-6">{{curso.nome}}</p>
    					</div>
    				</a>
    			</div>
    		</div>
    	</div>
    </div>
</template>

<script>
    export default {
        mounted() {
        	var self = this
            axios.get('/api/cursos')
            .then(function (response) {
                self.cursos = response.data
            })
            .catch(function (error) {
                console.log(error.response.data.errors)
            })
        },
        data: function () {
        	return {
        		cursos: []
        	}
        },

    }
</script>
