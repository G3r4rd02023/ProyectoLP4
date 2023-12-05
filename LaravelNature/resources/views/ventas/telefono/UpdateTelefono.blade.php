@extends('adminlte::page')

@section('title', 'Actualizar Telefono')

@section('css')
    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Incluye los estilos del datepicker (puedes ajustar la URL según la versión que desees) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('telefono.update', ['cod_telefono' => $cod_telefono]) }}">
            @method('PUT')
            @csrf
            
           
        <div class="form-group">
            <label for="COD_CLIENTE">Fecha de Agregado:</label>
            <input type="number" class="form-control" name="COD_CLIENTE" required>
        </div>

        <div class="form-group">
            <label for="NUM_TELEFONO">Detalle</label>
            <input type="text" class="form-control" name="NUM_TELEFONO" placeholder="Ejemplo: 12345678" required>
        </div>

        <div class="form-group">
            <label for="TIP_TELEFONO">Tipo de Telefono:</label>
            <select class="form-control" name="TIP_TELEFONO" required>
                <option value="" disabled selected>Selecciona ...</option>
                <option value="FIJO">Fijo</option>
                <option value="PERSONAL">Personal</option>
                <option value="EMPRESA">Empresa</option>
            </select>
        </div>

            <button type="submit" class="btn btn-primary">Actualizar Telefono</button>
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