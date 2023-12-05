@extends('adminlte::page')

@section('title', 'Actualizar Pago')

@section('css')
    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Incluye los estilos del datepicker (ajusta la URL según la versión que desees) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('metodopago.update', ['cod_met_pago' => $cod_met_pago]) }}">
            @method('PUT')
            @csrf
            
            <div class="form-group">
                <label for="COD_VENTA">Código de Venta:</label>
                <input type="number" class="form-control" name="COD_VENTA" placeholder="Código de referencia al método de pago" required>
            </div>      
    
            <div class="form-group">
                <label for="NOM_PAGO">Nombre de Pago:</label>
                <input type="text" class="form-control" name="NOM_PAGO" placeholder="Ingrese el nombre del método de pago" required>
            </div>
    
            <div class="form-group">
                <label for="DET_DETALLE_PAGO">Detalle de Pago:</label>
                <input type="text" class="form-control" name="DET_DETALLE_PAGO" placeholder="Ingrese el detalle del método de pago" required>
            </div>
            <div class="form-group">
                <label for="DES_PAGO">Descripción de Pago:</label>
                <input type="text" class="form-control" name="DES_PAGO" placeholder="Ingrese la descripción del método de pago" required>
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
    <!-- Incluye jQuery (ajusta la URL según la versión que desees) -->
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>

    <!-- Incluye Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Incluye el script del datepicker -->
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Inicializa el datepicker en el campo de fecha -->
    <script>
        $(document).ready(function(){
            // Asegúrate de que el campo tenga la clase correcta
            $('input[name="fecha"]').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });
    </script>
@stop