

@section('content')
	<div class="card">
		<div class="card-header">Edit a user</div>
		<div class="card-body">
			<form action="{{ url('/page/users/edit') }}" method="post">
				@csrf
				<input type="hidden" id="id" name="id" value="{{ $user->id }}" />
				<div class="form-group">
					<label for="name">Name <span class="text-danger font-weight-bold">*</span></label>
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus />
					@error('name')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="username">Username <span class="text-danger font-weight-bold">*</span></label>
					<input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username" />
					@error('username')
						<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
					@enderror
				</div>
				<div class="form-group">
					<label for="email">E-Mail address <span class="text-danger font-weight-bold">*</span></label>
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" />
					@error('email')
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
				<div class="form-check mb-2">
					<input class="form-check-input" type="checkbox" id="change_password_checkbox" name="change_password_checkbox" />
					<label class="form-check-label" for="change_password_checkbox">Change password</label>
				</div>
				<div id="change_password_group">
					<div class="form-group">
						<label for="password">New password <span class="text-danger font-weight-bold">*</span></label>
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" />
						@error('password')
							<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
					<div class="form-group">
						<label for="password-confirm">Confirm new password <span class="text-danger font-weight-bold">*</span></label>
						<input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password" />
						@error('password_confirmation')
							<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
						@enderror
					</div>
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
			</form>
		</div>
	</div>
@endsection

@section('javascript')
	<script type="text/javascript">
		$(document).ready(function() {
			$("#change_password_group").hide();
			$("#change_password_checkbox").change(function() {
				if($(this).is(":checked"))
				{
					$("#change_password_group").show();
					$("#change_password_group :input").attr("required", "required");
				}
				else
				{
					$("#change_password_group").hide();
					$("#change_password_group :input").removeAttr("required");
				}
			});
		});
	</script>
@endsection