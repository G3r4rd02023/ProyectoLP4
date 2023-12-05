@extends('adminlte::page')

@section('title', 'Detalles Persona')

@section('content_header')
    <h1>Detalles Persona</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles de Persona</div>

                    <div class="card-body">
                        <!-- Mostrar los datos de la persona -->
                        <div class="form-group">
                            <label for="IDENTIDAD">IDENTIDAD</label>
                            <input type="text" value="{{ $personaData[0]['IDENTIDAD'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="NOM_PERSONA">NOMBRE</label>
                            <input type="text" value="{{ $personaData[0]['NOM_PERSONA'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="APE_PERSONA">APELLIDO</label>
                            <input type="text" value="{{ $personaData[0]['APE_PERSONA'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="GEN_PERSONA">GENERO</label>
                            <input type="text" value="{{ $personaData[0]['GEN_PERSONA'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="IND_CIVIL">ESTADO CIVIL</label>
                            <input type="text" value="{{ $personaData[0]['IND_CIVIL'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="EDA_PERSONA">EDAD</label>
                            <input type="text" value="{{ $personaData[0]['EDA_PERSONA'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="USR_REGISTRO">USUARIO</label>
                            <input type="text" value="{{ $personaData[0]['USR_REGISTRO'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="FEC_REGISTRO">FECHA</label>
                            <input type="text" value="{{ $personaData[0]['FEC_REGISTRO'] }}" class="form-control" readonly>
                        </div>
                        <a href="{{ url('/personas') }}" class="btn btn-success">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection