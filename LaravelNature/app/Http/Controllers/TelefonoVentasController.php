<?php

namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TelefonoVentasController extends Controller
{
    // Define la URL base de la API como una propiedad de instancia
    private $serverapi = 'http://localhost:3000';

    /**
     * Muestra una lista de productos obtenidas de la API.
     *
     * @return \Illuminate\Http\Response
     */


// SELECCIONAR TELEFONOS
public function index()
{
    $response = Http::get("$this->serverapi/ve_telefonos");

    if ($response->successful()) {
        // Decodificar la respuesta JSON
        $result = $response->json();

        // Pasar directamente el resultado a la vista
        return view('Paginas.Telefono.SelectTelefono')->with('ResulTelefono', $result);
    } else {
        // Manejar errores de manera específica si es necesario
        return response()->json(['error' => 'No se encontró ningún teléfono'], $response->status());
    }
}

// INSERTAR TELEFONO
public function CreateTelefono()
{
    // Mostrar el formulario para ingresar los datos del teléfono
    return view('Paginas.Telefono.CreateTelefono');
}


// GUARDAR TELEFONO
public function guardarTelefono(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'COD_CLIENTE' => 'required',
        'NUM_TELEFONO' => 'required',
        'TIP_TELEFONO' => 'required',
        // Agrega otras reglas de validación según necesidades
    ]);

    // Obtener los datos del formulario
    $datosTelefono = $request->only([
        'COD_CLIENTE',
        'NUM_TELEFONO',
        'TIP_TELEFONO',
        // Ajusta los nombres de los campos según API
    ]);

    // Realizar la solicitud HTTP POST con los datos del formulario
    $response = Http::post("$this->serverapi/ve_telefonoI", $datosTelefono);

    if ($response->successful()) {
        return redirect()->route('telefono.index')->with('success', 'Telefono creado exitosamente');
    } else {
        // Manejar errores de manera específica si es necesario
        $error_message = $response->json()['error'] ?? 'Error al crear el Telefono';
        return redirect()->route('telefono.index')->with('error', $error_message);
    }
}


// ACTUALIZAR TELEFONO
public function UpdateForm($cod_telefono)
{
    // Simplemente pasa el código a la vista
    return view('Paginas.Telefono.UpdateTelefono', ['cod_telefono' => $cod_telefono]);
}

// ACTUALIZAR TELEFONO
public function updateTelefono(Request $request, $cod_telefono)
{
    // Validar que $cod_telefono sea un número antes de realizar la actualización
    if (!is_numeric($cod_telefono)) {
        return redirect()->back()->with('error', 'El parámetro cod_telefono debe ser un número válido');
    }

    try {
        // Lógica para preparar los datos y la solicitud HTTP aquí
        $data = [
            'COD_CLIENTE' => $request->input('COD_CLIENTE'),
            'NUM_TELEFONO' => $request->input('NUM_TELEFONO'),
            'TIP_TELEFONO' => $request->input('TIP_TELEFONO'),
            // ... Agrega más campos según sea necesario
        ];

         // Realizar la solicitud HTTP a tu API
         $response = Http::put("$this->serverapi/ve_telefonoU/{$cod_telefono}", $data);

         // Verificar el código de estado de la respuesta
         if ($response->successful()) {
             // Puedes realizar acciones adicionales si es necesario
             return redirect()->back()->with('success', 'Telefono actualizado con éxito');
         } else {
             // Manejar error en la respuesta
             $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
             return redirect()->back()->with('error', $errorMessage);
         }

     } catch (\Exception $e) {
         return redirect()->back()->with('error', 'Error interno del servidor al actualizar el telefono');
     }
}

// ELIMINAR TELEFONO
public function eliminarTelefono($cod_telefono)
{
    // Validar que $cod_telefono sea un número antes de realizar la consulta
    if (!is_numeric($cod_telefono)) {
        // Puedes personalizar el mensaje de error según tus necesidades
        return redirect()->route('Paginas.Producto.flash')->with('error', 'El parámetro cod_telefono debe ser un número válido');
    }

    // Realizar la solicitud HTTP a tu API
    $response = Http::delete("$this->serverapi/ve_telefonoD/{$cod_telefono}");

    // Verificar el código de estado de la respuesta
    if ($response->successful()) {
        // Telefono eliminado exitosamente, redirige a la vista de mensaje flash
        return redirect()->route('Paginas.Producto.flash')->with('success', 'Telefono eliminado exitosamente');
    } else {
        // Manejar error en la respuesta de la API
        $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
        return view('Paginas.flash')->with('error', $errorMessage);
    }
}



}//fin controlador telefono