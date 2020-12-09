@extends('layouts.app')

@section('content')
	<div>
		<form action="{{ route('solucion.ejemplo') }}" method="POST">
			@csrf
			<label>Ingrese un numero:</label>
			<input type="text" name="number">
			<button type="submit" class="btn btn-success">Guardar</button>
		</form>
		@if(isset($cadena))
			{{ $cadena }}
		@endif
	</div>
@endsection