@extends('adminlte::page')

@section('title', 'Actualizar Venta')

@section('css')
    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Incluye los estilos del datepicker (ajusta la URL según la versión que desees) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('detalleventa.update', ['cod_det_venta' => $cod_det_venta]) }}">
            @method('PUT')
            @csrf
            
            <div class="form-group">
                <label for="COD_VENTA">Código de Venta:</label>
                <input type="number" class="form-control" name="COD_VENTA" min="0" placeholder="Código de referencia de la venta" required>
            </div>
    
            <div class="form-group">
                <label for="COD_PRODUCTO">Código del Producto:</label>
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
        
            <button type="submit" class="btn btn-primary">Actualizar Detalle de Venta</button>
        </form>
        
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>
@stop

@section('js')
    <!-- Incluye Bootstrap JS (ajusta la URL según la versión que desees) -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Incluye el script del datepicker -->
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Inicializa el datepicker en el campo de fecha (asegúrate de tener la clase en el campo) -->
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });
    </script>
@stop