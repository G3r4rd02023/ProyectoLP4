@extends('adminlte::page')

@section('content_header')
    <h1>Editar Persona</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Persona</div>

                    <div class="card-body">
                    <form action="{{ route('personas.update', ['cod_persona' => $persona[0]['COD_PERSONA']]) }}" method="post">
                        @csrf
                        @method('PUT') {{-- Usa PUT para las actualizaciones --}}

                        <!-- Campos del formulario -->
                    
                        <div class="form-group">
                            <label for="IDENTIDAD">IDENTIDAD</label>
                            <input type="text" name="IDENTIDAD" value="{{ $persona[0]['IDENTIDAD'] }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="NOM_PERSONA">NOMBRE</label>
                            <input type="text" name="NOM_PERSONA" value="{{ $persona[0]['NOM_PERSONA'] }}" class="form-control">                            
                        </div>
                        <div class="form-group">
                            <label for="APE_PERSONA">APELLIDO</label>
                            <input type="text" name="APE_PERSONA" class="form-control" value="{{ $persona[0]['APE_PERSONA'] }}">
                        </div>
                        <div class="form-group">
                            <label for="GEN_PERSONA">GENERO</label>
                            <input type="text" name="GEN_PERSONA" class="form-control" value="{{ $persona[0]['GEN_PERSONA'] }}">
                        </div>
                        <div class="form-group">
                            <label for="IND_CIVIL">ESTADO CIVIL</label>
                            <input type="text" name="IND_CIVIL" class="form-control" value="{{ $persona[0]['IND_CIVIL'] }}">
                        </div>
                        <div class="form-group">
                            <label for="EDA_PERSONA">EDAD</label>
                            <input type="text" name="EDA_PERSONA" class="form-control" value="{{ $persona[0]['EDA_PERSONA'] }}">
                        </div>
                        <div class="form-group">
                            <label for="IND_PERSONA">ESTADO</label>
                            <input type="text" name="IND_PERSONA" class="form-control" value="{{ $persona[0]['IND_PERSONA'] }}">
                        </div>
                        <div class="form-group">
                            <label for="USR_REGISTRO">USUARIO</label>
                            <input type="text" name="USR_REGISTRO" class="form-control" value="{{ $persona[0]['USR_REGISTRO'] }}">
                        </div>
                        <!-- Otros campos... -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ url('/personas') }}" class="btn btn-success">Cancelar</a>
                        </div>
                        </form>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
