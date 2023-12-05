@extends('adminlte::page')

@section('title', 'Marcas')

@section('content_header')
    <h1>Marca</h1>
    <a href="crearFormM" class="btn btn-dark">Crear</a>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="miTabla" class="table table-bordered table-hover">
                        <thead class="thead-info">
                            <tr>
                                <th>Codigo</th>
                                <th>Codigo Producto</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Imagen</th>
                                <th>Pais</th>
                                <th>Fabricado</th>
                                <th>Fecha</th>
                                <th>Sitio Web</th>                            
                                <th class="d-none d-sm-table-cell">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ResulMarcas as $marca)
                                <tr class="table-{{ $loop->even ? 'success' : 'warning' }} product-row">
                                    <td>{{ $marca['COD_MARCA'] }}</td>
                                    <td>{{ $marca['COD_PRODUCTO'] }}</td>
                                    <td>{{ $marca['NOM_MARCA'] }}</td>
                                    <td class="text-justify align-middle">{{ $marca['DES_MARCA'] }}</td>
                                    <td><img src="{{ is_string($marca['IMG_MARCA']) ? htmlspecialchars($marca['IMG_MARCA']) : '' }}" alt="Imagen de la marca" class="img-fluid"></td>
                                    <td>{{ $marca['IDP_PAIS'] }}</td>
                                    <td>{{ $marca['FAB_MARCA'] }}</td>         
                                    <td>{{ $marca['FEC_AGR_MARCA'] }}</td>
                                    <td>{{ $marca['URL_WEB_MARCA'] }}</td>   
                                    <td class="d-none d-sm-table-cell">                           
                                        <a href="/UpdateFormM/{{ $marca['COD_MARCA'] }}" class="btn btn-info editar-btn">Editar</a>
                                        <form method="POST" action="/EliminarMarca/{{ $marca['COD_MARCA'] }}" style="display: inline;">
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

                                       