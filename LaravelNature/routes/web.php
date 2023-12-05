<?php
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

require __DIR__.'/auth.php';