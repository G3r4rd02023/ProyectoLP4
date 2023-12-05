@extends('adminlte::page')

@section('title', 'Actualizar Servicio')

@section('css')
    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Incluye los estilos del datepicker (puedes ajustar la URL según la versión que desees) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
<div class="container">
        <form method="POST" action="{{ route('servicio.update', ['cod_servicio' => $cod_servicio]) }}">
            @method('PUT')
            @csrf
        <div class="form-group">
            <label for="DET_SERVICIO">Detalle Servicio:</label>
            <input type="text" class="form-control" name="EST_CITA" required>
        </div>

        <div class="form-group">
            <label for="TIP_SERVICIO">Tipo Servicio:</label>
            <input type="time" class="form-control" name="TIP_SERVICIO" required>
        </div>

        <div class="form-group">
            <label for="TOT_SERVICIO">TOTAL SERVICIO:</label>
            <input type="date" class="form-control" name="TOT_SERVICIO" required>
        </div>

            <!-- Agrega la clase 'datepicker' para inicializar el datepicker -->
        </div>
        
            <button type="submit" class="btn btn-primary">Actualizar Servicio</button>
        </form>
        

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>
@stop

@section('js')
    <!-- Incluye jQuery (puedes ajustar la URL según la versión que desees) -->
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>

    <!-- Incluye Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Incluye el script del datepicker -->
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Inicializa el datepicker en el campo de fecha -->
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });
    </script>
@stop