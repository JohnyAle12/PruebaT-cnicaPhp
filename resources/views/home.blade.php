@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Bienvenido {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @include('layouts/nav')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div id="app">
                        <h1 class="mt-2">{{ getNameHelper() }} - {{ getNameCustomed('johny prieto') }}</h1>
                        <user-component></user-component>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
