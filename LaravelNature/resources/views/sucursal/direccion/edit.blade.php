@extends('adminlte::page')

@section('content_header')
    <h1>Editar Direccion</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Direccion</div>

                    <div class="card-body">
                    <form action="{{ route('direccion.update', ['cod_direccion' => $sucursal[0]['COD_DIRECCION']]) }}" method="post">
                        @csrf
                        @method('PUT') {{-- Usa PUT para las actualizaciones --}}

                        <!-- Campos del formulario -->
                    
                        
                        <div class="form-group">
                            <label for="COD_SUCURSAL">CODIGO SUCURSAL</label>
                            <input type="text" name="COD_SUCURSAL" value="{{ $sucursal[0]['COD_SUCURSAL'] }}" class="form-control">                            
                        </div>
                        <div class="form-group">
                            <label for="DIR_SUCURSAL">DIRECCION</label>
                            <input type="text" name="DIR_SUCURSAL" class="form-control" value="{{ $sucursal[0]['DIR_SUCURSAL'] }}">
                        </div>
                        <div class="form-group">
                            <label for="DEP_SUCURSAL">DEPARTAMENTO</label>
                            <input type="text" name="DEP_SUCURSAL" class="form-control" value="{{ $sucursal[0]['DEP_SUCURSAL'] }}">
                        </div>
                        <div class="form-group">
                            <label for="CIU_SUCURSAL">CIUDAD</label>
                            <input type="text" name="CIU_SUCURSAL" class="form-control" value="{{ $sucursal[0]['CIU_SUCURSAL'] }}">
                        </div>
                        <div class="form-group">
                            <label for="FEC_AGR_DIRECCION">FECHA</label>
                            <input type="text" name="FEC_AGR_DIRECCION" class="form-control" value="{{ $sucursal[0]['FEC_AGR_DIRECCION'] }}">
                        </div>
                        
                        <!-- Otros campos... -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ url('/direccion') }}" class="btn btn-success">Cancelar</a>
                        </div>
                        </form>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection