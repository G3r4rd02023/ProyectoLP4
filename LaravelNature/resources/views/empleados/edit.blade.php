@extends('adminlte::page')

@section('content_header')
    <h1>Editar Empleado</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Empleado</div>

                    <div class="card-body">
                    <form action="{{ route('empleados.update', ['cod_empleado' => $persona[0]['COD_EMPLEADO']]) }}" method="post">
                        @csrf
                        @method('PUT') {{-- Usa PUT para las actualizaciones --}}

                        <!-- Campos del formulario -->
                    
                        <div class="form-group">
                            <label for="COD_PERSONA">CODIGO PERSONA</label>
                            <input type="text" name="COD_PERSONA" value="{{ $persona[0]['COD_PERSONA'] }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="NOM_EMPLEADO">NOMBRE</label>
                            <input type="text" name="NOM_EMPLEADO" value="{{ $persona[0]['NOM_EMPLEADO'] }}" class="form-control">                            
                        </div>
                        <div class="form-group">
                            <label for="APE_EMPLEADO">APELLIDO</label>
                            <input type="text" name="APE_EMPLEADO" class="form-control" value="{{ $persona[0]['APE_EMPLEADO'] }}">
                        </div>
                        <div class="form-group">
                            <label for="ROL_EMPLEADO">ROL</label>
                            <input type="text" name="ROL_EMPLEADO" class="form-control" value="{{ $persona[0]['ROL_EMPLEADO'] }}">
                        </div>
                        <div class="form-group">
                            <label for="FEC_CONTRATACION">FECHA CONTRATACION</label>
                            <input type="text" name="IND_CIVIL" class="form-control" value="{{ $persona[0]['FEC_CONTRATACION'] }}">
                        </div>
                        <div class="form-group">
                            <label for="SALARIO">SALARIO</label>
                            <input type="text" name="SALARIO" class="form-control" value="{{ $persona[0]['SALARIO'] }}">
                        </div>                       
                        <div class="form-group">
                            <label for="USR_REGISTRO">USUARIO</label>
                            <input type="text" name="USR_REGISTRO" class="form-control" value="{{ $persona[0]['USR_REGISTRO'] }}">
                        </div>
                        <!-- Otros campos... -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ url('/empleados') }}" class="btn btn-success">Cancelar</a>
                        </div>
                        </form>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
