@extends('adminlte::page')

@section('title', 'Actualizar Producto')

@section('css')
    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Incluye los estilos del datepicker (puedes ajustar la URL según la versión que desees) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('producto.update', ['cod_producto' => $cod_producto]) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="NOM_PRODUCTO">Nombre del Producto:</label>
                <input type="text" class="form-control" name="NOM_PRODUCTO" required>
            </div>
        
            <div class="form-group">
                <label for="DES_PRODUCTO">Descripción del Producto:</label>
                <textarea class="form-control" name="DES_PRODUCTO" required></textarea>
            </div>
        
            <div class="form-group">
                <label for="PRECIO">Precio:</label>
                <input type="number" class="form-control" name="PRECIO" required>
            </div>
        
            <div class="form-group">
                <label for="CAN_PRODUCTO">Cantidad:</label>
                <input type="number" class="form-control" name="CAN_PRODUCTO" required>
            </div>
        
            <div class="form-group">
                <label for="IMG_PRODUCTO">Imagen (URL):</label>
                <input type="text" class="form-control" name="IMG_PRODUCTO" required>
            </div>
        
            <div class="form-group">
                <label for="FEC_AGREGADO">Fecha de Agregado:</label>
                <input type="text" class="form-control datepicker" name="FEC_AGREGADO" required>
                <!-- Agrega la clase 'datepicker' para inicializar el datepicker -->
            </div>
        
            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
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
