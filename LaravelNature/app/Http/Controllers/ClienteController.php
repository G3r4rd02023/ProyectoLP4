<?php

namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

 // Define la URL base de la API como una propiedad de instancia
 private $serverapi = 'http://localhost:3000';

 /**
  * Muestra una lista de productos obtenidas de la API.
  *
  * @return \Illuminate\Http\Response
  */

    // SELECCIONAR CLIENTES
public function index()
{
    $response = Http::get("$this->serverapi/ve_clientes");

    if ($response->successful()) {
        // Decodificar la respuesta JSON
        $result = $response->json();

        // Pasar directamente el resultado a la vista
        return view('Paginas.Cliente.SelectCliente')->with('ResulCliente', $result);
    } else {
        // Manejar errores de manera específica si es necesario
        return response()->json(['error' => 'No se encontró ningún cliente'], $response->status());
    }
}

// INSERTAR CLIENTE
public function CreateCliente()
{
    // Mostrar el formulario para ingresar los datos del cliente
    return view('Paginas.Cliente.CreateCliente');
}

// GUARDAR CLIENTE
public function guardarCliente(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'COD_VENTA' => 'required',
        'NOM_CLIENTE' => 'required',
        'NOM_APELLIDO' => 'required',
        'CORREO' => 'required',
        // Agrega otras reglas de validación según necesidades
    ]);

    // Obtener los datos del formulario
    $datosCliente = $request->only([
        'COD_VENTA',
        'NOM_CLIENTE',
        'NOM_APELLIDO',
        'CORREO',
        // Ajusta los nombres de los campos según API
    ]);

    // Realizar la solicitud HTTP POST con los datos del formulario
    $response = Http::post("$this->serverapi/ve_clienteI", $datosCliente);

    if ($response->successful()) {
        return redirect()->route('cliente.index')->with('success', 'Cliente creado exitosamente');
    } else {
        // Manejar errores de manera específica si es necesario
        $error_message = $response->json()['error'] ?? 'Error al crear el Cliente';
        return redirect()->route('cliente.index')->with('error', $error_message);
    }
}

// ACTUALIZAR CLIENTE
public function UpdateForm($cod_cliente)
{
    // Simplemente pasa el código a la vista
    return view('Paginas.Cliente.UpdateCliente', ['cod_cliente' => $cod_cliente]);
}

// ACTUALIZAR CLIENTE
public function updateCliente(Request $request, $cod_cliente)
{
    // Validar que $cod_cliente sea un número antes de realizar la actualización
    if (!is_numeric($cod_cliente)) {
        return redirect()->back()->with('error', 'El parámetro cod_cliente debe ser un número válido');
    }

    try {
        // Lógica para preparar los datos y la solicitud HTTP aquí
        $data = [
            'COD_VENTA' => $request->input('COD_VENTA'),
            'NOM_CLIENTE' => $request->input('NOM_CLIENTE'),
            'NOM_APELLIDO' => $request->input('NOM_APELLIDO'),
            'CORREO' => $request->input('CORREO'),
            // ... Agrega más campos según sea necesario
        ];

        // Realizar la solicitud HTTP a tu API
        $response = Http::put("$this->serverapi/ve_clienteU/{$cod_cliente}", $data);

        // Verificar el código de estado de la respuesta
        if ($response->successful()) {
            // Puedes realizar acciones adicionales si es necesario
            return redirect()->back()->with('success', 'Cliente actualizado con éxito');
        } else {
            // Manejar error en la respuesta
            $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
            return redirect()->back()->with('error', $errorMessage);
        }

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error interno del servidor al actualizar el cliente');
    }
}

// ELIMINAR CLIENTE
public function eliminarCliente($cod_cliente)
{
    // Validar que $cod_cliente sea un número antes de realizar la consulta
    if (!is_numeric($cod_cliente)) {
        // Puedes personalizar el mensaje de error según tus necesidades
        return redirect()->route('Paginas.Producto.flash')->with('error', 'El parámetro cod_cliente debe ser un número válido');
    }

    // Realizar la solicitud HTTP a tu API
    $response = Http::delete("$this->serverapi/ve_clienteD/{$cod_cliente}");

    // Verificar el código de estado de la respuesta
    if ($response->successful()) {
        // Cliente eliminado exitosamente, redirige a la vista de mensaje flash
        return redirect()->route('Paginas.Producto.flash')->with('success', 'Cliente eliminado exitosamente');
    } else {
        // Manejar error en la respuesta de la API
        $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
        return view('Paginas.flash')->with('error', $errorMessage);
    }
}

}//FIN CONTROLADOR CLIENTE
