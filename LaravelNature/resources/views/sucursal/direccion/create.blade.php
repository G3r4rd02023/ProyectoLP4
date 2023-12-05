@extends('adminlte::page')


@section('content_header')
    <h1>Crear Direccion</h1>
@stop

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Direccion</div>

                    <div class="card-body">
                    <form action="{{ route('direccion.store') }}" method="post">
            @csrf

            <!-- Campos del formulario -->
           
           
            <div class="form-group">
                <label for="COD_SUCURSAL">SUCURSAL</label>
                <input type="text" name="COD_SUCURSAL" class="form-control">
            </div>
            <div class="form-group">
                <label for="DIR_SUCURSAL">DIRECCION</label>
                <input type="text" name="DIR_SUCURSAL" class="form-control">
            </div>           
            <div class="form-group">
                <label for="DEP_SUCURSAL">DEPARTAMENTO</label>
                <input type="text" name="DEP_SUCURSAL" class="form-control">
            </div>
            <div class="form-group">
                <label for="FEC_AGR_DIRECCION">FECHA</label>
                <input type="text" name="FEC_AGR_DIRECCION" class="form-control">
            </div>
            <div class="form-group">
                <label for="CIU_SUCURSAL">CIUDAD</label>
                <input type="text" name="CIU_SUCURSAL" class="form-control">
            </div>
            <!-- Otros campos... -->

            <button type="submit" class="btn btn-primary">Crear Registro</button>
            <a href="{{ url('/direccion') }}" class="btn btn-success">Cancelar</a>
        </form>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection