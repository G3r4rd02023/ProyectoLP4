@extends('adminlte::page')

@section('title', 'Detalles Sucursal')

@section('content_header')
    <h1>Detalles Sucursal</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles de Sucursal</div>

                    <div class="card-body">
                        <!-- Mostrar los datos de la persona -->
                        <div class="form-group">
                            <label for="NOM_SUCURSAL">SUCURSAL</label>
                            <input type="text" value="{{ $sucursalData[0]['NOM_SUCURSAL'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="FEC_APERTURA">FECHA APERTURA</label>
                            <input type="text" value="{{ $sucursalData[0]['FEC_APERTURA'] }}" class="form-control" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="GER_SUCURSAL">GERENTE</label>
                            <input type="text" value="{{ $sucursalData[0]['GER_SUCURSAL'] }}" class="form-control" readonly>
                        </div>                        
                       
                       
                        <a href="{{ url('/sucursal') }}" class="btn btn-success">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection