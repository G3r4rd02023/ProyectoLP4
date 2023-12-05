<?php
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\TelefonoVentasController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\TelefonosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\CorreosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\AcreedoresController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\TelefonoController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\PublicidadController;
use App\Http\Controllers\PromocionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rutas del modulo Personas


Route::middleware('auth')->group(function () {
    Route::get('/personas', [PersonasController::class, 'index']);
    Route::get('/personas/{cod_persona}/detalle',[PersonasController::class,'show'])->name('personas.show');
    Route::get('/personas/create', [PersonasController::class, 'create'])->name('personas.create');
    Route::post('/personas', [PersonasController::class, 'store'])->name('personas.store');
    Route::get('/personas/{cod_persona}/edit', [PersonasController::class, 'edit'])->name('personas.edit');
    Route::put('/personas/{cod_persona}', [PersonasController::class, 'update'])->name('personas.update');
    Route::delete('/personas/{cod_persona}', [PersonasController::class, 'destroy'])->name('personas.destroy');
        
});

//Rutas del modulo telefonos

Route::middleware('auth')->group(function () {
    Route::get('/telefonos', [TelefonosController::class, 'index']);
    Route::get('/telefonos/{cod_telefono}/detalle',[TelefonosController::class,'show'])->name('telefonos.show');
    Route::get('/telefonos/create', [TelefonosController::class, 'create'])->name('telefonos.create');
    Route::post('/telefonos', [TelefonosController::class, 'store'])->name('telefonos.store');
    Route::get('/telefonos/{cod_telefono}/edit', [TelefonosController::class, 'edit'])->name('telefonos.edit');
    Route::put('/telefonos/{cod_telefono}', [TelefonosController::class, 'update'])->name('telefonos.update');
    Route::delete('/telefonos/{cod_telefono}', [TelefonosController::class, 'destroy'])->name('telefonos.destroy');
        
});

//Ruta de modulo usuarios

Route::middleware('auth')->group(function () {
    Route::get('/usuarios', [UsuariosController::class, 'index']);
    Route::get('/usuarios/{cod_usuario}/detalle',[UsuariosController::class,'show'])->name('usuarios.show');
    Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{cod_usuario}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{cod_usuario}', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{cod_usuario}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');
        
});

//ruta empleados

Route::middleware('auth')->group(function () {
    Route::get('/empleados', [EmpleadosController::class, 'index']);
    Route::get('/empleados/{cod_empleado}/detalle',[EmpleadosController::class,'show'])->name('empleados.show');
    Route::get('/empleados/create', [EmpleadosController::class, 'create'])->name('empleados.create');
    Route::post('/empleados', [EmpleadosController::class, 'store'])->name('empleados.store');
    Route::get('/empleados/{cod_empleado}/edit', [EmpleadosController::class, 'edit'])->name('empleados.edit');
    Route::put('/empleados/{cod_empleado}', [EmpleadosController::class, 'update'])->name('empleados.update');
    Route::delete('/empleados/{cod_empleado}', [EmpleadosController::class, 'destroy'])->name('empleados.destroy');
        
});

//ruta correos
Route::middleware('auth')->group(function () {
    Route::get('/correos', [CorreosController::class, 'index']);
    Route::get('/correos/{cod_correo}/detalle',[CorreosController::class,'show'])->name('correos.show');
    Route::get('/correos/create', [CorreosController::class, 'create'])->name('correos.create');
    Route::post('/correos', [CorreosController::class, 'store'])->name('correos.store');
    Route::get('/correos/{cod_correo}/edit', [CorreosController::class, 'edit'])->name('correos.edit');
    Route::put('/correos/{cod_correo}', [CorreosController::class, 'update'])->name('correos.update');
    Route::delete('/correos/{cod_correo}', [CorreosController::class, 'destroy'])->name('correos.destroy');
        
});

//ruta PROVEEDORES
Route::middleware('auth')->group(function () {
    Route::get('/proveedores', [ProveedoresController::class, 'index']);
    Route::get('/proveedores/{cod_proveedor}/detalle',[ProveedoresController::class,'show'])->name('proveedores.show');
    Route::get('/proveedores/create', [ProveedoresController::class, 'create'])->name('proveedores.create');
    Route::post('/proveedores', [ProveedoresController::class, 'store'])->name('proveedores.store');
    Route::get('/proveedores/{cod_proveedor}/edit', [ProveedoresController::class, 'edit'])->name('proveedores.edit');
    Route::put('/proveedores/{cod_proveedor}', [ProveedoresController::class, 'update'])->name('proveedores.update');
    Route::delete('/proveedores/{cod_proveedor}', [ProveedoresController::class, 'destroy'])->name('proveedores.destroy');
        
});


//rutas clientes
Route::middleware('auth')->group(function () {
    Route::get('/clientes', [ClientesController::class, 'index']);
    Route::get('/clientes/{cod_cliente}/detalle',[ClientesController::class,'show'])->name('clientes.show');
    Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClientesController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{cod_cliente}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{cod_cliente}', [ClientesController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{cod_cliente}', [ClientesController::class, 'destroy'])->name('clientes.destroy');
        
});

// rutas acreedores

Route::middleware('auth')->group(function () {
    Route::get('/acreedores', [AcreedoresController::class, 'index']);
    Route::get('/acreedores/{cod_acreedor}/detalle',[AcreedoresController::class,'show'])->name('acreedores.show');
    Route::get('/acreedores/create', [AcreedoresController::class, 'create'])->name('acreedores.create');
    Route::post('/acreedores', [AcreedoresController::class, 'store'])->name('acreedores.store');
    Route::get('/acreedores/{cod_acreedor}/edit', [AcreedoresController::class, 'edit'])->name('acreedores.edit');
    Route::put('/acreedores/{cod_acreedor}', [AcreedoresController::class, 'update'])->name('acreedores.update');
    Route::delete('/acreedores/{cod_acreedor}', [AcreedoresController::class, 'destroy'])->name('acreedores.destroy');
        
});

Route::middleware('auth')->group(function () {
    Route::get('/direcciones', [DireccionesController::class, 'index']);
    Route::get('/direcciones/{cod_direccion}/detalle',[DireccionesController::class,'show'])->name('direcciones.show');
    Route::get('/direcciones/create', [DireccionesController::class, 'create'])->name('direcciones.create');
    Route::post('/direcciones', [DireccionesController::class, 'store'])->name('direcciones.store');
    Route::get('/direcciones/{cod_direccion}/edit', [DireccionesController::class, 'edit'])->name('direcciones.edit');
    Route::put('/direcciones/{cod_direccion}', [DireccionesController::class, 'update'])->name('direcciones.update');
    Route::delete('/direcciones/{cod_direccion}', [DireccionesController::class, 'destroy'])->name('direcciones.destroy');
        
});

Route::middleware('auth')->group(function () {
    Route::get('/sucursal', [SucursalController::class, 'index']);
    Route::get('/sucursal/{cod_sucursal}/detalle',[SucursalController::class,'show'])->name('sucursal.show');
    Route::get('/sucursal/create', [SucursalController::class, 'create'])->name('sucursal.create');
    Route::post('/sucursal', [SucursalController::class, 'store'])->name('sucursal.store');
    Route::get('/sucursal/{cod_sucursal}/edit', [SucursalController::class, 'edit'])->name('sucursal.edit');
    Route::put('/sucursal/{cod_sucursal}', [SucursalController::class, 'update'])->name('sucursal.update');
    Route::delete('/sucursal/{cod_sucursal}', [SucursalController::class, 'destroy'])->name('sucursal.destroy');
        
});

Route::middleware('auth')->group(function () {
    Route::get('/telefono', [TelefonoController::class, 'index']);
    Route::get('/telefono/{cod_telefono}/detalle',[TelefonoController::class,'show'])->name('telefono.show');
    Route::get('/telefono/create', [TelefonoController::class, 'create'])->name('telefono.create');
    Route::post('/telefono', [TelefonoController::class, 'store'])->name('telefono.store');
    Route::get('/telefono/{cod_telefono}/edit', [TelefonoController::class, 'edit'])->name('telefono.edit');
    Route::put('/telefono/{cod_telefono}', [TelefonoController::class, 'update'])->name('telefono.update');
    Route::delete('/telefono/{cod_telefono}', [TelefonoController::class, 'destroy'])->name('telefono.destroy');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/direccion', [DireccionController::class, 'index']);
    Route::get('/direccion/{cod_direccion}/detalle',[DireccionController::class,'show'])->name('direccion.show');
    Route::get('/direccion/create', [DireccionController::class, 'create'])->name('direccion.create');
    Route::post('/direccion', [DireccionController::class, 'store'])->name('direccion.store');
    Route::get('/direccion/{cod_direccion}/edit', [DireccionController::class, 'edit'])->name('direccion.edit');
    Route::put('/direccion/{cod_direccion}', [DireccionController::class, 'update'])->name('direccion.update');
    Route::delete('/direccion/{cod_direccion}', [DireccionController::class, 'destroy'])->name('direccion.destroy');
        
});

//ruta de selecciona productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
// llamdo de producto con parametro
Route::get('/DetalleProductos/{cod_producto}', [ProductoController::class, 'ShowProducto']);
//Formulario para crear producto
Route::get('/crearForm', [ProductoController::class, 'CreateProducto']);
//Insertar Productos
Route::post('/guardar-producto', [ProductoController::class, 'guardarProducto'])->name('guardar.producto');
//Actualizar producto
// Mostrar formulario de actualización
Route::get('/UpdateForm/{cod_producto}', [ProductoController::class, 'UpdateForm'])->name('producto.update.form');
// Procesar la actualización del producto
Route::put('/producto/{cod_producto}', [ProductoController::class, 'updateProducto'])->name('producto.update');
// Procesar Eliminar  producto
Route::delete('/EliminarProducto/{cod_producto}', [ProductoController::class, 'eliminarProducto'])->name('eliminar.producto'); 


//RUTAS DE MARCA
//ruta de seleccionar Marcas
Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');
//Formulario para crear Marca
Route::get('/crearFormM', [MarcaController::class, 'CreateMarca']);
//Insertar marca
Route::post('/guardar-marca', [MarcaController::class, 'guardarMarca'])->name('guardar.marca');
//Actualizar Marca
// Mostrar formulario de actualización
Route::get('/UpdateFormM/{cod_marca}', [MarcaController::class, 'UpdateForm'])->name('marca.update.form');
// Procesar la actualización de la Marca
Route::put('/marca/{cod_marca}', [MarcaController::class, 'updateMarca'])->name('marca.update');
// Procesar Eliminar    Marca
Route::delete('/EliminarMarca/{cod_marca}', [MarcaController::class, 'eliminarMarca'])->name('eliminar.marca'); 

//RUTAS CATEGORIA
//ruta de seleccionar Categoria
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categoria.index');
//Formulario para crear Categoria
Route::get('/crearFormC', [CategoriaController::class, 'CreateCategoria']);
//Insertar Categoria
Route::post('/guardar-categoria', [CategoriaController::class, 'guardarCategoria'])->name('guardar.categoria');
//Actualizar Categoria
// Mostrar formulario de actualización
Route::get('/UpdateFormC/{cod_categoria}', [CategoriaController::class, 'UpdateForm'])->name('categoria.update.form');
// Procesar la actualización de la Categoria
Route::put('/categoria/{cod_categoria}', [CategoriaController::class, 'updateCategoria'])->name('categoria.update');
// Procesar Eliminar  categoria
Route::delete('/EliminarCategoria/{cod_categoria}', [CategoriaController::class, 'eliminarCategoria'])->name('eliminar.categoria'); 


