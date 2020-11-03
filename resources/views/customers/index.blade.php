@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @include('layouts/nav')
                    <h3 class="mt-3">Listado de clientes</h3>
                    @include('alerts.message_alert')
                    <ul class="list-group" style="width: 70%">
                        @foreach($customers as $customer)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                - {{ $customer->name }}<br>
                                - {{ $customer->email }}<br>
                                - {{ $customer->address }}<br>
                                - {{ $customer->gender }}
                                </div>
                                <div class="col">
                                    <a href="{{ route('cliente.edit', $customer) }}" class="btn btn-sm btn-success float-left">Editar</a>
                                    <form action="{{ route('cliente.destroy', $customer) }}" method="POST" class="float-left ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>

                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <br>
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection