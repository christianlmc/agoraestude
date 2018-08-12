<style scoped>
.table__wrapper {
  overflow-x: auto;
}
</style>

<template>
	<div class="table__wrapper">
	    <table class="table is-fullwidth">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>Simulado</th>
					<th>Gabarito</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(simulado, index) in simulados" :key="simulado.id">
					<th>{{index+1}}</th>
					<td>{{simulado.nome}}</td>
					<td v-if="agora > simulado.data_disponivel"><a :href="'/arquivos/simulados/' + simulado.id">Baixar Simulado</a></td>
					<td v-else>Disponível: {{simulado.data_disponivel}}</td>
					<td v-if="agora > simulado.gabarito.data_disponivel"><a :href="'/arquivos/gabaritos/' + simulado.id">Baixar Gabarito</a></td>
					<td v-else>Disponível: {{simulado.gabarito.data_disponivel}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
	import moment from 'moment'

    export default {
    	props: ['cursoId', 'cursoNome'],
        mounted() {
        	var self = this

            axios.get('/api/cursos/' + this.cursoId + '/simulados/gabaritos')
            .then(function (response) {
            	_.forEach(response.data, function(simulado, key) {
            		response.data[key].data_disponivel			= moment(simulado.data_disponivel).format('DD/MM/YYYY')
            		response.data[key].gabarito.data_disponivel	= moment(simulado.gabarito.data_disponivel).format('DD/MM/YYYY')
				});
                self.simulados = response.data
            })
            .catch(function (error) {
                console.log(error.response.data)
            })
        },
        data: function () {
        	return {
        		simulados: [],
        		agora: moment().format('DD/MM/YYYY')
        	}
        },
    }
</script>
