@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="jumbotron">
				<h1>{{ $user->name }}</h1>
				<p>{{ $user->email }}</p>
				<p>{{ $role }}</p>
			</div>
		</div>

		<div class="col-md-3">
			<h3>Actions</h3>
			<div class="list-group">
				<a href="/users/{{ $user->id }}/edit" class="btn btn-warning">Edit user</a>
				<br /> <br />
				<a href="#" class="btn btn-danger" onclick="var result = confirm('Are you shure you want to delete this user?');
					if (result) { 
						event.preventDefault;
						document.getElementById('delete-form').submit();
					}">
				Delete user</a>
				<form id="delete-form" method="post" action="{{ route('users.destroy', [$user->id]) }}">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="delete" class="form-control">
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
