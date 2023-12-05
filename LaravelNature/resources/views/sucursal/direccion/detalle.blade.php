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
                            <label for="COD_SUCURSAL">CODIGO SUCURSAL</label>
                            <input type="text" value="{{ $sucursalData[0]['COD_SUCURSAL'] }}" class="form-control" readonly>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="DIR_SUCURSAL">DIRECCION</label>
                            <input type="text" value="{{ $sucursalData[0]['DIR_SUCURSAL'] }}" class="form-control" readonly>
                        </div>  
                        <div class="form-group">
                            <label for="DEP_SUCURSAL">DEPARTAMENTO</label>
                            <input type="text" value="{{ $sucursalData[0]['DEP_SUCURSAL'] }}" class="form-control" readonly>
                        </div> 
                        <div class="form-group">
                            <label for="CIU_SUCURSAL">CIUDAD</label>
                            <input type="text" value="{{ $sucursalData[0]['CIU_SUCURSAL'] }}" class="form-control" readonly>
                        </div>                          
                        <div class="form-group">
                            <label for="FEC_AGR_DIRECCION">FECHA</label>
                            <input type="text" value="{{ $sucursalData[0]['FEC_AGR_DIRECCION'] }}" class="form-control" readonly>
                        </div>
                       
                        <a href="{{ url('/direccion') }}" class="btn btn-success">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection