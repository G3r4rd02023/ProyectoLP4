@extends('adminlte::page')


@section('content_header')
    <h1>Crear Empleado</h1>
@stop

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Empleado</div>

                    <div class="card-body">
                    <form action="{{ route('empleados.store') }}" method="post">
            @csrf

            <!-- Campos del formulario -->
           
            <div class="form-group">
                <label for="COD_PERSONA">CODIGO PERSONA</label>
                <input type="text" name="COD_PERSONA" class="form-control">
            </div>
            <div class="form-group">
                <label for="NOM_EMPLEADO">NOMBRE</label>
                <input type="text" name="NOM_EMPLEADO" class="form-control">
            </div>
            <div class="form-group">
                <label for="APE_EMPLEADO">APELLIDO</label>
                <input type="text" name="APE_EMPLEADO" class="form-control">
            </div>
            <div class="form-group">
                <label for="ROL_EMPLEADO">ROL</label>
                <input type="text" name="ROL_EMPLEADO" class="form-control">
            </div>
            <div class="form-group">
                <label for="FEC_CONTRATACION">FECHA CONTRATACION</label>
                <input type="text" name="FEC_CONTRATACION" class="form-control">
            </div>
            <div class="form-group">
                <label for="SALARIO">SALARIO</label>
                <input type="text" name="SALARIO" class="form-control">
            </div>           
            <div class="form-group">
                <label for="USR_REGISTRO">USUARIO</label>
                <input type="text" name="USR_REGISTRO" class="form-control">
            </div>
            <!-- Otros campos... -->

            <button type="submit" class="btn btn-primary">Crear Registro</button>
            <a href="{{ url('/empleados') }}" class="btn btn-success">Cancelar</a>
        </form>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
