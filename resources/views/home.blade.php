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
					<div class="columns is-multiline">
						<div class="column is-4">
							<div class="hvr-grow-shadow">
								<div class="card">
									<a>
										<div class="card-image">
											<figure class="image is-4by3">
												<img src="http://www.cmrj.eb.mil.br/images/ca/historico/9simbolo.jpg" alt="Placeholder image">
											</figure>
										</div>
										<div class="card-content">
											<p class="title is-6">Simulados Colégio Militar – 6o Ano (Matematica)</p>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="column is-4">
							<div class="hvr-grow-shadow">
								<div class="card">
									<a>
										<div class="card-image">
											<figure class="image is-4by3">
												<img src="http://www.cmrj.eb.mil.br/images/ca/historico/9simbolo.jpg" alt="Placeholder image">
											</figure>
										</div>
										<div class="card-content">
											<p class="title is-6">Simulados Colégio Militar – 1o Ano (Matematica)</p>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="column is-4">
							<div class="hvr-grow-shadow">
								<div class="card">
									<a>
										<div class="card-image">
											<figure class="image is-4by3">
												<img src="http://www.cmrj.eb.mil.br/images/ca/historico/9simbolo.jpg" alt="Placeholder image">
											</figure>
										</div>
										<div class="card-content">
											<p class="title is-6">Simulados Colégio Militar – 6o Ano (Portugues)</p>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="column is-4">
							<div class="hvr-grow-shadow">
								<div class="card">
									<a>
										<div class="card-image">
											<figure class="image is-4by3">
												<img src="http://www.cmrj.eb.mil.br/images/ca/historico/9simbolo.jpg" alt="Placeholder image">
											</figure>
										</div>
										<div class="card-content">
											<p class="title is-6">Simulados Colégio Militar – 1o Ano (Portugues)</p>
										</div>
									</a>
								</div>
							</div>
						</div>

					</div>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
