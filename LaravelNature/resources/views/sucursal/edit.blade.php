@extends('adminlte::page')

@section('content_header')
    <h1>Editar Sucursal</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Sucursal</div>

                    <div class="card-body">
                    <form action="{{ route('sucursal.update', ['cod_sucursal' => $sucursal[0]['COD_SUCURSAL']]) }}" method="post">
                        @csrf
                        @method('PUT') {{-- Usa PUT para las actualizaciones --}}

                        <!-- Campos del formulario -->
                    
                        
                        <div class="form-group">
                            <label for="NOM_SUCURSAL">SUCURSAL</label>
                            <input type="text" name="NOM_SUCURSAL" value="{{ $sucursal[0]['NOM_SUCURSAL'] }}" class="form-control">                            
                        </div>
                        <div class="form-group">
                            <label for="FEC_APERTURA">FECHA APERTURA</label>
                            <input type="text" name="FEC_APERTURA" class="form-control" value="{{ $sucursal[0]['FEC_APERTURA'] }}">
                        </div>
                        <div class="form-group">
                            <label for="GER_SUCURSAL">GERENTE</label>
                            <input type="text" name="GER_SUCURSAL" class="form-control" value="{{ $sucursal[0]['GER_SUCURSAL'] }}">
                        </div>
                       
                        
                        <!-- Otros campos... -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ url('/sucursal') }}" class="btn btn-success">Cancelar</a>
                        </div>
                        </form>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection