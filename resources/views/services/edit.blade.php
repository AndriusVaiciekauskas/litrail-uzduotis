@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2>Edit {{ $service->service_name }} profile</h2>
			<hr>
			<form method="post" action="{{ route('services.update', [$service->service_id]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put" class="form-control">
			  <div class="form-group">
			    <label for="service-name">Service name</label>
			    <input type="text" class="form-control" id="service-name" name="service_name" placeholder="Service name" value="{{ $service->service_name }}">
			  </div>
			  <div class="form-group">
			    <label for="desc">Description</label>
			    <textarea rows="5" class="form-control" id="desc" name="description" placeholder="Description">{{ $service->description }}</textarea>
			  </div>
			  <div class="form-group">
			    <label>Parent service</label>
			    <select name="parent" class="form-control">
			    	@foreach ($parents as $parent)
			    		<option value="{{ $parent->service_id}}">{{ $parent->service_name }}</option>
			    	@endforeach
			    </select>
			  </div>
			  <div class="form-group">
			    <label>System</label>
			    <select name="system" class="form-control">
			    	@foreach ($systems as $system)
			    		<option value="{{ $system->id}}">{{ $system->name }}</option>
			    	@endforeach
			    </select>
			  </div>

			  <button type="submit" class="btn btn-primary">Edit</button>
			</form>
		</div>
	</div>
</div>

@endsection