//RUTAS UNIDAD
//ruta de seleccionar unidades
Route::get('/unidades', [UnidadController::class, 'index'])->name('unidad.index');
//Formulario para crear unidades
Route::get('/crearFormU', [UnidadController::class, 'CreateUnidad']);
//Insertar Unidad
Route::post('/guardar-Unidad', [UnidadController::class, 'guardarUnidad'])->name('guardar.unidad');
//Actualizar Unidad
// Mostrar formulario de actualización
Route::get('/UpdateFormU/{cod_unidad}', [UnidadController::class, 'UpdateForm'])->name('unidad.update.form');
// Procesar la actualización de la unidad
Route::put('/unidad/{cod_unidad}', [UnidadController::class, 'updateUnidad'])->name('unidad.update');
// Procesar Eliminar  unidad
Route::delete('/EliminarUnidad/{cod_unidad}', [UnidadController::class, 'eliminarUnidad'])->name('eliminar.unidad'); 

//RUTAS VENTA
//ruta de seleccionar Venta
Route::get('/ventas', [VentaController::class, 'index'])->name('venta.index');
//Formulario para crear Venta
Route::get('/crearFormVe', [VentaController::class, 'CreateVenta']);
//Insertar Venta
Route::post('/guardar-Venta', [VentaController::class, 'guardarVenta'])->name('guardar.venta');
//Actualizar VENTA
// Mostrar formulario de actualización
Route::get('/UpdateFormVe/{cod_venta}', [VentaController::class, 'UpdateForm'])->name('venta.update.form');
// Procesar la actualización de la Venta
Route::put('/venta/{cod_venta}', [VentaController::class, 'updateVenta'])->name('venta.update');
// Procesar Eliminar  Venta
Route::delete('/EliminarVenta/{cod_venta}', [VentaController::class, 'eliminarVenta'])->name('eliminar.venta'); 

// RUTAS VENDEDOR ***************************************************

// Ruta de seleccionar vendedores
Route::get('/vendedor', [VendedorController::class, 'index'])->name('vendedor.index');

// Formulario para crear vendedores
Route::get('/crearFormVen', [VendedorController::class, 'CreateVendedor']);

// Insertar Vendedor
Route::post('/guardar-Vendedor', [VendedorController::class, 'guardarVendedor'])->name('guardar.vendedor');

// Actualizar Vendedor
// Mostrar formulario de actualización
Route::get('/UpdateFormVen/{cod_vendedor}', [VendedorController::class, 'UpdateForm'])->name('vendedor.update.form');

// Procesar la actualización del vendedor
Route::put('/vendedor/{cod_vendedor}', [VendedorController::class, 'updateVendedor'])->name('vendedor.update');

// Procesar Eliminar vendedor
Route::delete('/EliminarVendedor/{cod_vendedor}', [VendedorController::class, 'eliminarVendedor'])->name('eliminar.vendedor');


// RUTAS TELEFONO
// Ruta para seleccionar telefonos
Route::get('/telefonoVenta', [TelefonoVentasController::class, 'index'])->name('telefono.index');

// Formulario para crear telefonos
Route::get('/crearFormTel', [TelefonoVentasController::class, 'CreateTelefono']);

// Insertar Telefono
Route::post('/guardar-Telefono', [TelefonoVentasController::class, 'guardarTelefono'])->name('guardar.telefono');

// Actualizar Telefono
// Mostrar formulario de actualización
Route::get('/UpdateFormTel/{cod_telefono}', [TelefonoVentasController::class, 'UpdateForm'])->name('telefono.update.form');

// Procesar la actualización del telefono
Route::put('/telefono/{cod_telefono}', [TelefonoVentasController::class, 'updateTelefono'])->name('telefono.update');

// Procesar Eliminar Telefono
Route::delete('/EliminarTelefono/{cod_telefono}', [TelefonoVentasController::class, 'eliminarTelefono'])->name('eliminar.telefono');


// RUTAS METODO DE PAGO
// Ruta para seleccionar metodos de pago
Route::get('/metodoPagos', [MetodoPagoController::class, 'index'])->name('metodoPago.index');

// Formulario para crear metodos de pago
Route::get('/crearFormMP', [MetodoPagoController::class, 'CreateMetodoPago']);

// Insertar Metodo de Pago
Route::post('/guardar-MetodoPago', [MetodoPagoController::class, 'guardarMetodoPago'])->name('guardar.metodoPago');

// Actualizar Metodo de Pago
// Mostrar formulario de actualización
Route::get('/UpdateFormMP/{cod_met_pago}', [MetodoPagoController::class, 'UpdateForm'])->name('metodopago.update.form');

// Procesar la actualización del metodo de pago
Route::put('/metodopago/{cod_met_pago}', [MetodoPagoController::class, 'updateMetodoPago'])->name('metodopago.update');

// Procesar Eliminar Metodo de Pago
Route::delete('/EliminarMetodoPago/{cod_met_pago}', [MetodoPagoController::class, 'eliminarMetodoPago'])->name('eliminar.metodopago');


// RUTAS DETALLE DE VENTA

// Ruta para seleccionar detalles de venta
Route::get('/detalleVentas', [DetalleVentaController::class, 'index'])->name('detalleventa.index');

// Formulario para crear detalles de venta
Route::get('/crearFormDV', [DetalleVentaController::class, 'CreateDetalleVenta']);

// Insertar Detalle de Venta
Route::post('/guardar-DetalleVenta', [DetalleVentaController::class, 'guardarDetalleVenta'])->name('guardar.detalleventa');

// Actualizar Detalle de Venta
// Mostrar formulario de actualización
Route::get('/UpdateFormDV/{cod_det_venta}', [DetalleVentaController::class, 'UpdateForm'])->name('detalleventa.update.form');

// Procesar la actualización del detalle de venta
Route::put('/detalleventa/{cod_det_venta}', [DetalleVentaController::class, 'updateDetalleVenta'])->name('detalleventa.update');

// Procesar Eliminar Detalle de Venta
Route::delete('/EliminarDetalleVenta/{cod_det_venta}', [DetalleVentaController::class, 'eliminarDetalleVenta'])->name('eliminar.detalleventa');


// RUTAS CLIENTE
// Ruta para seleccionar clientes
Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');

// Formulario para crear clientes
Route::get('/crearFormCli', [ClienteController::class, 'CreateCliente']);

// Insertar Cliente
Route::post('/guardar-Cliente', [ClienteController::class, 'guardarCliente'])->name('guardar.cliente');

// Actualizar Cliente
// Mostrar formulario de actualización
Route::get('/UpdateFormCli/{cod_cliente}', [ClienteController::class, 'UpdateForm'])->name('cliente.update.form');

// Procesar la actualización del cliente
Route::put('/cliente/{cod_cliente}', [ClienteController::class, 'updateCliente'])->name('cliente.update');

// Procesar Eliminar Cliente
Route::delete('/EliminarCliente/{cod_cliente}', [ClienteController::class, 'eliminarCliente'])->name('eliminar.cliente');

//Citas
//ruta de selecciona citas
Route::get('/ci_cita', [CitaController::class, 'index'])->name('citas.index');
// llamdo de cita con parametro
Route::get('/DetalleCitas/{cod_cita}', [CitaController::class, 'ShowCita']);
//Formulario para crear cita
Route::get('/crearForm', [CitaController::class, 'createcita']);
//Insertar Citas
Route::post('/citasins', [CitaController::class, 'guardarCita'])->name('guardar.cita');
//Actualizar cita
// Mostrar formulario de actualización
Route::get('/UpdateForm/{cod_cita}', [CitaController::class, 'UpdateForm'])->name('cita.update.form');
// Procesar la actualización de la cita
Route::put('/cita/{cod_cita}', [CitaController::class, 'updateCita'])->name('cita.update');
// Procesar Eliminar cita
Route::delete('/EliminarCita/{cod_cita}', [CitaController::class, 'eliminarCita'])->name('eliminar.cita'); 

