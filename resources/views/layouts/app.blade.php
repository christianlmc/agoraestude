<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
    	@hasSection('title')
    		@yield('title') -
    	@endif
    	{{ config('app.name', 'Agora Estude') }}
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div id="app">
		<nav class="navbar" role="navigation" aria-label="main navigation">
			<div class="container">
				<div class="navbar-brand">
					<a class="navbar-item" href="{{ url('/') }}">
						<img src="{{ asset('favicon.ico') }}">
						<h3 class="title is-4">{{ config('app.name', 'Laravel') }}</h3>
					</a>
					<a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
					</a>
				</div>
				<div class="navbar-menu" id="navMenu">
					<div class="navbar-start">
						<!-- navbar items -->
						<a class="navbar-item" href="https://agoraestude.com.br/">Site Principal</a>
						@auth
							<a class="navbar-item" href="{{ route('home') }}">Meus Simulados</a>
							@if(Auth::user()->admin)
								<a class="navbar-item" href="{{ route('painel-admin') }}">Painel Admin</a>
							@endif
						@endauth
					</div>

					<div class="navbar-end">
						@guest
							<a class="navbar-item" href="{{ route('login') }}">{{ __('Login') }}</a>
						@else
							<div class="navbar-item has-dropdown is-hoverable">
								<a class="navbar-link">
									{{ Auth::user()->nome }}
								</a>
								<div class="navbar-dropdown is-right">
									<a class="navbar-item" href="{{ route('logout') }}"
									onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
								{{ __('Sair') }}</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
								</div>
							</div>
						@endguest
					</div>
				</div>
			</div>
		</nav>
        <section class="section">
            @yield('content')
        </section>
    </div>
    <script type="text/javascript">
    	document.addEventListener('DOMContentLoaded', () => {

		  // Get all "navbar-burger" elements
		  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

		  // Check if there are any navbar burgers
		  if ($navbarBurgers.length > 0) {

		    // Add a click event on each of them
		    $navbarBurgers.forEach( el => {
		      el.addEventListener('click', () => {

		        // Get the target from the "data-target" attribute
		        const target = el.dataset.target;
		        const $target = document.getElementById(target);

		        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
		        el.classList.toggle('is-active');
		        $target.classList.toggle('is-active');

		      });
		    });
		  }
		});
    </script>
</body>
</html>
