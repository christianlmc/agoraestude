<style scoped>
.fade-enter-active, .fade-leave-active {
	transition: opacity .5s;
}
.fade-enter, .fade-leave-to {
	opacity: 0;
}
</style>

<template>
	<div class="columns is-multiline">
		<div class="column is-5">
			<div class="card">
				<a>
					<div class="card-image">
						<figure class="image is-4by3">
							<img src="/storage/ae-4by3.png" alt="Placeholder image">
						</figure>
					</div>
					<div class="card-content">
						<p class="title is-6">{{cursoNome}}</p>
					</div>
				</a>
			</div>
		</div>
		<div class="is-divider-vertical"></div>
		<div class="column is-6">
			<div class="columns is-multiline">
				<div class="column is-12">
					<div class="field">
						<label class="label">Nome do Simulado</label>
						<div class="control">
							<input v-model="nome_simulado" class="input" type="text" placeholder="Nome do simulado">
						</div>
					</div>
				</div>
				<div class="column is-6">
					<div class="field">
						<div class="file is-boxed is-info has-name is-fullwidth">
							<label class="file-label">
								<input @change="onSimuladoChange" class="file-input" type="file" accept="application/pdf">
								<span class="file-cta">
									<span class="file-icon">
										<i class="fas fa-file-upload"></i>
									</span>
									<span class="file-label">
									</span>
								</span>
								<span class="file-name">
									{{simulado_filename}}
								</span>
							</label>
						</div>
					</div>
				</div>
				<div class="column is-6">
					<div class="field">
						<label class="label">Data Disponível</label>
						<div class="control">
							<datepicker v-model="simulado_data" input-class="input" :language="ptBR"></datepicker>
						</div>
					</div>
				</div>
				<div class="column is-6">
					<div class="field">
						<div class="file is-boxed is-info has-name is-fullwidth">
							<label class="file-label">
								<input @change="onGabaritoChange" class="file-input" type="file" accept="application/pdf">
								<span class="file-cta">
									<span class="file-icon">
										<i class="fas fa-file-upload"></i>
									</span>
									<span class="file-label">
									</span>
								</span>
								<span class="file-name">
									{{gabarito_filename}}
								</span>
							</label>
						</div>
					</div>
				</div>
				<div class="column is-6">
					<div class="field">
						<label class="label">Data Disponível</label>
						<div class="control">
							<datepicker v-model="gabarito_data" input-class="input" :language="ptBR"></datepicker>
						</div>
					</div>
				</div>
				<div class="column is-12">
					<a @click="submitSimulado" class="button is-primary is-fullwidth">Adicionar</a>
				</div>
			</div>
		</div>
		<div v-if="simulados.length == 0" class="column is-12">
			<div class="notification is-info">
				<p class="title is-5">Nenhum simulado foi adicionado a este curso</p>
			</div>
		</div>
		<div v-else class="column is-12">
			<table class="table is-fullwidth">
				<thead>
					<tr>
						<th>#</th>
						<th>Nome</th>
						<th>Simulado</th>
						<th>Data</th>
						<th>Gabarito</th>
						<th>Data</th>
						<th>Ações</th>
					</tr>
				</thead>
				<transition-group name="fade" tag="tbody">
					<tr v-for="(simulado, index) in simulados" :key="simulado.id">
						<th>{{index+1}}</th>
						<td>{{simulado.nome}}</td>
						<td>
							<a :href="'/arquivos/simulados/' + simulado.id" target="_blank">Simulado</a>
						</td>
						<td>{{simulado.data_disponivel}}</td>
						<td>
							<a :href="'/arquivos/gabaritos/' + simulado.id" target="_blank">Gabarito</a>
						</td>
						<td>{{simulado.gabarito.data_disponivel}}</td>
						<td>
							<a class="button is-danger is-rounded" @click="deleteSimulado(simulado.id, index)">
								<span class="icon is-small">
									<i class="fas fa-trash"></i>
								</span>
							</a>
						</td>
					</tr>
				</transition-group>
			</table>
		</div>
	</div>
</template>

<script>
	import Datepicker from 'vuejs-datepicker'
	import {ptBR} from 'vuejs-datepicker/dist/locale'
	import moment from 'moment'

    export default {
    	components: {
    		Datepicker
    	},
    	props: ['cursoId', 'cursoNome'],
        mounted() {
        	var self = this

            axios.get('/api/cursos/' + this.cursoId + '/simulados/gabaritos')
            .then(function (response) {
                self.simulados = response.data
            })
            .catch(function (error) {
                console.log(error.response.data)
            })
        },
        data: function () {
        	return {
        		ptBR: ptBR,
        		simulados: [],

        		nome_simulado: "",
        		simulado_file: null,
        		simulado_filename: "Escolher simulado...",
        		simulado_data: null,
        		gabarito_file: null,
        		gabarito_filename: "Escolher gabarito...",
        		gabarito_data: null,
        	}
        },
        methods: {
	        onSimuladoChange(event){
	        	this.simulado_file = event.target.files[0]

				if(this.simulado_file)
	        		this.simulado_filename = this.simulado_file.name
	        	else
	        		this.simulado_filename = "Escolher simulado..."
	        },
	        onGabaritoChange(event){
	        	this.gabarito_file = event.target.files[0]

				if(this.gabarito_file)
	        		this.gabarito_filename = this.gabarito_file.name
	        	else
	        		this.gabarito_filename = "Escolher gabarito..."
	        },
	        submitSimulado(){
	        	let formData = new FormData()

	        	formData.append('curso_id', this.cursoId)

	        	formData.append('nome', this.nome_simulado)
	        	formData.append('simulado_file', this.simulado_file)
	        	formData.append('data_disponivel', moment(this.simulado_data).format('YYYY-MM-DD'))

	        	formData.append('gabarito_file', this.gabarito_file)
	        	formData.append('gabarito_data_disponivel', moment(this.gabarito_data).format('YYYY-MM-DD'))

	        	var self = this

	        	axios.post('/api/simulados', formData)
	        	.then(function (response) {
	        		self.simulados.push(response.data)
	        		console.log(response.data)
	        	})
	        	.catch(function (error) {
	        		console.log(error.response.data)
	        	})
	        },
	        deleteSimulado(id, index){
	        	var self = this

	        	axios.delete('/api/simulados/' + id)
	        	.then(function (response) {
	        		// console.log(response.data)
	        		self.simulados.splice(index, 1);
	        	})
	        	.catch(function (error) {
	        		console.log(error.response.data)
	        	})
	        }
	    },
    }
</script>
