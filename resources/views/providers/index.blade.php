@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido {{ auth()->user()->name }}</div> <!--  Auth::user()->name -->
                <div class="card-body">
                    @include('layouts/nav')
                    <h3 class="mt-3">Listado de proveedores</h3>

                    <ul>
                        @foreach($providers as $provider)
                            <li>{{ $provider->name." - ".$provider->created_at }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection