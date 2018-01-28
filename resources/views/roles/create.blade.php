@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2>Create new role</h2>
			<hr>
			<form method="post" action="{{ route('roles.store') }}">
				{{ csrf_field() }}
			  <div class="form-group">
			    <label for="role-name">Role name</label>
			    <input type="text" class="form-control" id="role-name" name="role_name" placeholder="Role name">
			  </div>

			  <button type="submit" class="btn btn-primary">Create</button>
			</form>
		</div>
	</div>
</div>

@endsection
