<?php

namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    // Define la URL base de la API como una propiedad de instancia
    private $serverapi = 'http://localhost:3000';

    /**
     * Muestra una lista de productos obtenidas de la API.
     *
     * @return \Illuminate\Http\Response
     */

        // SELECCIONAR METODOS DE PAGO
public function index()
{
    $response = Http::get("$this->serverapi/ve_metodoPagos");

    if ($response->successful()) {
        // Decodificar la respuesta JSON
        $result = $response->json();

        // Pasar directamente el resultado a la vista
        return view('Paginas.MetodoPago.SelectMetodoPago')->with('ResulMetodoPago', $result);
    } else {
        // Manejar errores de manera específica si es necesario
        return response()->json(['error' => 'No se encontró ningún metodoPago'], $response->status());
    }
}

// INSERTAR METODOPAGO
public function CreateMetodoPago()
{
    // Mostrar el formulario para ingresar los datos del metodoPago
    return view('Paginas.MetodoPago.CreateMetodoPago');
}

// GUARDAR METODOPAGO
public function guardarMetodoPago(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'COD_VENTA' => 'required',
        'NOM_PAGO' => 'required',
        'DET_DETALLE_PAGO' => 'required',
        'DES_PAGO' => 'required',
        // Agrega otras reglas de validación según necesidades
    ]);

    // Obtener los datos del formulario
    $datosMetodoPago = $request->only([
        'COD_VENTA',
        'NOM_PAGO',
        'DET_DETALLE_PAGO',
        'DES_PAGO',
        // Ajusta los nombres de los campos según API
    ]);

    // Realizar la solicitud HTTP POST con los datos del formulario
    $response = Http::post("$this->serverapi/ve_metodoPagoI", $datosMetodoPago);

    if ($response->successful()) {
        return redirect()->route('metodoPago.index')->with('success', 'MetodoPago creado exitosamente');
    } else {
        // Manejar errores de manera específica si es necesario
        $error_message = $response->json()['error'] ?? 'Error al crear el MetodoPago';
        return redirect()->route('metodoPago.index')->with('error', $error_message);
    }
}

// ACTUALIZAR METODOPAGO
public function UpdateForm($cod_met_pago)
{
    // Simplemente pasa el código a la vista
    return view('Paginas.MetodoPago.UpdateMetodoPago', ['cod_met_pago' => $cod_met_pago]);
}

// ACTUALIZAR METODOPAGO
public function updateMetodoPago(Request $request, $cod_met_pago)
{
    // Validar que $cod_metodoPago sea un número antes de realizar la actualización
    if (!is_numeric($cod_met_pago)) {
        return redirect()->back()->with('error', 'El parámetro cod_metodoPago debe ser un número válido');
    }

    try {
        // Lógica para preparar los datos y la solicitud HTTP aquí
        $data = [
            'COD_VENTA' => $request->input('COD_VENTA'),
            'NOM_PAGO' => $request->input('NOM_PAGO'),
            'DET_DETALLE_PAGO' => $request->input('DET_DETALLE_PAGO'),
            'DES_PAGO' => $request->input('DES_PAGO'),
            // ... Agrega más campos según sea necesario
        ];

        // Realizar la solicitud HTTP a tu API
        $response = Http::put("$this->serverapi/ve_metodoPagoU/{$cod_met_pago}", $data);

        // Verificar el código de estado de la respuesta
        if ($response->successful()) {
            // Puedes realizar acciones adicionales si es necesario
            return redirect()->back()->with('success', 'MetodoPago actualizado con éxito');
        } else {
            // Manejar error en la respuesta
            $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
            return redirect()->back()->with('error', $errorMessage);
        }

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error interno del servidor al actualizar el metodoPago');
    }
}

// ELIMINAR METODOPAGO
public function eliminarMetodoPago($cod_met_pago)
{
    // Validar que $cod_metodoPago sea un número antes de realizar la consulta
    if (!is_numeric($cod_met_pago)) {
        // Puedes personalizar el mensaje de error según tus necesidades
        return redirect()->route('Paginas.Producto.flash')->with('error', 'El parámetro cod_metodoPago debe ser un número válido');
    }

    // Realizar la solicitud HTTP a tu API
    $response = Http::delete("$this->serverapi/ve_metodoPagoD/{$cod_met_pago}");

    // Verificar el código de estado de la respuesta
    if ($response->successful()) {
        // MetodoPago eliminado exitosamente, redirige a la vista de mensaje flash
        return redirect()->route('Paginas.Producto.flash')->with('success', 'MetodoPago eliminado exitosamente');
    } else {
        // Manejar error en la respuesta de la API
        $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
        return view('Paginas.flash')->with('error', $errorMessage);
    }
}



}//fin metodo pago