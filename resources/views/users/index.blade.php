@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<h2>User list</h2>
    	<ul class="list-group">
    		@foreach ($users as $user)
    		    <li class="list-group-item"><a href="/users/{{ $user->id }}">{{ $user->name }}</a></li>
    		@endforeach
    	</ul>
    </div>
</div>
@endsection
