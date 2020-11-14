@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @include('layouts.nav')
                    <h3 class="mt-3">Crear usuario</h3>
                    @include('alerts.message_alert')
                    <form action="{{ route('usuario.store') }}" method="POST" enctype="" class="formCustomer">
                        @csrf
                        <div class="form-group">
                            <label>Rol de usuario:</label>
                            <select class="form-control" name="role">
                                <option value="">Seleccionar</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role')==$role->id?'selected':'' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('role', '<small class="alertForm">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            {!! $errors->first('name', '<small class="alertForm">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <label>Correo electrónico:</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            {!! $errors->first('email', '<small class="alertForm">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <label>Contraseña:</label>
                            <input type="password" name="password" class="form-control">
                            {!! $errors->first('password', '<small class="alertForm">:message</small>') !!}
                        </div>
                        <button class="btn btn-sm btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection