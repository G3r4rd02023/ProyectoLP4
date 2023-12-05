@extends('adminlte::page')

@section('title', 'Detalle de Venta')

@section('content_header')
    <h1>Detalle de Venta</h1>
    <a href="crearFormDV" class="btn btn-dark">Crear</a>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="miTabla" class="table table-bordered table-hover">
                        <thead class="thead-info">
                            <tr>
                                <th>Codigo Detalle Venta</th>
                                <th>Codigo Venta</th>
                                <th>Codigo Producto</th>
                                <th>Cantidad Vendida</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                                <th>Descuento</th>
                                <th>ISV</th>
                                <th>Total Venta</th>                        
                                <th class="d-none d-sm-table-cell">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ResulDetalleVenta as $detalleventa)
                                <tr class="table-{{ $loop->even ? 'success' : 'warning' }} product-row">
                                    <td>{{ $detalleventa['COD_DET_VENTA'] }}</td>
                                    <td>{{ $detalleventa['COD_VENTA'] }}</td>
                                    <td>{{ $detalleventa['COD_PRODUCTO'] }}</td>
                                    <td>{{ $detalleventa['CAN_VENDIDA'] }}</td>
                                    <td>{{ $detalleventa['PRE_UNITARIO'] }}</td>
                                    <td>{{ $detalleventa['SUB_TOTAL'] }}</td>
                                    <td>{{ $detalleventa['DES_VENTA'] }}</td>
                                    <td>{{ $detalleventa['ISV_IMPUESTO'] }}</td>
                                    <td>{{ $detalleventa['TOT_TOTAL_VENTA'] }}</td>

                                    <td class="d-none d-sm-table-cell">                           
                                        <a href="/UpdateFormDV/{{ $detalleventa['COD_DET_VENTA'] }}" class="btn btn-info editar-btn">Editar</a>
                                        <form method="POST" action="/EliminarDetalleVenta/{{ $detalleventa['COD_DET_VENTA'] }}" style="display: inline;">
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