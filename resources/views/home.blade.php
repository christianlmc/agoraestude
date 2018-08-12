@extends('layouts.app')

@section('title', 'Meus Simulados')

@section('content')
<div class="container">
	<div class="columns">
		<div class="column is-8 is-offset-2">
			<div class="card">
				<header class="card-header">
		            <p class="card-header-title title is-4">Olá, {{Auth::user()->nome}}</p>
		        </header>
		        <div class="card-content">
					<meus-cursos></meus-cursos>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
