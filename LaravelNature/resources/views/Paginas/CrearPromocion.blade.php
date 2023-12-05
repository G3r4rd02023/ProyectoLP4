@extends('adminlte::page')

@section('title', 'NUEVA PROMOCION')

@section('content_header')
    <h1>PROMOCION</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('guardar.promocion') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="COD_PUBLICIDAD">Código de Publicidad:</label>
            <input type="number" class="form-control" name="COD_PUBLICIDAD" required placeholder="Ingrese el código de publicidad">
        </div>

        <div class="form-group">
            <label for="TIP_PROMOCION">Tipo de Promoción:</label>
            <input type="text" class="form-control" name="TIP_PROMOCION" required placeholder="Ingrese el tipo de promoción">
        </div>

        <div class="form-group">
            <label for="DET_PROMOCION">Detalle de la Promoción:</label>
            <textarea class="form-control" name="DET_PROMOCION" required maxlength="250" placeholder="Ingrese el detalle de la promoción"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Crear Promoción</button>
    </form>
</div>
@endsection