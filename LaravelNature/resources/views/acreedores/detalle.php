@extends('adminlte::page')

@section('title', 'Detalles Proveedor')

@section('content_header')
    <h1>Detalles Proveedor</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles de Proveedor</div>

                    <div class="card-body">
                        <!-- Mostrar los datos de la persona -->
                        <div class="form-group">
                            <label for="COD_PERSONA">CODIGO PERSONA</label>
                            <input type="text" value="{{ $personaData[0]['COD_PERSONA'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="TIP_ACREEDOR">TIPO</label>
                            <input type="text" value="{{ $personaData[0]['TIP_ACREEDOR'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="NOM_ACREEDOR">NOMBRE</label>
                            <input type="text" value="{{ $personaData[0]['NOM_ACREEDOR'] }}" class="form-control" readonly>
                        </div>
                       
                        <div class="form-group">
                            <label for="USR_REGISTRO">USUARIO</label>
                            <input type="text" value="{{ $personaData[0]['USR_REGISTRO'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="FEC_REGISTRO">FECHA</label>
                            <input type="text" value="{{ $personaData[0]['FEC_REGISTRO'] }}" class="form-control" readonly>
                        </div>
                        <a href="{{ url('/acreedores') }}" class="btn btn-success">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection