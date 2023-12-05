@extends('adminlte::page')

@section('title', 'Actualizar Cliente')

@section('css')
    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Incluye los estilos del datepicker (puedes ajustar la URL según la versión que desees) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('cliente.update', ['cod_cliente' => $cod_cliente]) }}">
            @method('PUT')
            @csrf
            
            <div class="form-group">
                <label for="COD_VENTA">Código de la Venta:</label>
                <input type="number" class="form-control" name="COD_VENTA" placeholder="Código de referencia al cliente" required>
            </div>
            <div class="form-group">
                <label for="NOM_CLIENTE">Nombre:</label>
                <input type="text" class="form-control" name="NOM_CLIENTE"  placeholder="Ingrese el nombre del cliente" required>
            </div>
    
            <div class="form-group">
                <label for="NOM_APELLIDO">Apellido:</label>
                <input type="text" class="form-control" name="NOM_APELLIDO" placeholder="Ingrese el apellido del cliente" required>
            </div>
    
            <div class="form-group">
                <label for="CORREO">CORREO:</label>
                <input type="text" class="form-control" name="CORREO" placeholder=" Ejemplo: User@gmail.com" required>
            </div>
        
            <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
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
