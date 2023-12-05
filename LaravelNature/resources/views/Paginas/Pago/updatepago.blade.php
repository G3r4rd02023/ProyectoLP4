@extends('adminlte::page')

@section('title', 'Actualizar Pago')

@section('css')
    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Incluye los estilos del datepicker (puedes ajustar la URL según la versión que desees) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
<div class="container">
        <form method="POST" action="{{ route('pago.update', ['cod_pago' => $cod_pago]) }}">
            @method('PUT')
            @csrf
        <div class="form-group">
            <label for="COD_SERVICIO">Codigo Servicio:</label>
            <input type="text" class="form-control" name="COD_SERVICIO" required>
        </div>

        <div class="form-group">
            <label for="TIP_PAGO">Tipo Pago:</label>
            <input type="text" class="form-control" name="TIP_PAGO" required>
        </div>

        <div class="form-group">
            <label for="PLA_PAGO">PLAN DE PAGO:</label>
            <input type="decimal" class="form-control" name="PLA_PAGO" required>
        </div>

            <!-- Agrega la clase 'datepicker' para inicializar el datepicker -->
        </div>
        
            <button type="submit" class="btn btn-primary">Actualizar Pago</button>
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