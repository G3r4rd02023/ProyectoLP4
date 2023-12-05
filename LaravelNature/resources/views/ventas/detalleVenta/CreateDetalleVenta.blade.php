@extends('adminlte::page')

@section('title', 'Nuevo Detalle Venta')

@section('content_header')
    <h1>Detalle de venta</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('guardar.detalleventa') }}" method="post">
        @csrf
        
        <div class="form-group">
            <label for="COD_VENTA">Código de Venta:</label>
            <input type="number" class="form-control" name="COD_VENTA" min="0" placeholder="Código de referencia de la venta" required>
        </div>

        <div class="form-group">
            <label for="COD_PRODUCTO">Código del producto:</label>
            <input type="number" class="form-control" name="COD_PRODUCTO" min="0" placeholder="Código de referencia del producto" required>
        </div>

        <div class="form-group">
            <label for="CAN_VENDIDA">Cantidad:</label>
            <input type="number" class="form-control" name="CAN_VENDIDA" min="0" placeholder="Cantidad de productos adquiridos" required>
        </div>

        <div class="form-group">
            <label for="PRE_UNITARIO">Precio Unitario:</label>
            <input type="number" class="form-control" name="PRE_UNITARIO" placeholder="Precio del producto" required>
        </div>

        <div class="form-group">
            <label for="SUB_TOTAL">Subtotal:</label>
            <input type="number" class="form-control" name="SUB_TOTAL"  placeholder="Subtotal" required>
        </div>

        <div class="form-group">
            <label for="DES_VENTA">Descuento (%):</label>
            <input type="number" class="form-control" name="DES_VENTA" placeholder="Ingrese el descuento aplicado" required>
        </div>

        <div class="form-group">
            <label for="ISV_IMPUESTO">ISV (%):</label>
            <input type="number" class="form-control" name="ISV_IMPUESTO"  placeholder="Ingrese el porcentaje de ISV" required>
        </div>

        <div class="form-group">
            <label for="TOT_TOTAL_VENTA">Total:</label>
            <input type="number" class="form-control" name="TOT_TOTAL_VENTA" placeholder="Total" required>
        </div>

        <button type="submit" class="btn btn-primary">Nuevo detalle de venta</button>
    </form>
</div>
@endsection