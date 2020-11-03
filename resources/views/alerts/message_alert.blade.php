@if(Session::has('message'))

	<div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 12px">
	  <strong>Hola {{ Auth::user()->name }}, </strong> {{Session::get('message')}}
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endif