<?php

namespace App\Http\Controllers;

//incluimos Http
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class PromocionController extends Controller
{
    //

    // Define la URL base de la API como una propiedad de instancia
    private $serverapi = 'http://localhost:3000';

    /**
     * Muestra una lista de publicidad obtenidas de la API.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
         $response = Http::get("$this->serverapi/pu_promocion");
     
         if ($response->successful()) {
             // Decodificar la respuesta JSON
             $result = $response->json();
     
             // Pasar directamente el resultado a la vista
             return view('Paginas.SelectPromocion')->with('ResulPromocion', $result);
         } else {
             // Manejar errores de manera específica si es necesario
             return response()->json(['error' => 'No se encontró ningún Promocion'], $response->status());
         }
     }

     public function CrearPromocion()
     {
         // Mostrar el formulario para ingresar los datos del producto
         return view('Paginas.CrearPromocion');
     }
     
     
     public function guardarPromocion(Request $request)
     {
         // Validar los datos del formulario
         $request->validate([

             'COD_PUBLICIDAD' => 'required|numeric',
             'TIP_PROMOCION' => 'required|string|max:100',
             'DET_PROMOCION' => 'required|string|max:500',

             // Agrega otras reglas de validación según tus necesidades
         ]);
     
         // Obtener los datos del formulario
         $datosPromocion = $request->only([

             'COD_PUBLICIDAD',
             'TIP_PROMOCION',
             'DET_PROMOCION',
             
             
             // Ajusta los nombres de los campos según tu API
         ]);
     
     
     // Realizar la solicitud HTTP POST con los datos del formulario
     $response = Http::post("$this->serverapi/pu_promocionI", $datosPromocion);
     
     if ($response->successful()) {
         return redirect()->route('promocion.index')->with('success', 'Promocion Ingresada exitosamente');
     } else {
         // Manejar errores de manera específica si es necesario
         $error_message = $response->json()['error'] ?? 'Error al Ingresar La Promocion';
         return redirect()->route('promocion.index')->with('error', $error_message);
     }
     
     }


     public function  UpdateForm($cod_promocion)
     {
         // No necesitas encontrar el producto aquí, simplemente pasas el código a la vista
         return view('Paginas.UpdatePromocion', ['cod_promocion' => $cod_promocion]);
     }
     
     
     public function updatePromocion(Request $request, $cod_promocion)
         {
             // Validar que $cod_producto sea un número antes de realizar la actualización
             if (!is_numeric($cod_promocion)) {
                 return redirect()->back()->with('error', 'El parámetro cod_promocion debe ser un número válido');
             }
     
             try {
                 // Lógica para preparar los datos y la solicitud HTTP aquí
                 $data = [
                     'COD_PUBLICIDAD' => $request->input('COD_PUBLICIDAD'),
                     'TIP_PROMOCION' => $request->input('TIP_PROMOCION'),
                     'DET_PROMOCION' => $request->input('DET_PROMOCION'),
        
                     // ... Agrega más campos según sea necesario
                 ];
             
                 // Realizar la solicitud HTTP a tu API
                 $response = Http::put("$this->serverapi/pu_promocionU/{$cod_promocion}", $data);
     
                 // Verificar el código de estado de la respuesta
                 if ($response->successful()) {
                     // Puedes realizar acciones adicionales si es necesario
                     return redirect()->back()->with('success', 'Promocion actualizado con éxito');
                     return redirect()->route('promocion.index')->with('success', 'Promocion Ingresada exitosamente');
                 } else {
                     // Manejar error en la respuesta
                     $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
                     return redirect()->back()->with('error', $errorMessage);
                 }
     
             } catch (\Exception $e) {
                 return redirect()->back()->with('error', 'Error interno del servidor al actualizar la Promocion');
             }
         }
     



         public function eliminarPromocion($cod_promocion)
         {
             // Validar que $cod_producto sea un número antes de realizar la consulta
             if (!is_numeric($cod_promocion)) {
                 // Puedes personalizar el mensaje de error según tus necesidades
                 return redirect()->route('Paginas.flashPR')->with('error', 'El parámetro cod_promocion debe ser un número válido');
             }
         
             // Realizar la solicitud HTTP a tu API
             $response = Http::delete("$this->serverapi/pu_promocionD/{$cod_promocion}");
         
             // Verificar el código de estado de la respuesta
             if ($response->successful()) {
                 // Producto eliminado exitosamente, redirige a la vista de mensaje flash
                 return redirect()->route('Paginas.flashPR')->with('success', 'Promocion eliminada exitosamente');
             } else {
                 // Manejar error en la respuesta de la API
                 $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
                 return view('Paginas.flashPR')->with('error', $errorMessage);
         
             }
         }
         

    }



     

