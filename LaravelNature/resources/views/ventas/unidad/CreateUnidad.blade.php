@extends('adminlte::page')

@section('title', 'Nuevo Unidad')

@section('content_header')
    <h1>Unidad</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('guardar.unidad') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="COD_PRODUCTO">Codigo del producto:</label>
            <input type="number" class="form-control" name="COD_PRODUCTO" min="0"  placeholder="Ingresa el codigo (solo números)" required>
        </div>

        <div class="form-group">
            <label for="NOM_UNIDAD">Denominacion de la Unidad:</label>
            <input list="nombresUnidad" class="form-control" name="NOM_UNIDAD" required placeholder="Selecciona un nombre de unidad">
            <datalist id="nombresUnidad">
                <option value="UNIDAD">
                <option value="DOCENA">
                <option value="PAQUETE">
            </datalist>
        </div>
        

        <div class="form-group">
            <label for="SIM_UNIDAD">Símbolo de unidad:</label>
            <input list="unidades" class="form-control" name="SIM_UNIDAD" placeholder="Selecciona una unidad" required>
            <datalist id="unidades">
                <option value="KG">
                <option value="LB">
                <option value="ML">
                <option value="G">
            </datalist>
        </div>

        <div class="form-group">
            <label for="CAN_CANTIDAD">Cantidad de la unidad:</label>
            <input type="number" class="form-control" name="CAN_CANTIDAD" min="1" placeholder="Ingresa la cantidad (solo números)" required>
        </div>
        
        

        <button type="submit" class="btn btn-primary">Crear Unidad</button>
    </form>

@endsection