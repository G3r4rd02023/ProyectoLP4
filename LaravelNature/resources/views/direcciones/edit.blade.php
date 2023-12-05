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
                    <form action="{{ route('direcciones.update', ['cod_direccion' => $persona[0]['COD_DIRECCION']]) }}" method="post">
                        @csrf
                        @method('PUT') {{-- Usa PUT para las actualizaciones --}}

                        <!-- Campos del formulario -->
                    
                        <div class="form-group">
                            <label for="COD_PERSONA">CODIGO PERSONA</label>
                            <input type="text" name="COD_PERSONA" value="{{ $persona[0]['COD_PERSONA'] }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="NOM_CALLE">NOMBRE</label>
                            <input type="text" name="NOM_CALLE" value="{{ $persona[0]['NOM_CALLE'] }}" class="form-control">                            
                        </div>
                        <div class="form-group">
                            <label for=" NUM_CALLE">NUM_CALLE</label>
                            <input type="text" name="NUM_CALLE" class="form-control" value="{{ $persona[0]['NUM_CALLE'] }}">
                        </div>
                        <div class="form-group">
                            <label for="NOM_COLONIA">COLONIA</label>
                            <input type="text" name="NOM_COLONIA" class="form-control" value="{{ $persona[0]['NOM_COLONIA'] }}">
                        </div>
                        <div class="form-group">
                            <label for="NOM_CIUDAD"> CIUDAD</label>
                            <input type="text" name="NOM_CIUDAD" class="form-control" value="{{ $persona[0]['NOM_CIUDAD'] }}">
                        </div>
                        <div class="form-group">
                            <label for="NOM_ESTADO">ESTADO</label>
                            <input type="text" name="NOM_ESTADO" class="form-control" value="{{ $persona[0]['NOM_ESTADO'] }}">
                        </div>
                        <div class="form-group">
                            <label for="NOM_PAIS">PAIS</label>
                            <input type="text" name="NOM_PAIS" class="form-control" value="{{ $persona[0]['NOM_PAIS'] }}">
                        </div>
                        <div class="form-group">
                            <label for="ID_COD_POSTAL">CODIGO POSTAL</label>
                            <input type="text" name="ID_COD_POSTAL" class="form-control" value="{{ $persona[0]['ID_COD_POSTAL'] }}">
                        </div>
                        <div class="form-group">
                            <label for="USR_REGISTRO">USUARIO</label>
                            <input type="text" name="USR_REGISTRO" class="form-control" value="{{ $persona[0]['USR_REGISTRO'] }}">
                        </div>
                        <!-- Otros campos... -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="{{ url('/direcciones') }}" class="btn btn-success">Cancelar</a>
                        </div>
                        </form>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection