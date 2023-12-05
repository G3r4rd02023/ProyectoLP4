@extends('adminlte::page')


@section('content_header')
    <h1>Crear Sucursal</h1>
@stop

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Sucursal</div>

                    <div class="card-body">
                    <form action="{{ route('sucursal.store') }}" method="post">
            @csrf

            <!-- Campos del formulario -->
           
           
            <div class="form-group">
                <label for="NOM_SUCURSAL">SUCURSAL</label>
                <input type="text" name="NOM_SUCURSAL" class="form-control">
            </div>
            <div class="form-group">
                <label for="FEC_APERTURA">FECHA</label>
                <input type="text" name="FEC_APERTURA" class="form-control">
            </div>           
            <div class="form-group">
                <label for="GER_SUCURSAL">GERENTE</label>
                <input type="text" name="GER_SUCURSAL" class="form-control">
            </div>
            <div class="form-group">
                <label for="IMG_SUCURSAL">IMG</label>
                <input type="file" name="IMG_SUCURSAL" class="form-control">
            </div>
            <!-- Otros campos... -->

            <button type="submit" class="btn btn-primary">Crear Registro</button>
            <a href="{{ url('/sucursal') }}" class="btn btn-success">Cancelar</a>
        </form>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection