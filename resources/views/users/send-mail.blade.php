@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido {{ Auth::user()->name }}</div>
                <div class="card-body">
                    @include('layouts/nav')
                    <h3 class="mt-3">Enviando correos electrónicos</h3>

                    <form action="{{ route('enviar-correo.store') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Enviar Correo Random</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection