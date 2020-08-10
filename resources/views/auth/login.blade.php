@extends('layouts.app')


@section('content')
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Login</div>
				<div class="card-body">
					<form method="post" action="{{ route('login') }}">
						@csrf
						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">Account name</label>
							<div class="col-md-8">
								<input id="email" type="text" class="form-control{{ ($errors->has('email') || $errors->has('username')) ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email address or Username" required autocomplete="email" autofocus />
								@if ($errors->has('email') || $errors->has('username'))
									<span class="invalid-feedback" role="alert"><strong>{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}</strong></span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
							<div class="col-md-8">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
								@error('password')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-8 offset-md-4">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
									<label class="form-check-label" for="remember">Remember me</label>
								</div>
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-md-8 offset-md-4">
								<button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
								@if (Route::has('password.request'))
									<a class="btn btn-link" href="{{ route('password.request') }}">Forgot your password?</a>
								@endif
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection