@extends('layouts.app')

@section('content')
<div class="container">
	<div class="columns">
		<div class="column is-4 is-offset-4">
			<div class="card">
				<header class="card-header">
		            <p class="card-header-title title is-4">{{ __('Login') }}</p>
		        </header>
		        <div class="card-content">
		            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
		                @csrf
		                <div class="field">
		                	<label class="label">Email</label>
		                	<div class="control">
		                		<input class="input{{ $errors->has('email') ? ' is-danger' : '' }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
		                	</div>
		                	@if ($errors->has('email'))
		                        <p class="help is-danger">{{ $errors->first('email') }}</p>
		                    @endif
		                </div>

		                <div class="field">
		                	<label class="label">Senha</label>
		                	<div class="control">
		                		<input class="input" type="password" name="password" required>
		                	</div>
		                	@if ($errors->has('password'))
		                        <p class="help is-danger">{{ $errors->first('password') }}</p>
		                    @endif
		                </div>
		                <div class="field">
			                <label class="checkbox">
								<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
									{{ __('Lembrar Senha') }}
							</label>
						</div>
		                <div class="field">
			                <button type="submit" class="button is-primary is-fullwidth">{{ __('Login') }}</button>
				        </div>
		            </form>
		        </div>
		    </div>
		</div>
    </div>
</div>
@endsection
