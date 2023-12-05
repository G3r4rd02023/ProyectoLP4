@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
    <h1>Cliente</h1>
    <a href="crearFormCli" class="btn btn-dark">Crear</a>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="miTabla" class="table table-bordered table-hover">
                        <thead class="thead-info">
                            <tr>
                                <th>Codigo Cliente</th>
                                <th>Codigo venta</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th class="d-none d-sm-table-cell">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ResulCliente as $cliente)
                                <tr class="table-{{ $loop->even ? 'success' : 'warning' }} product-row">
                                    <td>{{ $cliente['COD_CLIENTE'] }}</td>
                                    <td>{{ $cliente['COD_VENTA'] }}</td>
                                    <td>{{ $cliente['NOM_CLIENTE'] }}</td>
                                    <td>{{ $cliente['NOM_APELLIDO'] }}</td>
                                    <td>{{ $cliente['CORREO'] }}</td>

                                    <td class="d-none d-sm-table-cell">                           
                                        <a href="/UpdateFormCli/{{ $cliente['COD_CLIENTE'] }}" class="btn btn-info editar-btn">Editar</a>
                                        <form method="POST" action="/EliminarCliente/{{ $cliente['COD_CLIENTE'] }}" style="display: inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger borrar-btn">Borrar</button>
                                        </form>        
                                    </td>
                                </tr>                          
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $('#miTabla').DataTable();

            $('.borrar-btn').on('click', function(e) {
                e.preventDefault();
                const formulario = $(this).closest('form');

                Swal.fire({
                    title: '¿Estás seguro de borrar?',
                    text: '¡No podrás revertir esto!',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, continuar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        formulario.submit();
                    }
                });
            });

            $('.editar-btn').on('click', function(e) {
                e.preventDefault();
                const botonEditar = $(this);

                Swal.fire({
                    title: '¿Estás seguro de editar?',
                    text: '¡No podrás revertir esto!',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, continuar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = botonEditar.attr('href');
                    }
                });
            });
        });
    </script>

    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        var toastr = toastr || {};

        @if(session('success'))
            toastr.success('{{ session('success') }}');
        @endif

        @if(session('error'))
            toastr.error('{{ session('error') }}');
        @endif
    </script>
@endsection