@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<h2>Systems
            @if (Auth::user()->role_id < 3)
                <a href="/systems/create" class="btn btn-success">Create new system</a>
            @endif
        </h2>
    	<ul class="list-group">
    		@foreach ($systems as $system)
    			<li class="list-group-item"><a href="/systems/{{ $system->id }}">{{ $system->name }}</a></li>
    		@endforeach
    	</ul>
    </div>
</div>
@endsection