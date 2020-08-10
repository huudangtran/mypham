@extends('layouts.app')

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Verify your email address</div>
				<div class="card-body">
					@if (session('resent'))
						<div class="alert alert-success" role="alert">
							<i class="fas fa-info-circle"></i> A fresh verification link has been sent to your email address.
						</div>
					@endif
					Before proceeding, please check your email for a verification link.
					If you did not receive the email,
					<form class="d-inline" method="post" action="{{ route('verification.resend') }}">
						@csrf
						<button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request another</button>.
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection