@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="jumbotron">
				<h1>{{ $system->name }}</h1>
				<p>{{ $system->description }}</p>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>Services</h3>
					<ul class="list-group">
						@if (count($services) > 0 )
							@foreach ($services as $service)
								<li class="list-group-item"><a href="/services/{{ $service->service_id }}">{{ $service->service_name }}</a></li>
							@endforeach
						@else
							<p>This system has no services yet.</p>
						@endif
					</ul>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			@if(Auth::user()->role_id < 3) 
				<h3>Actions</h3>
				<div class="list-group">
					<a href="/systems/{{ $system->id }}/edit" class="btn btn-warning">Edit system</a>
					<br /> <br />
					<a href="#" class="btn btn-danger" onclick="var result = confirm('Are you shure you want to delete this system?');
						if (result) { 
							event.preventDefault;
							document.getElementById('delete-form').submit();
						}">
					Delete system</a>
					<form id="delete-form" method="post" action="{{ route('systems.destroy', [$system->id]) }}">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="delete" class="form-control">
					</form>
				</div>
			@endif
		</div>
	</div>
</div>

@endsection
