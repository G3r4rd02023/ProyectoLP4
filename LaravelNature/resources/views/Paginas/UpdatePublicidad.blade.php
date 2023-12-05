@extends('adminlte::page')

@section('title', 'Actualizar Publicidad')

@section('css')
    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Incluye los estilos del datepicker (puedes ajustar la URL según la versión que desees) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('publicidad.update', ['cod_publicidad' => $cod_publicidad]) }}">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="FEC_INICIO">Fecha de Inicio:</label>
                <input type="datetime-local" class="form-control datepicker" name="FEC_INICIO" required>
            </div>

            <div class="form-group">
                <label for="FEC_FINAL">Fecha de Finalización:</label>
                <input type="datetime-local" class="form-control datepicker" name="FEC_FINAL" required>
            </div>

            <div class="form-group">
                <label for="PUB_DESCRIPCION">Descripción de la Campaña:</label>
                <textarea class="form-control" name="PUB_DESCRIPCION" required></textarea>
            </div>

            <div class="form-group">
                <label for="PUB_RECURSOS">Recursos de la Campaña:</label>
                <input type="text" class="form-control" name="PUB_RECURSOS" required>
            </div>

            <div class="form-group">
                <label for="PUB_CANALES">Canales de Difusión:</label>
                <input type="text" class="form-control" name="PUB_CANALES" required>
            </div>

            <div class="form-group">
                <label for="PUB_COSTO">Costo de la Publicidad:</label>
                <input type="number" class="form-control" name="PUB_COSTO" required>
            </div>

            <div class="form-group">
                <label for="OBJ_AUDIENCIA">Objetivo en Audiencia:</label>
                <input type="text" class="form-control" name="OBJ_AUDIENCIA" required>
            </div>

            <div class="form-group">
                <label for="RES_CONTACTO">Responsable de la Publicidad:</label>
                <input type="text" class="form-control" name="RES_CONTACTO" required>
            </div>

            <div class="form-group">
                <label for="MET_KPIS">Métodos que miden la Publicidad:</label>
                <input type="number" class="form-control" name="MET_KPIS" required>
            </div>

            <div class="form-group">
                <label for="NOT_COMENTARIOS">Notas y Comentarios:</label>
                <textarea class="form-control" name="NOT_COMENTARIOS" required></textarea>
            </div>

            <div class="form-group">
                <label for="NOM_PUBLICIDAD">Nombre de la Campaña:</label>
                <input type="text" class="form-control" name="NOM_PUBLICIDAD" required>
            </div>

            <div class="form-group">
                <label for="PUB_RESULTADOS">Resultados de la Publicidad:</label>
                <input type="text" class="form-control" name="PUB_RESULTADOS" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Publicidad</button>
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