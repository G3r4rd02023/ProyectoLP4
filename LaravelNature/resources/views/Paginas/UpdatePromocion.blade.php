@extends('adminlte::page')

@section('title', 'Actualizar Promocion')

@section('css')
    <!-- Incluye los estilos de Bootstrap y AdminLTE -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">

    <!-- Incluye los estilos del datepicker -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('promocion.update', ['cod_promocion' => $cod_promocion]) }}">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="COD_PROMOCION">Código de la Promocion:</label>
                <input type="number" class="form-control" name="COD_PROMOCION" required placeholder="Ingrese el código de Promocion">
            </div>

            <div class="form-group">
                <label for="TIP_PROMOCION">Tipo de Promoción:</label>
                <input type="text" class="form-control" name="TIP_PROMOCION" required placeholder="Ingrese el tipo de promoción">
            </div>

            <div class="form-group">
                <label for="DET_PROMOCION">Detalle de la Promoción:</label>
                <textarea class="form-control" name="DET_PROMOCION" required maxlength="250" placeholder="Ingrese el detalle de la promoción"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Promocion</button>
        </form>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>
@stop

@section('js')
    <!-- Incluye el script de AdminLTE (que ya incluye Bootstrap y jQuery) -->
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

    <!-- Incluye el script del datepicker después de cargar jQuery -->
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Inicializa el datepicker en los campos de fecha -->
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });
    </script>
@stop