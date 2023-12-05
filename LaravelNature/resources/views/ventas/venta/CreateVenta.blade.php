@extends('adminlte::page')

@section('title', 'Nueva Venta')

@section('content_header')
    <h1>Ventas</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('guardar.venta') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="FEC_AGREGADO">Fecha de Agregado:</label>
            <input type="date" class="form-control datepicker" name="FEC_AGREGADO" required>
            <!-- Agrega la clase 'datepicker' para inicializar el datepicker -->
        </div>

        <div class="form-group">
            <label for="DET_DETALLE_VEN">Detalle</label>
            <input type="text" class="form-control" name="DET_DETALLE_VEN" placeholder="Ingrese información adicional" required>
        </div>

        <div class="form-group">
            <label for="RTN_IDENTIFICACION">RTN:</label>
            <input type="text" class="form-control" name="RTN_IDENTIFICACION" placeholder="Ejemplo: 00000-0000-00000" required>
        </div>

        <div class="form-group">
            <label for="NOM_ENTIDAD">Entidad:</label>
            <input type="text" class="form-control" name="NOM_ENTIDAD" placeholder="Ingrese el nombre de la empresa" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Venta</button>
    </form>
</div>
@endsection