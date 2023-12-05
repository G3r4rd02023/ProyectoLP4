@extends('adminlte::page')

@section('title', 'Actualizar Categoria')

@section('css')
    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Incluye los estilos del datepicker (puedes ajustar la URL según la versión que desees) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('categoria.update', ['cod_categoria' => $cod_categoria]) }}">
            @method('PUT')
            @csrf
            
            <div class="form-group">
                <label for="COD_PRODUCTO">Codigo del producto:</label>
                <input type="number" class="form-control" name="COD_PRODUCTO" required>
            </div>
            <div class="form-group">
                <label for="NOM_CATEGORIA">Nombre de la Categoria:</label>
                <input type="text" class="form-control" name="NOM_CATEGORIA" required>
            </div>
    
            <div class="form-group">
                <label for="DES_CATEGORIA">Descripción de la Categoria:</label>
                <textarea class="form-control" name="DES_CATEGORIA" required></textarea>
            </div>
    
            <div class="form-group">
                <label for="IMG_CATEGORIA">Imagen (URL):</label>
                <input type="text" class="form-control" name="IMG_CATEGORIA" required>
            </div>  
        
            <button type="submit" class="btn btn-primary">Actualizar Categoria</button>
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
