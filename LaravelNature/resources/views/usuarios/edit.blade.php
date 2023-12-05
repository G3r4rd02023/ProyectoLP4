@extends('adminlte::page')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Usuario</div>

                    <div class="card-body">
                    <form action="{{ route('usuarios.update', ['cod_usuario' => $usuario[0]['COD_USUARIO']]) }}" method="post">
                        @csrf
                        @method('PUT') {{-- Usa PUT para las actualizaciones --}}

                        <!-- Campos del formulario -->
                    
                        
                        <div class="form-group">
                            <label for="COD_PERSONA">CODIGO PERSONA</label>
                            <input type="text" name="COD_PERSONA" value="{{ $usuario[0]['COD_PERSONA'] }}" class="form-control">                            
                        </div>
                        <div class="form-group">
                            <label for="USR_NOMBRE">NOMBRE USUARIO</label>
                            <input type="text" name="USR_NOMBRE" class="form-control" value="{{ $usuario[0]['USR_NOMBRE'] }}">
                        </div>
                        <div class="form-group">
                            <label for="USR_CONTRASENA">TIPO</label>
                            <input type="text" name="USR_CONTRASENA" class="form-control" value="{{ $usuario[0]['USR_CONTRASENA'] }}">
                        </div>            
                        <div class="form-group">
                            <label for="USR_REGISTRO">USUARIO</label>
                            <input type="text" name="USR_REGISTRO" class="form-control" value="{{ $usuario[0]['USR_REGISTRO'] }}">
                        </div>
                        <!-- Otros campos... -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ url('/usuarios') }}" class="btn btn-success">Cancelar</a>
                        </div>
                        </form>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
