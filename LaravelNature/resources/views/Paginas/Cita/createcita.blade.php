@extends('adminlte::page')

@section('title', 'Nueva Cita')

@section('content_header')
    <h1>Cita</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('guardar.cita') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="COD_SERVICIO">Codigo del Servicio:</label>
            <input type="number" class="form-control" name="COD_SERVICIO" required>
        </div>

        <div class="form-group">
            <label for="EST_CITA">Estado de la Cita:</label>
            <input type="text" class="form-control" name="EST_CITA" required>
        </div>

        <div class="form-group">
            <label for="DUR_CITA">Duracion Cita:</label>
            <input type="time" class="form-control" name="DUR_CITA" required>
        </div>

        <div class="form-group">
            <label for="FEC_CITA">Fecha Cita:</label>
            <input type="date" class="form-control" name="FEC_CITA" required>
        </div>

        <div class="form-group">
            <label for="HOR_CITA">Hora Cita:</label>
            <input type="time" class="form-control" name="HOR_CITA" required>

        <div class="form-group">
            <label for="FEC_RECORDATORIO">Fecha Recordatorio:</label>
            <input type="date" class="form-control" name="FEC_RECORDATORIO" required>
        </div>
            <!-- Agrega la clase 'datepicker' para inicializar el datepicker -->
        </div>

        <button type="submit" class="btn btn-primary">Crear Cita</button>
    </form>

@endsection
