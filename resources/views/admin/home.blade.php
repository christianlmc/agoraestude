@extends('layouts.app')

@section('title', 'Painel do Administrador')

@section('content')
<div class="container">
	<div class="columns">
		<div class="column is-8 is-offset-2">
			<div class="card">
				<header class="card-header">
		            <p class="card-header-title title is-4">Painel do Administrador</p>
		        </header>
		        <div class="card-content">
		        	<painel-admin></painel-admin>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
