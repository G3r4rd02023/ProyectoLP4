@extends('adminlte::page')


@section('content_header')
    <h1>Crear Persona</h1>
@stop

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Persona</div>

                    <div class="card-body">
                    <form action="{{ route('personas.store') }}" method="post">
            @csrf

            <!-- Campos del formulario -->
           
            <div class="form-group">
                <label for="IDENTIDAD">IDENTIDAD</label>
                <input type="text" name="IDENTIDAD" class="form-control">
            </div>
            <div class="form-group">
                <label for="NOM_PERSONA">NOMBRE</label>
                <input type="text" name="NOM_PERSONA" class="form-control">
            </div>
            <div class="form-group">
                <label for="APE_PERSONA">APELLIDO</label>
                <input type="text" name="APE_PERSONA" class="form-control">
            </div>
            <div class="form-group">
                <label for="GEN_PERSONA">GENERO</label>
                <input type="text" name="GEN_PERSONA" class="form-control">
            </div>
            <div class="form-group">
                <label for="IND_CIVIL">ESTADO CIVIL</label>
                <input type="text" name="IND_CIVIL" class="form-control">
            </div>
            <div class="form-group">
                <label for="EDA_PERSONA">EDAD</label>
                <input type="text" name="EDA_PERSONA" class="form-control">
            </div>
            <div class="form-group">
                <label for="IND_PERSONA">ESTADO</label>
                <input type="text" name="IND_PERSONA" class="form-control">
            </div>
            <div class="form-group">
                <label for="USR_REGISTRO">USUARIO</label>
                <input type="text" name="USR_REGISTRO" class="form-control">
            </div>
            <!-- Otros campos... -->

            <button type="submit" class="btn btn-primary">Crear Registro</button>
            <a href="{{ url('/personas') }}" class="btn btn-success">Cancelar</a>
        </form>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
