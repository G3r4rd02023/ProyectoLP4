@extends('adminlte::page')

@section('title', 'Nueva Publicidad')

@section('content_header')
    <h1>Publicidad</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('guardar.publicidad') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="FEC_INICIO">Fecha de Inicio:</label>
            <input type="datetime-local" class="form-control" name="FEC_INICIO" required>
        </div>

        <div class="form-group">
            <label for="FEC_FINAL">Fecha de Finalización:</label>
            <input type="datetime-local" class="form-control" name="FEC_FINAL" required>
        </div>

        <div class="form-group">
            <label for="PUB_DESCRIPCION">Descripción de la Campaña:</label>
            <textarea class="form-control" name="PUB_DESCRIPCION" required></textarea>
        </div>

        <div class="form-group">
            <label for="PUB_RECURSOS">Recursos de la Campaña:</label>
            <input type="text" class="form-control" name="PUB_RECURSOS" required maxlength="250">
        </div>

        <div class="form-group">
            <label for="PUB_CANALES">Canales de Difusión:</label>
            <input type="text" class="form-control" name="PUB_CANALES" required maxlength="250">
        </div>

        <div class="form-group">
            <label for="PUB_COSTO">Costo:</label>
            <input type="number" step="0.01" class="form-control" name="PUB_COSTO" required>
        </div>

        <div class="form-group">
            <label for="OBJ_AUDIENCIA">Objetivo en Audiencia:</label>
            <input type="text" class="form-control" name="OBJ_AUDIENCIA" required>
        </div>

        <div class="form-group">
            <label for="RES_CONTACTO">Responsable de la Publicidad:</label>
            <input type="text" class="form-control" name="RES_CONTACTO" required maxlength="100">
        </div>

        <div class="form-group">
            <label for="MET_KPIS">Métodos que Miden la Publicidad:</label>
            <input type="number" step="0.01" class="form-control" name="MET_KPIS" required>
        </div>

        <div class="form-group">
            <label for="NOT_COMENTARIOS">Notas y Comentarios:</label>
            <textarea class="form-control" name="NOT_COMENTARIOS" required></textarea>
        </div>

        <div class="form-group">
            <label for="NOM_PUBLICIDAD">Nombre de la Campaña:</label>
            <input type="text" class="form-control" name="NOM_PUBLICIDAD" required maxlength="50">
        </div>

        <div class="form-group">
            <label for="PUB_RESULTADOS">Resultados de la Publicidad:</label>
            <input type="text" class="form-control" name="PUB_RESULTADOS" required maxlength="255">
        </div>

        <button type="submit" class="btn btn-primary">CREAR PUBLICIDAD</button>
    </form>
</div>
@endsection