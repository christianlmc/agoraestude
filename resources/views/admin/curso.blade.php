@extends('layouts.app')

@section('title', $curso->nome)

@section('content')
<div class="container">
	<div class="columns">
		<div class="column is-8 is-offset-2">
			<div class="card">
				<header class="card-header">
					<div class="columns card-header-title">
						<div class="column">
							<p class="title is-4">Editar {{ $curso->nome }}</p>
						</div>
						<div class="column">
							<a class="button is-outlined is-primary is-pulled-right" href="{{ route('painel-admin') }}">
								<span class="icon">
									<i class="fas fa-arrow-circle-left"></i>
								</span>
								<span>Painel Admin</span>
							</a>
						</div>
					</div>
		        </header>
		        <div class="card-content">
		        	<editar-curso curso-id="{{ $curso->id }}" curso-nome="{{ $curso->nome }}"></editar-curso>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
