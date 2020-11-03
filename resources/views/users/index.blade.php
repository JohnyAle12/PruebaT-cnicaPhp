@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @include('layouts/nav')
                    <h3 class="mt-3">Listado de usuarios</h3>
                    <table id="users" class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Correo electrónico</th>
                            </tr>
                        </thead>
                    </table>
                    <script>
                        $(document).ready( function () {
                            $('#users').DataTable({
                                serverSide: true,
                                ajax: '/api/users',
                                columns : [
                                    {data: 'id'},
                                    {data: 'name'},
                                    {data: 'email'},
                                ]
                            });
                        } );
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection