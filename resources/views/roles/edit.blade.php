@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2>Edit {{ $role->name }} role</h2>
			<hr>
			<form method="post" action="{{ route('roles.update', [$role->id]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put" class="form-control">
				
			  <div class="form-group">
			    <label for="role-name">Role name</label>
			    <input type="text" class="form-control" id="role-name" name="role_name" placeholder="Role name" value="{{ $role->name }}">
			  </div>

			  <button type="submit" class="btn btn-primary">Edit</button>
			</form>
		</div>
	</div>
</div>

@endsection
