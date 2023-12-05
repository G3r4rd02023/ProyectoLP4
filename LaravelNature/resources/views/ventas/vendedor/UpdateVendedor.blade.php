@extends('adminlte::page')

@section('title', 'Actualizar Vendedor')

@section('css')
    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Incluye los estilos del datepicker (puedes ajustar la URL según la versión que desees) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('vendedor.update', ['cod_vendedor' => $cod_vendedor]) }}">
            @method('PUT')
            @csrf
            
            <div class="form-group">
                <label for="COD_VENTA">Codigo de la venta:</label>
                <input type="number" class="form-control" name="COD_VENTA" placeholder="Codigo de referencia a laventa" required>
            </div>
            <div class="form-group">
                <label for="NOM_VENDEDOR">Nombre:</label>
                <input type="text" class="form-control" name="NOM_VENDEDOR"  placeholder="Ingrese el nombre del vendedor">
            </div>
    
            <div class="form-group">
                <label for="APE_APELLIDO">Apellido:</label>
                <input class="form-control" name="APE_APELLIDO" placeholder="Ingrese el apellido del vendedor" required>
            </div>
    
            <div class="form-group">
                <label for="CAR_CARGO">Cargo:</label>
                <select class="form-control" name="CAR_CARGO" required>
                    <option value="" disabled selected>Selecciona ...</option>
                    <option value="Vendedor de sala">Vendedor de sala</option>
                    <option value="Vendedor foráneo">Vendedor foráneo</option>
                    <option value="Vendedor en línea">Vendedor en línea</option>
                    <!-- Agrega más opciones según sea necesario -->
                </select>
            </div>
        
            <button type="submit" class="btn btn-primary">Actualizar Vendedor</button>
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
