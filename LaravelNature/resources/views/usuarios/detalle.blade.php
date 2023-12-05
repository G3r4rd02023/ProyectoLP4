@extends('adminlte::page')

@section('title', 'Detalles Usuarios')

@section('content_header')
    <h1>Detalles Usuario</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles Usuario</div>

                    <div class="card-body">
                        <!-- Mostrar los datos de la persona -->
                        
                        <div class="form-group">
                            <label for="COD_PERSONA">CODIGO PERSONA</label>
                            <input type="text" value="{{ $usuariosData[0]['COD_PERSONA'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="USR_NOMBRE">NOMBRE USUARIO</label>
                            <input type="text" value="{{ $usuariosData[0]['USR_NOMBRE'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="USR_CONTRASENA">CONTRASENA</label>
                            <input type="text" value="{{ $usuariosData[0]['USR_CONTRASENA'] }}" class="form-control" readonly>
                        </div>                       
                        <div class="form-group">
                            <label for="USR_REGISTRO">USUARIO</label>
                            <input type="text" value="{{ $usuariosData[0]['USR_REGISTRO'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="FEC_REGISTRO">FECHA</label>
                            <input type="text" value="{{ $usuariosData[0]['FEC_REGISTRO'] }}" class="form-control" readonly>
                        </div>
                        <a href="{{ url('/usuarios') }}" class="btn btn-success">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection