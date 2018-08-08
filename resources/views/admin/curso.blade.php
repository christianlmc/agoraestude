@extends('layouts.app')

@section('title', $curso->nome)

@section('content')
<div class="container">
	<div class="columns">
		<div class="column is-8 is-offset-2">
			<div class="card">
				<header class="card-header">
		            <p class="card-header-title title is-4">Editar {{ $curso->nome }}</p>
		        </header>
		        <div class="card-content">
		        	<editar-curso curso-id="{{ $curso->id }}"></editar-curso>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
