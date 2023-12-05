@extends('adminlte::page')

@section('title', 'Telefono')

@section('content_header')
    <h1>Telefono</h1>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@stop

@section('content')
    <p>Listado de telefonos</p>
    <div class="col-md-12 mt-3">
        <a href="{{ route('telefono.create') }}" class="btn-sm btn-primary">Crear Nuevo Registro</a>
    </div>
    <div class="col-md-12">
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                
                
                <th>CODIGO SUCURSAL</th>                
                <th>NUMERO</th>
                <th>TIPO</th>                          
                <th>FECHA </th>
                
                <th></th>
            </tr>
        </thead>
        <tbody>
                @foreach($ResulSucursal as $sucursal)
                <tr>
                    
                    <td class="inner-table">{{$sucursal['COD_SUCURSAL']}}</td>
                    
                    <td class="inner-table">{{$sucursal['NUM_TELEFONO']}}</td>
                    <td class="inner-table">{{$sucursal['TIP_TELEFONO']}}</td>
                                    
                    <td class="inner-table">{{$sucursal['FEC_AGR_TELEFONO']}}</td>
                    
                           
                    <td> 
                        <div class="d-inline">
                            <a href="{{ route('telefono.edit', $sucursal['COD_TELEFONO']) }}" class="btn-sm btn-warning mr-1"><i class="fas fa-pencil-alt"></i></a>
                        </div>
                        <div class="d-inline">
                            <a href="{{ route('telefono.show', $sucursal['COD_TELEFONO']) }}" class="btn-sm btn-info mr-1"><i class="fas fa-list-alt"></i></a>
                        </div>                        
                    </td>
                    <td>
                    <div class="d-inline">
                            <form action="{{ route('telefono.destroy', ['cod_telefono' => $sucursal['COD_TELEFONO']]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </td>             
                </tr>                
            @endforeach
        </tbody>        
    </table>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@stop