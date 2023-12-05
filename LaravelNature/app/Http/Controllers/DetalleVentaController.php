<?php

namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    // Define la URL base de la API como una propiedad de instancia
    private $serverapi = 'http://localhost:3000';

    /**
     * Muestra una lista de productos obtenidas de la API.
     *
     * @return \Illuminate\Http\Response
     */

// SELECCIONAR DETALLES DE VENTA
public function index()
{
    $response = Http::get("$this->serverapi/ve_detalleVentas");

    if ($response->successful()) {
        // Decodificar la respuesta JSON
        $result = $response->json();

        // Pasar directamente el resultado a la vista
        return view('Paginas.DetalleVenta.SelectDetalleVenta')->with('ResulDetalleVenta', $result);
    } else {
        // Manejar errores de manera específica si es necesario
        return response()->json(['error' => 'No se encontró ningún detalle de venta'], $response->status());
    }
}

// INSERTAR DETALLE DE VENTA
public function CreateDetalleVenta()
{
    // Mostrar el formulario para ingresar los datos del detalle de venta
    return view('Paginas.DetalleVenta.CreateDetalleVenta');
}

// GUARDAR DETALLE DE VENTA
public function guardarDetalleVenta(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'COD_VENTA' => 'required',
        'COD_PRODUCTO' => 'required',
        'CAN_VENDIDA' => 'required',
        'PRE_UNITARIO' => 'required',
        'SUB_TOTAL' => 'required',
        'DES_VENTA' => 'required',
        'ISV_IMPUESTO' => 'required',
        'TOT_TOTAL_VENTA' => 'required',
        // Agrega otras reglas de validación según necesidades
    ]);

    // Obtener los datos del formulario
    $datosDetalleVenta = $request->only([
        'COD_VENTA',
        'COD_PRODUCTO',
        'CAN_VENDIDA',
        'PRE_UNITARIO',
        'SUB_TOTAL',
        'DES_VENTA' ,
        'ISV_IMPUESTO',
        'TOT_TOTAL_VENTA',
        // Ajusta los nombres de los campos según API
    ]);

    // Realizar la solicitud HTTP POST con los datos del formulario
    $response = Http::post("$this->serverapi/ve_detalleVentaI", $datosDetalleVenta);

    if ($response->successful()) {
        return redirect()->route('detalleventa.index')->with('success', 'Detalle de Venta creado exitosamente');
    } else {
        // Manejar errores de manera específica si es necesario
        $error_message = $response->json()['error'] ?? 'Error al crear el Detalle de Venta';
        return redirect()->route('detalleventa.index')->with('error', $error_message);
    }
}

// ACTUALIZAR DETALLE DE VENTA
public function UpdateForm($cod_det_venta)
{
    // Simplemente pasa el código a la vista
    return view('Paginas.DetalleVenta.UpdateDetalleVenta', ['cod_det_venta' => $cod_det_venta]);
}



public function updateDetalleVenta(Request $request, $cod_det_venta)
{
    // Validar que $cod_det_venta sea un número antes de realizar la actualización
    if (!is_numeric($cod_det_venta)) {
        return redirect()->back()->with('error', 'El parámetro cod_det_venta debe ser un número válido');
    }

    try {
        // Lógica para preparar los datos y la solicitud HTTP aquí
        $data = [
            'COD_VENTA'      => $request->input('COD_VENTA'),
            'COD_PRODUCTO'   => $request->input('COD_PRODUCTO'),
            'CAN_VENDIDA'    => $request->input('CAN_VENDIDA'),
            'PRE_UNITARIO'   => $request->input('PRE_UNITARIO'),
            'SUB_TOTAL'      => $request->input('SUB_TOTAL'),
            'DES_VENTA'      => $request->input('DES_VENTA'),
            'ISV_IMPUESTO'   => $request->input('ISV_IMPUESTO'),
            'TOT_TOTAL_VENTA' => $request->input('TOT_TOTAL_VENTA'),
            // ... Agrega más campos según sea necesario
        ];

        // Realizar la solicitud HTTP a tu API
        $response = Http::put("$this->serverapi/ve_detalleVentaU/{$cod_det_venta}", $data);

        // Verificar el código de estado de la respuesta
        if ($response->successful()) {
            // Puedes realizar acciones adicionales si es necesario
            return redirect()->back()->with('success', 'Detalle de Venta actualizado con éxito');
        } else {
            // Manejar error en la respuesta
            $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
            return redirect()->back()->with('error', $errorMessage);
        }

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error interno del servidor al actualizar el detalle de venta');
    }
}


// ELIMINAR DETALLE DE VENTA
public function eliminarDetalleVenta($cod_det_venta)
{
    // Validar que $cod_detalleventa sea un número antes de realizar la consulta
    if (!is_numeric($cod_det_venta)) {
        // Puedes personalizar el mensaje de error según tus necesidades
        return redirect()->route('Paginas.Producto.flash')->with('error', 'El parámetro cod_detalleventa debe ser un número válido');
    }

    // Realizar la solicitud HTTP a tu API
    $response = Http::delete("$this->serverapi/ve_detalleVentaD/{$cod_det_venta}");

    // Verificar el código de estado de la respuesta
    if ($response->successful()) {
        // Detalle de Venta eliminado exitosamente, redirige a la vista de mensaje flash
        return redirect()->route('Paginas.Producto.flash')->with('success', 'Detalle de Venta eliminado exitosamente');
    } else {
        // Manejar error en la respuesta de la API
        $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
        return view('Paginas.flash')->with('error', $errorMessage);
    }
}




}//fin controlador detalle venta