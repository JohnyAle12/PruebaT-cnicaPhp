@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @include('layouts/nav')
                    <h3 class="mt-3">Actualizar datos</h3>
                    @include('alerts.message_alert')
                    <form action="{{ route('usuario.update', $user) }}" method="POST" enctype="multipart/form-data" class="formCustomer">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Fotografía de perfil:</label><br>
                            @if($user->profile_image)
                                <img src="/img/profile_image/{{ $user->profile_image }}" class="profile_image">
                            @endif
                            <input type="file" name="profile_image">
                        </div>
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name')?old('name'):$user->name }}">
                            {!! $errors->first('name', '<small class="alertForm">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <label>Correo electrónico:</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email')?old('email'):$user->email }}">
                            {!! $errors->first('email', '<small class="alertForm">:message</small>') !!}
                        </div>
                        <button class="btn btn-sm btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection