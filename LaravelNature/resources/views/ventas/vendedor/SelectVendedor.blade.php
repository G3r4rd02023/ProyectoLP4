@extends('adminlte::page')

@section('title', 'Vendedor')

@section('content_header')
    <h1>Vendedor</h1>
    <a href="crearFormVen" class="btn btn-dark">Crear</a>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="miTabla" class="table table-bordered table-hover">
                        <thead class="thead-info">
                            <tr>
                                <th>Codigo Vendedor</th>
                                <th>Codigo Venta</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cargo</th>                       
                                <th class="d-none d-sm-table-cell">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ResulVendedor as $vendedor)
                                <tr class="table-{{ $loop->even ? 'success' : 'warning' }} product-row">
                                    <td>{{ $vendedor['COD_VENDEDOR'] }}</td>
                                    <td>{{ $vendedor['COD_VENTA'] }}</td>
                                    <td>{{ $vendedor['NOM_VENDEDOR'] }}</td>
                                    <td>{{ $vendedor['NOM_APELLIDO'] }}</td>
                                    <td>{{ $vendedor['CAR_CARGO'] }}</td>

                                    <td class="d-none d-sm-table-cell">                           
                                        <a href="/UpdateFormVen/{{ $vendedor['COD_VENDEDOR'] }}" class="btn btn-info editar-btn">Editar</a>
                                        <form method="POST" action="/EliminarVendedor/{{ $vendedor['COD_VENDEDOR'] }}" style="display: inline;">
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
                // Prevenir el comportamiento predeterminado del formulario
    e.preventDefault();

// Obtener el formulario asociado al botón
const formulario = $(this).closest('form');

// Mostrar el cuadro de diálogo de SweetAlert
Swal.fire({
    title: '¿Estás seguro de borrar',
    text: '¡No podrás revertir esto!',
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, continuar'
}).then((result) => {
    // Si el usuario confirma la acción
    if (result.isConfirmed) {
        // Enviar el formulario
        formulario.submit();
    }
});

// inicio editar
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
        // Evita errores si toastr no está definido
        var toastr = toastr || {};

        @if(session('success'))
            toastr.success('{{ session('success') }}');
        @endif

        @if(session('error'))
            toastr.error('{{ session('error') }}');
        @endif
    </script>
@endsection
