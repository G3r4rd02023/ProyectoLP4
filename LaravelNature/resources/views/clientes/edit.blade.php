@extends('adminlte::page')

@section('content_header')
    <h1>Editar Cliente</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Cliente</div>

                    <div class="card-body">
                    <form action="{{ route('clientes.update', ['cod_cliente' => $persona[0]['COD_CLIENTE']]) }}" method="post">
                        @csrf
                        @method('PUT') {{-- Usa PUT para las actualizaciones --}}

                        <!-- Campos del formulario -->
                    
                        <div class="form-group">
                            <label for="COD_PERSONA">CODIGO PERSONA</label>
                            <input type="text" name="COD_PERSONA" value="{{ $persona[0]['COD_PERSONA'] }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="TIP_CLIENTE">TIPO</label>
                            <input type="text" name="TIP_CLIENTE" value="{{ $persona[0]['TIP_CLIENTE'] }}" class="form-control">                            
                        </div>
                        <div class="form-group">
                            <label for="NOM_CLIENTE">NOMBRE</label>
                            <input type="text" name="NOM_CLIENTE" class="form-control" value="{{ $persona[0]['NOM_CLIENTE'] }}">
                        </div>
                       
                        <div class="form-group">
                            <label for="USR_REGISTRO">USUARIO</label>
                            <input type="text" name="USR_REGISTRO" class="form-control" value="{{ $persona[0]['USR_REGISTRO'] }}">
                        </div>
                        <!-- Otros campos... -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ url('/clientes') }}" class="btn btn-success">Cancelar</a>
                        </div>
                        </form>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection