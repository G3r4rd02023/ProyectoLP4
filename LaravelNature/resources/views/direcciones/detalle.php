@extends('adminlte::page')

@section('title', 'Detalles Direccion')

@section('content_header')
    <h1>Detalles Direccion</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles de Direccion</div>

                    <div class="card-body">
                        <!-- Mostrar los datos de la persona -->
                        <div class="form-group">
                            <label for="COD_PERSONA">CODIGO PERSONA</label>
                            <input type="text" value="{{ $personaData[0]['COD_PERSONA'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="NOM_CALLE">CALLE</label>
                            <input type="text" value="{{ $personaData[0]['NOM_CALLE'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="NUM_CALLE">NUMERO</label>
                            <input type="text" value="{{ $personaData[0]['NUM_CALLE'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="NOM_COLONIA">COLONIA</label>
                            <input type="text" value="{{ $personaData[0]['NOM_COLONIA'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="NOM_CIUDAD">CIUDAD</label>
                            <input type="text" value="{{ $personaData[0]['NOM_CIUDAD'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="NOM_PAIS">PAIS</label>
                            <input type="text" value="{{ $personaData[0]['NOM_PAIS'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="ID_COD_POSTAL">CODIGO POSTAL</label>
                            <input type="text" value="{{ $personaData[0]['ID_COD_POSTAL'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="USR_REGISTRO">USUARIO</label>
                            <input type="text" value="{{ $personaData[0]['USR_REGISTRO'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="FEC_REGISTRO">FECHA</label>
                            <input type="text" value="{{ $personaData[0]['FEC_REGISTRO'] }}" class="form-control" readonly>
                        </div>
                        <a href="{{ url('/direcciones') }}" class="btn btn-success">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection