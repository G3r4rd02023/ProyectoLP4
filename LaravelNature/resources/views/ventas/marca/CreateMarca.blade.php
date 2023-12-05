@extends('adminlte::page')

@section('title', 'Nuevo Marca')

@section('content_header')
    <h1>Marcas</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('guardar.marca') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="COD_PRODUCTO">Codigo del producto:</label>
            <input type="number" class="form-control" name="COD_PRODUCTO" required>
        </div>
        <div class="form-group">
            <label for="NOM_MARCA">Nombre de la Marca:</label>
            <input type="text" class="form-control" name="NOM_MARCA" required>
        </div>

        <div class="form-group">
            <label for="DES_MARCA">Descripción de la Marca:</label>
            <textarea class="form-control" name="DES_MARCA" required></textarea>
        </div>

        <div class="form-group">
            <label for="IMG_MARCA">Imagen (URL):</label>
            <input type="text" class="form-control" name="IMG_MARCA" required>
        </div>

        <div class="form-group">
            <label for="IDP_PAIS">Pais:</label>
            <input type="text" class="form-control" name="IDP_PAIS" required>
        </div>

        <div class="form-group">
            <label for="FAB_MARCA">Fabrica:</label>
            <input type="text" class="form-control" name="FAB_MARCA" required>
        </div>

        <div class="form-group">
            <label for="FEC_AGR_MARCA">Fecha de Agregado:</label>
            <input type="date" class="form-control datepicker" name="FEC_AGR_MARCA" required>
            <!-- Agrega la clase 'datepicker' para inicializar el datepicker -->
        </div>
        <div class="form-group">
            <label for="URL_WEB_MARCA">Sitio Web:</label>
            <input type="text" class="form-control" name="URL_WEB_MARCA" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Marca</button>
    </form>

@endsection