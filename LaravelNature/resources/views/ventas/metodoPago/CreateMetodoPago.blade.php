@extends('adminlte::page')

@section('title', 'Nuevo MetodoPago')

@section('content_header')
    <h1>Metodo de Pago</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('guardar.metodoPago') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="COD_VENTA">Código del Venta:</label>
            <input type="number" class="form-control" name="COD_VENTA" placeholder="Código de referencia al metodoPago" required>
        </div>

        <div class="form-group">
            <label for="NOM_PAGO">Apellido:</label>
            <input type="text" class="form-control" name="NOM_PAGO" placeholder="Ingrese el apellido del metodoPago" required>
        </div>

        <div class="form-group">
            <label for="DET_DETALLE_PAGO">Apellido:</label>
            <input type="text" class="form-control" name="DET_DETALLE_PAGO" placeholder="Ingrese el apellido del metodoPago" required>
        </div>
        <div class="form-group">
            <label for="DES_PAGO">Apellido:</label>
            <input type="text" class="form-control" name="DES_PAGO" placeholder="Ingrese el apellido del metodoPago" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Pago</button>
    </form>
</div>
  
@endsection