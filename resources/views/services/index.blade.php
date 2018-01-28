@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<h2>Our services
            @if (Auth::user()->role_id < 3)
                <a href="/services/create" class="btn btn-success">Create new service</a>
            @endif
        </h2>
    	<ul class="list-group">
    		@foreach ($services as $service)
    			<li class="list-group-item">
    				<h3><a href="/services/{{ $service->service_id }}">{{ $service->service_name }}</a></h3>
    				@if(count($service->children))
    					<ul class="list-group">
	    					@foreach ($service->children as $children)
								<li class="list-group-item"><a href="/services/{{ $children->service_id }}">{{ $children->service_name }}</a></li>
	    					@endforeach
    					</ul>
    				@endif
    			</li>
    		@endforeach
    	</ul>
    </div>
</div>
@endsection