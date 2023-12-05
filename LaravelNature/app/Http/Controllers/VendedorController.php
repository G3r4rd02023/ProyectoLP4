<?php

namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    // Define la URL base de la API como una propiedad de instancia
    private $serverapi = 'http://localhost:3000';

    /**
     * Muestra una lista de productos obtenidas de la API.
     *
     * @return \Illuminate\Http\Response
     */

// SELECCIONAR VENDEDORES
public function index()
{
    $response = Http::get("$this->serverapi/ve_vendedores");

    if ($response->successful()) {
        // Decodificar la respuesta JSON
        $result = $response->json();

        // Pasar directamente el resultado a la vista
        return view('Paginas.Vendedor.SelectVendedor')->with('ResulVendedor', $result);
    } else {
        // Manejar errores de manera específica si es necesario
        return response()->json(['error' => 'No se encontró ningún vendedor'], $response->status());
    }
}


// INSERTAR VENDEDOR
public function CreateVendedor()
{
    // Mostrar el formulario para ingresar los datos del vendedor
    return view('Paginas.Vendedor.CreateVendedor');
}


// GUARDAR VENDEDOR
public function guardarVendedor(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'COD_VENTA' => 'required',
        'NOM_VENDEDOR' => 'required',
        'NOM_APELLIDO' => 'required',
        'CAR_CARGO' => 'required',
        // Agrega otras reglas de validación según necesidades
    ]);

    // Obtener los datos del formulario
    $datosVendedor = $request->only([
        'COD_VENTA',
        'NOM_VENDEDOR',
        'NOM_APELLIDO',
        'CAR_CARGO',
        // Ajusta los nombres de los campos según API
    ]);

    // Realizar la solicitud HTTP POST con los datos del formulario
    $response = Http::post("$this->serverapi/ve_vendedorI", $datosVendedor);

    if ($response->successful()) {
        return redirect()->route('vendedor.index')->with('success', 'Vendedor creado exitosamente');
    } else {
        // Manejar errores de manera específica si es necesario
        $error_message = $response->json()['error'] ?? 'Error al crear el Vendedor';
        return redirect()->route('vendedor.index')->with('error', $error_message);
    }
}


// ACTUALIZAR VENDEDOR
public function UpdateForm($cod_vendedor)
{
    // Simplemente pasa el código a la vista
    return view('Paginas.Vendedor.UpdateVendedor', ['cod_vendedor' => $cod_vendedor]);
}

// ACTUALIZAR VENDEDOR
public function updateVendedor(Request $request, $cod_vendedor)
{
    // Validar que $cod_vendedor sea un número antes de realizar la actualización
    if (!is_numeric($cod_vendedor)) {
        return redirect()->back()->with('error', 'El parámetro cod_vendedor debe ser un número válido');
    }

    try {
        // Lógica para preparar los datos y la solicitud HTTP aquí
        $data = [
            'COD_VENTA' => $request->input('COD_VENTA'),
            'NOM_VENDEDOR' => $request->input('NOM_VENDEDOR'),
            'NOM_APELLIDO' => $request->input('NOM_APELLIDO'),
            'CAR_CARGO' => $request->input('CAR_CARGO'),
            // ... Agrega más campos según sea necesario
        ];

         // Realizar la solicitud HTTP a tu API
         $response = Http::put("$this->serverapi/ve_vendedorU/{$cod_vendedor}", $data);

         // Verificar el código de estado de la respuesta
         if ($response->successful()) {
             // Puedes realizar acciones adicionales si es necesario
             return redirect()->back()->with('success', 'Vendedor actualizado con éxito');
         } else {
             // Manejar error en la respuesta
             $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
             return redirect()->back()->with('error', $errorMessage);
         }

     } catch (\Exception $e) {
         return redirect()->back()->with('error', 'Error interno del servidor al actualizar el vendedor');
     }
}

// ELIMINAR VENDEDOR
public function eliminarVendedor($cod_vendedor)
{
    // Validar que $cod_vendedor sea un número antes de realizar la consulta
    if (!is_numeric($cod_vendedor)) {
        // Puedes personalizar el mensaje de error según tus necesidades
        return redirect()->route('Paginas.Producto.flash')->with('error', 'El parámetro cod_vendedor debe ser un número válido');
    }

    // Realizar la solicitud HTTP a tu API
    $response = Http::delete("$this->serverapi/ve_vendedorD/{$cod_vendedor}");

    // Verificar el código de estado de la respuesta
    if ($response->successful()) {
        // Vendedor eliminado exitosamente, redirige a la vista de mensaje flash
        return redirect()->route('Paginas.Producto.flash')->with('success', 'Vendedor eliminado exitosamente');
    } else {
        // Manejar error en la respuesta de la API
        $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
        return view('Paginas.flash')->with('error', $errorMessage);
    }
}




}//FIN CONTROLADOR VENDEDOR