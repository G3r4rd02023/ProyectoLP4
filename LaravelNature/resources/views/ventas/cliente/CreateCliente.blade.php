@extends('adminlte::page')

@section('title', 'Nuevo Cliente')

@section('content_header')
    <h1>Cliente</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('guardar.cliente') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="COD_VENTA">Código de la Venta:</label>
            <input type="number" class="form-control" name="COD_VENTA" placeholder="Código de referencia al cliente" required>
        </div>
        <div class="form-group">
            <label for="NOM_CLIENTE">Nombre:</label>
            <input type="text" class="form-control" name="NOM_CLIENTE"  placeholder="Ingrese el nombre del cliente" required>
        </div>

        <div class="form-group">
            <label for="NOM_APELLIDO">Apellido:</label>
            <input type="text" class="form-control" name="NOM_APELLIDO" placeholder="Ingrese el apellido del cliente" required>
        </div>

        <div class="form-group">
            <label for="CORREO">Correo:</label>
            <input type="text" class="form-control" name="CORREO" placeholder=" Ejemplo: User@gmail.com" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Cliente</button>
    </form>
</div>

@endsection