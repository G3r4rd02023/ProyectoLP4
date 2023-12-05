@extends('adminlte::page')

@section('title', 'Actualizar Unidad')

@section('css')
    <!-- Incluye los estilos de Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Incluye los estilos del datepicker (puedes ajustar la URL según la versión que desees) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('unidad.update', ['cod_unidad' => $cod_unidad]) }}">
            @method('PUT')
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
        
            <button type="submit" class="btn btn-primary">Actualizar Marca</button>
        </form>
        

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>
@stop

@section('js')
    <!-- Incluye jQuery (puedes ajustar la URL según la versión que desees) -->
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>

    <!-- Incluye Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Incluye el script del datepicker -->
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Inicializa el datepicker en el campo de fecha -->
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });
    </script>
@stop
