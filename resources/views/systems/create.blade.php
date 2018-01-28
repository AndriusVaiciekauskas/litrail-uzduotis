@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2>Create new system</h2>
			<hr>
			<form method="post" action="{{ route('systems.store') }}">
				{{ csrf_field() }}
			  <div class="form-group">
			    <label for="system-name">System name</label>
			    <input type="text" class="form-control" id="system-name" name="system_name" placeholder="System name">
			  </div>
			  <div class="form-group">
			    <label for="service-name">System description</label>
			    <textarea rows="5" type="text" class="form-control" id="service-name" name="description" placeholder="System description"></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">Create</button>
			</form>
		</div>
	</div>
</div>

@endsection
