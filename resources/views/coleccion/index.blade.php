@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @include('layouts/nav')
                    <h3 class="mt-3">Colecciones</h3>
                    <div id='app'>
                        <h4 class=" mt-3">Primer trabajador de la lista</h4>
                        <ul>
                            <li>{{ $worker_first['name'] }}</li>
                        </ul>
                        <h4 class=" mt-3">Ultimo trabajador de la lista</h4>
                        <ul>
                            <li>{{ $worker_last['name'] }}</li>
                        </ul>
                        <h4>Ejemplo Eager Load Clientes</h4>
                        <ul>
                            @foreach ($customers as $customer)
                            <li>Cliente: {{ $customer->name }} - Creado por: {{ $customer->users->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection