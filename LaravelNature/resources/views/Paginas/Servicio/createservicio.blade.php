@extends('adminlte::page')

@section('title', 'Nuevo Servicio')

@section('content_header')
    <h1>Servicio</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('guardar.servicio') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="DET_SERVICIO">Detalle Servicio:</label>
            <input type="text" class="form-control" name="DET_SERVICIO" required>
        </div>

        <div class="form-group">
            <label for="TIP_SERVICIO">Tipo Servicio:</label>
            <input type="text" class="form-control" name="TIP_SERVICIO" required>
        </div>

        <div class="form-group">
            <label for="TOT_SERVICIO">Total Servicio:</label>
            <input type="number" class="form-control" name="TOT_SERVICIO" required>
        </div>

            <!-- Agrega la clase 'datepicker' para inicializar el datepicker -->
        </div>

        <button type="submit" class="btn btn-primary">Crear servicio</button>
    </form>

@endsection