@extends('adminlte::page')

@section('title', 'Detalles Telefonos')

@section('content_header')
    <h1>Detalles Telefono</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles de Telefono</div>

                    <div class="card-body">
                        <!-- Mostrar los datos de la persona -->
                        
                        <div class="form-group">
                            <label for="COD_PERSONA">PERSONA</label>
                            <input type="text" value="{{ $telefonoData[0]['COD_PERSONA'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="NUM_TELEFONO">NUMERO</label>
                            <input type="text" value="{{ $telefonoData[0]['NUM_TELEFONO'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="TIP_TELEFONO">TIPO</label>
                            <input type="text" value="{{ $telefonoData[0]['TIP_TELEFONO'] }}" class="form-control" readonly>
                        </div>                       
                        <div class="form-group">
                            <label for="USR_REGISTRO">USUARIO</label>
                            <input type="text" value="{{ $telefonoData[0]['USR_REGISTRO'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="FEC_REGISTRO">FECHA</label>
                            <input type="text" value="{{ $telefonoData[0]['FEC_REGISTRO'] }}" class="form-control" readonly>
                        </div>
                        <a href="{{ url('/telefonos') }}" class="btn btn-success">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection