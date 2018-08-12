<template>
	<div class="columns is-multiline" v-if="!loading">
		<div v-if="cursos.length == 0" class="column is-12">
			<div class="notification is-info">
				<h3 class="title is-3">Você ainda não possui nenhum de nossos cursos</h3>
            	<h3 class="subtitle is-3">Adquira cursos agora acessando a página: <a href="https://agoraestude.com.br">agoraestude.com.br</a></h3>
			</div>
		</div>
		<template v-else>
			<div class="column is-4" v-for="curso in cursos">
				<div class="hvr-grow-shadow">
					<div class="card">
						<a :href="'/cursos/' + curso.id">
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
		</template>
	</div>
</template>

<script>
	export default {
		mounted() {
			var self = this

            axios.get('/api/cursos')
            .then(function (response) {
                self.cursos = response.data
                self.loading = false
            })
            .catch(function (error) {
                console.log(error.response.data)
            })
		},
		data: function () {
        	return {
        		cursos: [],
        		loading: true
        	}
        },
	}
</script>
