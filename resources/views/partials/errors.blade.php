@if (Session::has('error'))
	<div class="alert alert-success alert-dismissible">
	  <strong>{!! session()->get('error') !!}</strong>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endif