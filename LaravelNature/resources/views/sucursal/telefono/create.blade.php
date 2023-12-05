@extends('adminlte::page')


@section('content_header')
    <h1>Crear Telefono</h1>
@stop

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Telefono</div>

                    <div class="card-body">
                    <form action="{{ route('telefono.store') }}" method="post">
            @csrf

            <!-- Campos del formulario -->
           
           
            <div class="form-group">
                <label for="COD_SUCURSAL">CODIGO SUCURSAL</label>
                <input type="text" name="COD_SUCURSAL" class="form-control">
            </div>
            <div class="form-group">
                <label for="NUM_TELEFONO">NUMERO</label>
                <input type="text" name="NUM_TELEFONO" class="form-control">
            </div>           
            <div class="form-group">
                <label for="TIP_TELEFONO">TIPO</label>
                <input type="text" name="TIP_TELEFONO" class="form-control">
            </div>
            <div class="form-group">
                <label for="FEC_AGR_TELEFONO">FECHA</label>
                <input date="file" name="FEC_AGR_TELEFONO" class="form-control">
            </div>
            <!-- Otros campos... -->

            <button type="submit" class="btn btn-primary">Crear Registro</button>
            <a href="{{ url('/telefono') }}" class="btn btn-success">Cancelar</a>
        </form>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection