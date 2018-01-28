@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2>Edit {{ $user->name }} profile</h2>
			<hr>
			<form method="post" action="{{ route('users.update', [$user->id]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put" class="form-control">
			  <div class="form-group">
			    <label for="user-name">Username</label>
			    <input type="text" class="form-control" id="user-name" name="username" placeholder="Username" value="{{ $user->name }}">
			  </div>
			  <div class="form-group">
			    <label for="email-address">Email address</label>
			    <input type="email" class="form-control" id="email-address" name="email" placeholder="Email address" value="{{ $user->email }}">
			  </div>
			  <div class="form-group">
			    <label>Role</label>
			    <select name="role" class="form-control">
			    	@foreach ($roles as $role)
			    		<option value="{{ $role->id}}">{{ $role->name }}</option>
			    	@endforeach
			    </select>
			    <small>Current role is {{ $user->role->name }}</small>
			  </div>

			  <button type="submit" class="btn btn-primary">Edit</button>
			</form>
		</div>
	</div>
</div>

@endsection
