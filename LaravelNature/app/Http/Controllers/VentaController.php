<?php

namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class VentaController extends Controller
{
     // Define la URL base de la API como una propiedad de instancia
     private $serverapi = 'http://localhost:3000';

     /**
      * Muestra una lista de productos obtenidas de la API.
      *
      * @return \Illuminate\Http\Response
      */
 
 
 
      //SELECCIONAR VENTA
      public function index()
      {
          $response = Http::get("$this->serverapi/ve_ventas");
      
          if ($response->successful()) {
              // Decodificar la respuesta JSON
              $result = $response->json();
      
              // Pasar directamente el resultado a la vista
              return view('Paginas.Venta.SelectVenta')->with('ResulVenta', $result);
          } else {
              // Manejar errores de manera específica si es necesario
              return response()->json(['error' => 'No se encontró ningúna venta'], $response->status());
          }
      }
 
    // INSERTAR VENTAS
public function CreateVenta()
{
    // Mostrar el formulario para ingresar los datos de la venta
    return view('Paginas.Venta.CreateVenta');
}

 
 
     // GUARDAR VENTA
     public function guardarVenta(Request $request)
     {
         try {
             // Validar los datos del formulario
             $request->validate([
                 'FEC_AGREGADO' => 'required',
                 'DET_DETALLE_VEN' => 'required',
                 'RTN_IDENTIFICACION' => 'required',
                 'NOM_ENTIDAD' => 'required',
                 // Agrega otras reglas de validación según necesidades
             ]);
     
             // Obtener los datos del formulario
             $datosVenta = $request->only([
                 'FEC_AGREGADO',
                 'DET_DETALLE_VEN',
                 'RTN_IDENTIFICACION',
                 'NOM_ENTIDAD',
                 // Ajusta los nombres de los campos según API
             ]);
     
             // Realizar la solicitud HTTP POST con los datos del formulario
             $response = Http::post("$this->serverapi/ve_ventaI", $datosVenta);
     
             if ($response->successful()) {
                 return redirect()->route('venta.index')->with('success', 'Venta creada exitosamente');
             } else {
                 // Manejar errores de manera específica si es necesario
                 $errorMessage = $response->json()['error'] ?? 'Error al crear la Venta';
                 return redirect()->route('venta.index')->with('error', $errorMessage);
             }
         } catch (\Exception $e) {
             return redirect()->route('venta.index')->with('error', 'Error interno del servidor al crear la Venta');
         }
     }
     

 
 // ACTUALIZAR VENTA
public function UpdateForm($cod_venta)
{
    // Simplemente pasa el código a la vista
    return view('Paginas.Venta.UpdateVenta', ['cod_venta' => $cod_venta]);
}

 
 
 //GUARDAR ACTUALIZACION
 // ACTUALIZAR VENTA
public function updateVenta(Request $request, $cod_venta)
{
    // Validar que $cod_venta sea un número antes de realizar la actualización
    if (!is_numeric($cod_venta)) {
        return redirect()->back()->with('error', 'El parámetro cod_venta debe ser un número válido');
    }

    try {
        // Lógica para preparar los datos y la solicitud HTTP aquí
        $data = [
            'FEC_AGREGADO' => $request->input('FEC_AGREGADO'),
            'DET_DETALLE_VEN' => $request->input('DET_DETALLE_VEN'),
            'RTN_IDENTIFICACION' => $request->input('RTN_IDENTIFICACION'),
            'NOM_ENTIDAD' => $request->input('NOM_ENTIDAD'),
            // ... Agrega más campos según sea necesario
        ];

         // Realizar la solicitud HTTP a tu API
         $response = Http::put("$this->serverapi/ve_ventaU/{$cod_venta}", $data);

         // Verificar el código de estado de la respuesta
         if ($response->successful()) {
             // Puedes realizar acciones adicionales si es necesario
             return redirect()->back()->with('success', 'Venta actualizada con éxito');
         } else {
             // Manejar error en la respuesta
             $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
             return redirect()->back()->with('error', $errorMessage);
         }

     } catch (\Exception $e) {
         return redirect()->back()->with('error', 'Error interno del servidor al actualizar la venta');
     }
}

// ELIMINAR VENTA
public function eliminarVenta($cod_venta)
{
    // Validar que $cod_venta sea un número antes de realizar la consulta
    if (!is_numeric($cod_venta)) {
        // Puedes personalizar el mensaje de error según tus necesidades
        return redirect()->route('Paginas.Producto.flash')->with('error', 'El parámetro cod_venta debe ser un número válido');
    }

    // Realizar la solicitud HTTP a tu API
    $response = Http::delete("$this->serverapi/ve_ventaD/{$cod_venta}");

    // Verificar el código de estado de la respuesta
    if ($response->successful()) {
        // Venta eliminada exitosamente, redirige a la vista de mensaje flash
        return redirect()->route('Paginas.Producto.flash')->with('success', 'Venta eliminada exitosamente');
    } else {
        // Manejar error en la respuesta de la API
        $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
        return view('Paginas.flash')->with('error', $errorMessage);
    }
}

 


}//FIN CONTROLADOR VENTA