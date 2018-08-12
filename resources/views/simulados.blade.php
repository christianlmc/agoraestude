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
							<p class="title is-4">{{ $curso->nome }}</p>
						</div>
						<div class="column">
							<a class="button is-outlined is-primary is-pulled-right" href="{{ route('home') }}">
								<span class="icon">
									<i class="fas fa-arrow-circle-left"></i>
								</span>
								<span>Meus Cursos</span>
							</a>
						</div>
					</div>
		        </header>
		        <div class="card-content">
		        	<simulados curso-id="{{ $curso->id }}" curso-nome="{{ $curso->nome }}"></simulados>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
