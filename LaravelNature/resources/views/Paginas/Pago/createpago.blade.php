@extends('adminlte::page')

@section('title', 'Nuevo Pago')

@section('content_header')
    <h1>Pago</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('guardar.pago') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="COD_SERVICIO">Codigo Servicio:</label>
            <input type="text" class="form-control" name="COD_SERVICIO" required>
        </div>

        <div class="form-group">
            <label for="TIP_PAGO">Tipo Pago:</label>
            <input type="text" class="form-control" name="TIP_PAGO" required>
        </div>

        <div class="form-group">
            <label for="PLA_PAGO">PLAN DE PAGO:</label>
            <input type="decimal" class="form-control" name="PLA_PAGO" required>
        </div>

            <!-- Agrega la clase 'datepicker' para inicializar el datepicker -->
        </div>

        <button type="submit" class="btn btn-primary">Crear Pago</button>
    </form>

@endsection