@extends('adminlte::page')

@section('title', 'Sucursal')

@section('content_header')
    <h1>Sucursal</h1>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@stop

@section('content')
    <p>Listado de sucursales</p>
    <div class="col-md-12 mt-3">
        <a href="{{ route('sucursal.create') }}" class="btn-sm btn-primary">Crear Nuevo Registro</a>
    </div>
    <div class="col-md-12">
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                
                <th>CODIGO SUCURSAL</th>
                <th>SUCURSAL</th>                
                <th>FECHA APERTURA</th>
                <th>GERENTE</th>                          
                <th>ACCIONES</th>
                
                <th></th>
            </tr>
        </thead>
        <tbody>
                @foreach($ResulSucursal as $sucursal)
                <tr>
                    
                    <td class="inner-table">{{$sucursal['COD_SUCURSAL']}}</td>
                    
                    <td class="inner-table">{{$sucursal['NOM_SUCURSAL']}}</td>
                    <td class="inner-table">{{$sucursal['FEC_APERTURA']}}</td>
                                    
                    <td class="inner-table">{{$sucursal['GER_SUCURSAL']}}</td>
                    
                           
                    <td> 
                        <div class="d-inline">
                            <a href="{{ route('sucursal.edit', $sucursal['COD_SUCURSAL']) }}" class="btn-sm btn-warning mr-1"><i class="fas fa-pencil-alt"></i></a>
                        </div>
                        <div class="d-inline">
                            <a href="{{ route('sucursal.show', $sucursal['COD_SUCURSAL']) }}" class="btn-sm btn-info mr-1"><i class="fas fa-list-alt"></i></a>
                        </div>                        
                    </td>
                    <td>
                    <div class="d-inline">
                            <form action="{{ route('sucursal.destroy', ['cod_sucursal' => $sucursal['COD_SUCURSAL']]) }}" method="post">
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