@extends('adminlte::page')

@section('title', 'Actualizar Marca')

@section('css')
    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Incluye los estilos del datepicker (puedes ajustar la URL según la versión que desees) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('marca.update', ['cod_marca' => $cod_marca]) }}">
            @method('PUT')
            @csrf
            
            <div class="form-group">
                <label for="COD_PRODUCTO">Codigo del Producto:</label>
                <input type="number" class="form-control" name="COD_PRODUCTO" placeholder="Digite el numero del producto" required>
            </div>            
            
            <div class="form-group">
                <label for="NOM_MARCA">Nombre de la Marca:</label>
                <input type="text" class="form-control" name="NOM_MARCA" placeholder="Ingrese el nombre de la marca" required>
            </div>          
    
            <div class="form-group">
                <label for="DES_MARCA">Descripción de la Marca:</label>
                <textarea class="form-control" name="DES_MARCA" required></textarea>
            </div>
    
            <div class="form-group">
                <label for="IMG_MARCA">Imagen (URL):</label>
                <input type="text" class="form-control" name="IMG_MARCA" required>
            </div>
    
            <div class="form-group">
                <label for="IDP_PAIS">Pais:</label>
                <input type="text" class="form-control" name="IDP_PAIS" required>
            </div>
    
            <div class="form-group">
                <label for="FAB_MARCA">Fabrica:</label>
                <input type="text" class="form-control" name="FAB_MARCA" required>
            </div>
    
            <div class="form-group">
                <label for="FEC_AGR_MARCA">Fecha de Agregado:</label>
                <input type="date" class="form-control datepicker" name="FEC_AGR_MARCA" required>
                <!-- Agrega la clase 'datepicker' para inicializar el datepicker -->
            </div>
            <div class="form-group">
                <label for="URL_WEB_MARCA">Sitio Web:</label>
                <input type="text" class="form-control" name="URL_WEB_MARCA" required>
            </div>
        
            <button type="submit" class="btn btn-primary">Actualizar Marca</button>
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
