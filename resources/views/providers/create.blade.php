@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido {{ auth()->user()->name }}</div> <!--  Auth::user()->name -->
                <div class="card-body">
                    @include('layouts/nav')
                    <h3 class="mt-3">Crear proveedores</h3>

                    <form action="{{ route('provider.store') }}" method="POST">
                        @csrf
                        <label>Nombre</label>
                        <input type="text" name="name">
                        <label>Descripcion</label>
                        <input type="text" name="description">
                        <button type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection