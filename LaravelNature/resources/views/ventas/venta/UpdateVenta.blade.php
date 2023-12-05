@extends('adminlte::page')

@section('title', 'Actualizar Venta')

@section('css')
    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Incluye los estilos del datepicker (puedes ajustar la URL según la versión que desees) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('venta.update', ['cod_venta' => $cod_venta]) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="FEC_AGREGADO">Fecha de Agregado:</label>
                <input type="date" class="form-control datepicker" name="FEC_AGREGADO" required>
                <!-- Agrega la clase 'datepicker' para inicializar el datepicker -->
            </div>
    
            <div class="form-group">
                <label for="DET_DETALLE_VEN">Detalle</label>
                <input type="text" class="form-control" name="DET_DETALLE_VEN" placeholder="Ingrese información adicional" required>
            </div>
    
            <div class="form-group">
                <label for="RTN_IDENTIFICACION">RTN:</label>
                <input type="text" class="form-control" name="RTN_IDENTIFICACION" placeholder="Ejemplo: 00000-0000-00000" required>
            </div>
    
            <div class="form-group">
                <label for="NOM_ENTIDAD">Entidad:</label>
                <input type="text" class="form-control" name="NOM_ENTIDAD" placeholder="Ingrese el nombre de la empresa" required>
            </div>
        
            <button type="submit" class="btn btn-primary">Actualizar Venta</button>
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
