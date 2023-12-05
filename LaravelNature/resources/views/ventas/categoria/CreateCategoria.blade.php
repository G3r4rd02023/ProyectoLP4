@extends('adminlte::page')

@section('title', 'Nueva Categoria')

@section('content_header')
    <h1>Categoria</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('guardar.categoria') }}" method="post">
        @csrf       
        <div class="form-group">
            <label for="COD_PRODUCTO">Codigo del producto:</label>
            <input type="number" class="form-control" name="COD_PRODUCTO" required>
        </div>
        <div class="form-group">
            <label for="NOM_CATEGORIA">Nombre de la Categoria:</label>
            <input type="text" class="form-control" name="NOM_CATEGORIA" required>
        </div>

        <div class="form-group">
            <label for="DES_CATEGORIA">Descripción de la Ctegoria:</label>
            <textarea class="form-control" name="DES_CATEGORIA" required></textarea>
        </div>

        <div class="form-group">
            <label for="IMG_CATEGORIA">Imagen (URL):</label>
            <input type="text" class="form-control" name="IMG_CATEGORIA" required>
        </div>      

        <button type="submit" class="btn btn-primary">Crear Categoria</button>
    </form>

@endsection 