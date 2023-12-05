@extends('adminlte::page')


@section('content_header')
    <h1>Crear Direccion</h1>
@stop

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Direccion</div>

                    <div class="card-body">
                    <form action="{{ route('direcciones.store') }}" method="post">
            @csrf

            <!-- Campos del formulario -->
           
            <div class="form-group">
                <label for="COD_PERSONA">CODIGO PERSONA</label>
                <input type="text" name="COD_PERSONA" class="form-control">
            </div>
            <div class="form-group">
                <label for="NOM_CALLE">CALLE</label>
                <input type="text" name="NOM_CALLE" class="form-control">
            </div>
            <div class="form-group">
                <label for="NUM_CALLE">NUMERO</label>
                <input type="text" name="NUM_CALLE" class="form-control">
            </div>
            <div class="form-group">
                <label for="NOM_COLONIA">COLONIA</label>
                <input type="text" name="NOM_COLONIA" class="form-control">
            </div>
            <div class="form-group">
                <label for="NOM_CIUDAD">CIUDAD</label>
                <input type="text" name="NOM_CIUDAD" class="form-control">
            </div>
            <div class="form-group">
                <label for="NOM_ESTADO">ESTADO</label>
                <input type="text" name="NOM_ESTADO" class="form-control">
            </div>
            <div class="form-group">
                <label for="NOM_PAIS">PAIS</label>
                <input type="text" name="NOM_PAIS" class="form-control">
            </div>
            <div class="form-group">
                <label for="ID_COD_POSTAL">CODIGO POSTAL</label>
                <input type="text" name="ID_COD_POSTAL" class="form-control">
            </div>
            <div class="form-group">
                <label for="USR_REGISTRO">USUARIO</label>
                <input type="text" name="USR_REGISTRO" class="form-control">
            </div>
            <!-- Otros campos... -->

            <button type="submit" class="btn btn-primary">Crear Registro</button>
            <a href="{{ url('/direcciones') }}" class="btn btn-success">Cancelar</a>
        </form>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection