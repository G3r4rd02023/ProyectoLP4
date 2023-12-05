@extends('adminlte::page')

@section('title', 'Nuevo Telefono')

@section('content_header')
    <h1>Telefonos</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('guardar.telefono') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="COD_CLIENTE">Cliente:</label>
            <input type="number" class="form-control" name="COD_CLIENTE" placeholder="Numero del codigo del cliente" required>
            <!-- Agrega la clase 'datepicker' para inicializar el datepicker -->
        </div>

        <div class="form-group">
            <label for="NUM_TELEFONO">Numero de telefono</label>
            <input type="text" class="form-control" name="NUM_TELEFONO" placeholder="Ejemplo: 1234-5678" required>
        </div>

        <div class="form-group">
            <label for="TIP_TELEFONO">Tipo de Telefono:</label>
            <select class="form-control" name="TIP_TELEFONO" required>
                <option value="" disabled selected>Selecciona ...</option>
                <option value="FIJO">Fijo</option>
                <option value="PERSONAL">Personal</option>
                <option value="EMPRESA">Empresa</option>
                <!-- Agrega más opciones según sea necesario -->
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Crear Telefono</button>
    </form>
@endsection