@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div>
    		<h2>Roles list <a href="roles/create" class="btn btn-success">Add new role</a></h2> 
    	</div>
    	<ul class="list-group">
	        @foreach ($roles as $role)
	            <li class="list-group-item">{{ $role->name }}  
	            	<a href="#" class="btn btn-sm btn-danger pull-right" onclick="var result = confirm('Are you shure you want to delete this role?');
					if (result) { 
						event.preventDefault;
						document.getElementById('delete-form{{ $role->id }}').submit();
					}">Delete </a>

	            	<a href="/roles/{{ $role->id }}/edit" class="btn btn-sm btn-warning pull-right">Edit</a>
	            </li>

                <form id="delete-form{{ $role->id }}" method="post" action="{{ route('roles.destroy', [$role->id]) }}">
        			{{ csrf_field() }}
        			<input type="hidden" name="_method" value="delete" class="form-control">
        		</form>
	        @endforeach
	        
    	</ul>
    </div>
</div>
@endsection
