@extends('layouts.app')

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Register</div>
				<div class="card-body">
					<form method="post" action="{{ route('register') }}">
						@csrf
						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
							<div class="col-md-8">
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
								@error('name')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
							<div class="col-md-8">
								<input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" />
								@error('username')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">E-Mail address</label>
							<div class="col-md-8">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
								@error('email')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
							<div class="col-md-8">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
								@error('password')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm password</label>
							<div class="col-md-8">
								<input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" />
								@error('password_confirmation')
									<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
								@enderror
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-md-8 offset-md-4">
								<button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection