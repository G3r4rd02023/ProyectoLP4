@extends('adminlte::page')

@section('title', 'Mensaje de Eliminación')

@section('content_header')
    <h1>Mensaje de Eliminación</h1>
@stop

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">¡Eliminado!</h1>
            <p class="lead">{{ session('success') }}</p>
            <hr class="my-4">
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ route('publicidad.index') }}" role="button">Regresar</a>
            </p>
        </div>
    </div>
@stop
