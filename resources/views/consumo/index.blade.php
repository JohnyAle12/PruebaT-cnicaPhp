@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="app" class="card">
                <div class="card-header">Bienvenido {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @include('layouts/nav')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mt-5">
                        <ul>
                            @foreach($posts as $post)
                            <li>{{ $post['title'] }}</li>
                            @endforeach
                        </ul>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
