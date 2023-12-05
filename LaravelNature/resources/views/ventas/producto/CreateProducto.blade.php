@extends('adminlte::page')

@section('title', 'Nuevo Producto')

@section('content_header')
    <h1>Producto</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('guardar.producto') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="NOM_PRODUCTO">Nombre del Producto:</label>
            <input type="text" class="form-control" name="NOM_PRODUCTO" required>
        </div>

        <div class="form-group">
            <label for="DES_PRODUCTO">Descripción del Producto:</label>
            <textarea class="form-control" name="DES_PRODUCTO" required></textarea>
        </div>

        <div class="form-group">
            <label for="PRECIO">Precio:</label>
            <input type="number" class="form-control" name="PRECIO" required>
        </div>

        <div class="form-group">
            <label for="CAN_PRODUCTO">Cantidad:</label>
            <input type="number" class="form-control" name="CAN_PRODUCTO" required>
        </div>

        <div class="form-group">
            <label for="IMG_PRODUCTO">Imagen (URL):</label>
            <input type="text" class="form-control" name="IMG_PRODUCTO" required>
        </div>

        <div class="form-group">
            <label for="FEC_AGREGADO">Fecha de Agregado:</label>
            <input type="text" class="form-control datepicker" name="FEC_AGREGADO" required>
            <!-- Agrega la clase 'datepicker' para inicializar el datepicker -->
        </div>

        <button type="submit" class="btn btn-primary">Crear Producto</button>
    </form>

@endsection

