@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@stop

@section('content')
    <p>Listado de usuarios</p>
    <div class="col-md-12 mt-3">
        <a href="{{ route('usuarios.create') }}" class="btn-sm btn-primary">Crear Nuevo Usuario</a>
    </div>
    <div class="col-md-12">
    <table class="table table-bordered table-sm">
        <thead>
            <tr>                
                <th>PERSONA</th>
                <th>USUARIO</th>                
                <th>CONTRASENA</th>                              
                <th>USUARIO</th>
                <th>FECHA</th>
                <th>ACCIONES</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
                @foreach($ResulUsuarios as $usuario)
                <tr>
                    
                    <td class="inner-table">{{$usuario['COD_PERSONA']}}</td>                   
                    <td class="inner-table">{{$usuario['USR_NOMBRE']}}</td>
                    <td class="inner-table">{{$usuario['USR_CONTRASENA']}}</td>                                   
                    <td class="inner-table">{{$usuario['USR_REGISTRO']}}</td>
                    <td class="inner-table">
                    {{ \Carbon\Carbon::parse($usuario['FEC_REGISTRO'])->format('Y-m-d') }}
                    </td>               
                    <td> 
                        <div class="d-inline">
                            <a href="{{ route('usuarios.edit', $usuario['COD_USUARIO']) }}" class="btn-sm btn-warning mr-1"><i class="fas fa-pencil-alt"></i></a>
                        </div>
                        <div class="d-inline">
                            <a href="{{ route('usuarios.show', $usuario['COD_USUARIO']) }}" class="btn-sm btn-info mr-1"><i class="fas fa-list-alt"></i></a>
                        </div>                        
                    </td>
                    <td>
                    <div class="d-inline">
                            <form action="{{ route('usuarios.destroy', ['cod_usuario' => $usuario['COD_USUARIO']]) }}" method="post">
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