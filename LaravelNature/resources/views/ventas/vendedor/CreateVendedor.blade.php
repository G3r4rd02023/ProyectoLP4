@extends('adminlte::page')

@section('title', 'Nuevo Vendedor')

@section('content_header')
    <h1>Vendedor</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('guardar.vendedor') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="COD_VENTA">Código del Venta:</label>
            <input type="number" class="form-control" name="COD_VENTA" placeholder="Código de referencia al vendedor" required>
        </div>
        <div class="form-group">
            <label for="NOM_VENDEDOR">Nombre:</label>
            <input type="text" class="form-control" name="NOM_VENDEDOR"  placeholder="Ingrese el nombre del vendedor" required>
        </div>

        <div class="form-group">
            <label for="NOM_APELLIDO">Apellido:</label>
            <input type="text" class="form-control" name="NOM_APELLIDO" placeholder="Ingrese el apellido del vendedor" required>
        </div>

        <div class="form-group">
            <label for="CAR_CARGO">Cargo:</label>
            <select class="form-control" name="CAR_CARGO" required>
                <option value="" disabled selected>Selecciona ...</option>
                <option value="Vendedor de sala">Vendedor de sala</option>
                <option value="Vendedor foráneo">Vendedor foráneo</option>
                <option value="Vendedor en línea">Vendedor en línea</option>
                <!-- Agrega más opciones según sea necesario -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Vendedor</button>
    </form>
</div>

@endsection