//Pagos
//ruta de selecciona pagos
Route::get('/ci_pago', [PagoController::class, 'index'])->name('pagos.index');
// llamdo de pago con parametro
Route::get('/DetallePagos/{cod_pago}', [PagoController::class, 'ShowPago']);
//Formulario para crear pago
Route::get('/crearFormPa', [PagoController::class, 'createpago']);
//Insertar Pagos
Route::post('/pagosins', [PagoController::class, 'guardarPago'])->name('guardar.pago');
//Actualizar pago
// Mostrar formulario de actualización
Route::get('/UpdateFormPa/{cod_pago}', [PagoController::class, 'UpdateFormPa'])->name('pago.update.form');
// Procesar la actualización del pago
Route::put('/pago/{cod_pago}', [PagoController::class, 'updatePago'])->name('pago.update');
// Procesar Eliminar pago
Route::delete('/EliminarPago/{cod_pago}', [PagoController::class, 'eliminarPago'])->name('eliminar.pago'); 

//Servicio
//ruta de selecciona servicio
Route::get('/ci_servicio', [ServicioController::class, 'index'])->name('servicios.index');
// llamdo de servicio con parametro
Route::get('/DetalleServicios/{cod_servicio}', [ServicioController::class, 'ShowServicio']);
//Formulario para crear servicio
Route::get('/crearFormSe', [ServicioController::class, 'createservicio']);
//Insertar Servicio
Route::post('/serviciosins', [ServicioController::class, 'guardarServicio'])->name('guardar.servicio');
//Actualizar servicio
// Mostrar formulario de actualización
Route::get('/UpdateFormSe/{cod_servicio}', [ServicioController::class, 'UpdateFormSe'])->name('servicio.update.form');
// Procesar la actualización del servicio
Route::put('/servicio/{cod_servicio}', [ServicioController::class, 'updateServicio'])->name('servicio.update');
// Procesar Eliminar servicio
Route::delete('/EliminarServicio/{cod_servicio}', [ServicioController::class, 'eliminarServicio'])->name('eliminar.servicio'); 

Route::get('/', function () {
    return view('Paginas.publicidad');
});


//ruta de selecciona Publicidad
Route::get('/publicidad', [PublicidadController::class, 'index'])->name('publicidad.index');
//Formulario para crear publicidad
Route::get('/crearFormPU', [PublicidadController::class, 'CrearPublicidad']);
//Insertar Productos
Route::post('/guardar-publicidad', [PublicidadController::class, 'guardarPublicidad'])->name('guardar.publicidad');
// Mostrar formulario de actualización
Route::get('/UpdateFormPU/{cod_publicidad}', [PublicidadController::class, 'UpdateForm'])->name('publicidad.update.form');
// Procesar la actualización del producto
Route::put('/publicidad/{cod_publicidad}', [PublicidadController::class, 'updatePublicidad'])->name('publicidad.update');
// Procesar Eliminar  producto
Route::delete('/EliminarPublicidad/{cod_publicidad}', [PublicidadController::class, 'eliminarPublicidad'])->name('eliminar.publicidad'); 



//ruta de selecciona Publicidad
Route::get('/promocion', [PromocionController::class, 'index'])->name('promocion.index');
//Formulario para crear publicidad
Route::get('/crearFormPR', [PromocionController::class, 'CrearPromocion']);
//Insertar Productos
Route::post('/guardar-promocion', [PromocionController::class, 'guardarPromocion'])->name('guardar.promocion');
//Mostrar formulario de actualización
Route::get('/UpdateFormPR/{cod_promocion}', [PromocionController::class, 'UpdateForm'])->name('promocion.update.form');
// Procesar la actualización del producto
Route::put('/promocion/{cod_promocion}', [PromocionController::class, 'updatePromocion'])->name('promocion.update');
// Procesar Eliminar  producto
Route::delete('/EliminarPromocion/{cod_promocion}', [PromocionController::class, 'EliminarPromocion'])->name('eliminar.promocion'); 

require __DIR__.'/auth.php';