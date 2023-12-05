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
                    <form action="{{ route('telefonos.update', ['cod_telefono' => $telefono[0]['COD_TELEFONO']]) }}" method="post">
                        @csrf
                        @method('PUT') {{-- Usa PUT para las actualizaciones --}}

                        <!-- Campos del formulario -->
                    
                        
                        <div class="form-group">
                            <label for="COD_PERSONA">CODIGO PERSONA</label>
                            <input type="text" name="COD_PERSONA" value="{{ $telefono[0]['COD_PERSONA'] }}" class="form-control">                            
                        </div>
                        <div class="form-group">
                            <label for="NUM_TELEFONO">NUMERO</label>
                            <input type="text" name="NUM_TELEFONO" class="form-control" value="{{ $telefono[0]['NUM_TELEFONO'] }}">
                        </div>
                        <div class="form-group">
                            <label for="TIP_TELEFONO">TIPO</label>
                            <input type="text" name="TIP_TELEFONO" class="form-control" value="{{ $telefono[0]['TIP_TELEFONO'] }}">
                        </div>            
                        <div class="form-group">
                            <label for="USR_REGISTRO">USUARIO</label>
                            <input type="text" name="USR_REGISTRO" class="form-control" value="{{ $telefono[0]['USR_REGISTRO'] }}">
                        </div>
                        <!-- Otros campos... -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ url('/telefonos') }}" class="btn btn-success">Cancelar</a>
                        </div>
                        </form>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
