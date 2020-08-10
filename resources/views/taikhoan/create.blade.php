@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Create new user</div>
		<div class="card-body">
			<form action="{{ url('/admin/users/create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="name">Name <span class="text-danger font-weight-bold">*</span></label>
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
					@error('name')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="username">Username <span class="text-danger font-weight-bold">*</span></label>
					<input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" />
					@error('username')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="email">E-Mail address <span class="text-danger font-weight-bold">*</span></label>
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
					@error('email')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="password">Password <span class="text-danger font-weight-bold">*</span></label>
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
					@error('password')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="password-confirm">Confirm password <span class="text-danger font-weight-bold">*</span></label>
					<input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" />
					@error('password_confirmation')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="privilege">Privilege <span class="text-danger font-weight-bold">*</span></label>
					<select class="custom-select form-control @error('privilege') is-invalid @enderror" id="privilege" name="privilege" required>
						<option value="">-- Choose --</option>
						<option value="admin">Administrator</option>
						<option value="author" selected="selected">User</option>
					</select>
					@error('privilege')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create new user</button>
			</form>
		</div>
	</div>
@endsection