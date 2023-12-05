@extends('adminlte::page')

@section('content_header')
    <h1>Editar Telefono</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Telefono</div>

                    <div class="card-body">
                    <form action="{{ route('telefono.update', ['cod_telefono' => $sucursal[0]['COD_TELEFONO']]) }}" method="post">
                        @csrf
                        @method('PUT') {{-- Usa PUT para las actualizaciones --}}

                        <!-- Campos del formulario -->
                    
                        
                        <div class="form-group">
                            <label for="COD_SUCURSAL">SUCURSAL</label>
                            <input type="text" name="COD_SUCURSAL" value="{{ $sucursal[0]['COD_SUCURSAL'] }}" class="form-control">                            
                        </div>
                        <div class="form-group">
                            <label for="NUM_TELEFONO">NUMERO</label>
                            <input type="text" name="NUM_TELEFONO" class="form-control" value="{{ $sucursal[0]['NUM_TELEFONO'] }}">
                        </div>
                        <div class="form-group">
                            <label for="TIP_TELEFONO">TIPO</label>
                            <input type="text" name="TIP_TELEFONO" class="form-control" value="{{ $sucursal[0]['TIP_TELEFONO'] }}">
                        </div>
                        <div class="form-group">
                            <label for="FEC_AGR_TELEFONO">FECHA</label>
                            <input type="text" name="FEC_AGR_TELEFONO" class="form-control" value="{{ $sucursal[0]['FEC_AGR_TELEFONO'] }}">
                        </div>
                       
                        
                        <!-- Otros campos... -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ url('/telefono') }}" class="btn btn-success">Cancelar</a>
                        </div>
                        </form>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection