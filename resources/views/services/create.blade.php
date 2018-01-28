@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2>Create new service</h2>
			<hr>
			<form method="post" action="{{ route('services.store') }}">
				{{ csrf_field() }}
			  <div class="form-group">
			    <label for="service-name">Service name</label>
			    <input type="text" class="form-control" id="service-name" name="service_name" placeholder="Service name">
			  </div>
			  <div class="form-group">
			    <label for="service-name">Service description</label>
			    <textarea rows="5" type="text" class="form-control" id="service-name" name="description" placeholder="Service description"></textarea>
			  </div>
			  <div class="form-group">
			    <label>Parent</label>
			    <select name="parent" class="form-control">
			    	@foreach($parents as $parent)
			    		<option value="{{ $parent->service_id }}">{{ $parent->service_name }}</option>
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

			  <button type="submit" class="btn btn-primary">Create</button>
			</form>
		</div>
	</div>
</div>

@endsection
