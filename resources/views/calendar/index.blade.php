@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido {{ Auth::user()->name }}</div>
                <link href='main.css' rel='stylesheet' />
                <script src='main.js'></script>
                <script>

                  document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                      initialView: 'dayGridMonth'
                    });
                    calendar.render();
                  });

                </script>
                <div class="card-body">
                    @include('layouts/nav')
                    <h3 class="mt-3">Calendario</h3>
                    @include('alerts.message_alert')
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection