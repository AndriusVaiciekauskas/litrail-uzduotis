@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="jumbotron">
				<h1>{{ $service->service_name }}</h1>
				<p>{{ $service->description }}</p>
			</div>
		</div>

		<div class="col-md-3">
			@if(Auth::user()->role_id < 3) 
				<h3>Actions</h3>
				<div class="list-group">
					<a href="/services/{{ $service->service_id }}/edit" class="btn btn-warning">Edit service</a>
					<br /> <br />
					<a href="#" class="btn btn-danger" onclick="var result = confirm('Are you shure you want to delete this service?');
						if (result) { 
							event.preventDefault;
							document.getElementById('delete-form').submit();
						}">
					Delete service</a>
					<form id="delete-form" method="post" action="{{ route('services.destroy', [$service->service_id]) }}">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="delete" class="form-control">
					</form>
				</div>
			@endif
		</div>
	</div>
</div>

@endsection
