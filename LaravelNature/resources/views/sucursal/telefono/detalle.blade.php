@extends('adminlte::page')

@section('title', 'Detalles Telefono')

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
                            <label for="COD_SUCURSAL">CODIGO SUCURSAL</label>
                            <input type="text" value="{{ $sucursalData[0]['COD_SUCURSAL'] }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="NUM_TELEFONO">NUMERO</label>
                            <input type="text" value="{{ $sucursalData[0]['NUM_TELEFONO'] }}" class="form-control" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="TIP_TELEFONO">TIPO</label>
                            <input type="text" value="{{ $sucursalData[0]['TIP_TELEFONO'] }}" class="form-control" readonly>
                        </div>                        
                       
                        <div class="form-group">
                            <label for="FEC_AGR_TELEFONO">FECHA</label>
                            <input type="text" value="{{ $sucursalData[0]['FEC_AGR_TELEFONO'] }}" class="form-control" readonly>
                        </div>   
                       
                        <a href="{{ url('/telefono') }}" class="btn btn-success">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection