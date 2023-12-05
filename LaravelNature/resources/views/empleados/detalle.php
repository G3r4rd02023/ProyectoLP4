@extends('adminlte::page')

@section('title', 'Detalles Empleado')

@section('content_header')
    <h1>Detalles Empleado</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles de Empleado</div>

                    <div class="card-body">
                        <!-- Mostrar los datos de la persona -->
                        <div class="form-group">
                            <label for="COD_PERSONA">COD_PERSONA</label>
                            <input type="text" value="{{ $personaData[0]['COD_PERSONA'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="NOM_EMPLEADO">NOMBRE</label>
                            <input type="text" value="{{ $personaData[0]['NOM_EMPLEADO'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="APE_EMPLEADO">APELLIDO</label>
                            <input type="text" value="{{ $personaData[0]['APE_EMPLEADO'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="ROL_EMPLEADO">ROL</label>
                            <input type="text" value="{{ $personaData[0]['ROL_EMPLEADO'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="FEC_CONTRATACION">FECHA CONTRATACION</label>
                            <input type="text" value="{{ $personaData[0]['FEC_CONTRATACION'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="SALARIO">SALARIO</label>
                            <input type="text" value="{{ $personaData[0]['SALARIO'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="USR_REGISTRO">USUARIO</label>
                            <input type="text" value="{{ $personaData[0]['USR_REGISTRO'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="FEC_REGISTRO">FECHA</label>
                            <input type="text" value="{{ $personaData[0]['FEC_REGISTRO'] }}" class="form-control" readonly>
                        </div>
                        <a href="{{ url('/empleados') }}" class="btn btn-success">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection