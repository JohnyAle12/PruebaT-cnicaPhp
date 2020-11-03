@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @include('layouts/nav')
                    <h3 class="mt-3">Actualizar cliente</h3>
                    @include('alerts.message_alert')
                    <form action="{{ route('cliente.update', $customer) }}" method="POST" class="formCustomer">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name')?old('name'):$customer->name }}">
                            {!! $errors->first('name', '<small class="alertForm">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <label>Correo electrónico:</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email')?old('email'):$customer->email }}">
                            {!! $errors->first('email', '<small class="alertForm">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <label>Dirección:</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address')?old('address'):$customer->address }}">
                            {!! $errors->first('address', '<small class="alertForm">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <label>Genero:</label>
                            <select name="gender" class="form-control">
                                <option value="">Seleccionar</option>
                                <option value="Masculino" {{ $customer->gender=='Masculino'?'selected':'' }}>Masculino</option>
                                <option value="Femenino" {{ $customer->gender=='Femenino'?'selected':'' }}>Femenino</option>
                            </select>
                            {!! $errors->first('gender', '<small class="alertForm">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <label>Fecha nacimiento:</label>
                            <input type="date" name="bith_date" class="form-control" value="{{ old('bith_date')?old('bith_date'):$customer->bith_date }}">
                            {!! $errors->first('bith_date', '<small class="alertForm">:message</small>') !!}
                        </div>
                        <button class="btn btn-sm btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection