@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Home</div>
		<div class="card-body">
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					<i class="fas fa-info-circle"></i> {{ session('status') }}
				</div>
			@endif
			<p class="card-text">Welcome to {{ config('app.name', 'Laravel') }}...</p>
		</div>
	</div>
@endsection