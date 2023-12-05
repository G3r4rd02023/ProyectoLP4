<?php

namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
     // Define la URL base de la API como una propiedad de instancia
     private $serverapi = 'http://localhost:3000';

     /**
      * Muestra una lista de productos obtenidas de la API.
      *
      * @return \Illuminate\Http\Response
      */
 
 
 
      //SELECCIONAR MARCAS
      public function index()
      {
          $response = Http::get("$this->serverapi/pr_unidades");
      
          if ($response->successful()) {
              // Decodificar la respuesta JSON
              $result = $response->json();
      
              // Pasar directamente el resultado a la vista
              return view('Paginas.Unidad.SelectUnidad')->with('ResulUnidades', $result);
          } else {
              // Manejar errores de manera específica si es necesario
              return response()->json(['error' => 'No se encontró ningúna unidad'], $response->status());
          }
      }//fin seleccionar marca

      //INSERTAR MARCAS
     public function CreateUnidad()
     {
         // Mostrar el formulario para ingresar los datos de la marca
         return view('Paginas.Unidad.CreateUnidad');
     }

     //GUARDAR MARCA
     public function guardarUnidad(Request $request)
    {
    // Validar los datos del formulario
    $request->validate([
        
        'COD_PRODUCTO' => 'required',
        'NOM_UNIDAD' => 'required',
        'SIM_UNIDAD' => 'required',
        'CAN_CANTIDAD' => 'required',      
        // Agrega otras reglas de validación según necesidades
    ]);

    // Obtener los datos del formulario
    $datosUnidad = $request->only([
        'COD_PRODUCTO',
        'NOM_UNIDAD',
        'SIM_UNIDAD',
        'CAN_CANTIDAD',
        // Ajusta los nombres de los campos según API
    ]);

    // Realizar la solicitud HTTP POST con los datos del formulario
    $response = Http::post("$this->serverapi/pr_unidadI", $datosUnidad);

    if ($response->successful()) {
        return redirect()->route('unidad.index')->with('success', 'Unidad creado exitosamente');
    } else {
        // Manejar errores de manera específica si es necesario
        $error_message = $response->json()['error'] ?? 'Error al crear la Marca';
        return redirect()->route('unidad.index')->with('error', $error_message);
    }
    
    }//fin insertar

    //ACTUALIZAR UNIDAD
public function UpdateForm($cod_unidad)
{
    // Simplemente pasa el código a la vista
    return view('Paginas.Unidad.UpdateUnidad', ['cod_unidad' => $cod_unidad]);
}


//GUARDAR ACTUALIZACION
public function updateUnidad(Request $request, $cod_unidad)
    {
        // Validar que $cod_unidad sea un número antes de realizar la actualización
        if (!is_numeric($cod_unidad)) {
            return redirect()->back()->with('error', 'El parámetro cod_unidad debe ser un número válido');
        }

        try {
            // Lógica para preparar los datos y la solicitud HTTP aquí
            $data = [
                'COD_PRODUCTO' => $request->input('COD_PRODUCTO'),
                'NOM_UNIDAD' => $request->input('NOM_UNIDAD'),
                'SIM_UNIDAD' => $request->input('SIM_UNIDAD'),
                'CAN_CANTIDAD' => $request->input('CAN_CANTIDAD'),
                // ... Agrega más campos según sea necesario
            ];

             // Realizar la solicitud HTTP a tu API
             $response = Http::put("$this->serverapi/pr_unidadU/{$cod_unidad}", $data);

             // Verificar el código de estado de la respuesta
             if ($response->successful()) {
                 // Puedes realizar acciones adicionales si es necesario
                 return redirect()->back()->with('success', 'Unidad actualizado con éxito');
             } else {
                 // Manejar error en la respuesta
                 $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
                 return redirect()->back()->with('error', $errorMessage);
             }
 
         } catch (\Exception $e) {
             return redirect()->back()->with('error', 'Error interno del servidor al actualizar la marca');
         }
     }// fin actualizar

     //ELIMINAR MARCA
public function eliminarUnidad($cod_unidad)
{
    // Validar que $cod_punidad sea un número antes de realizar la consulta
    if (!is_numeric($cod_unidad) ){
        // Puedes personalizar el mensaje de error según tus necesidades
        return redirect()->route('Paginas.Producto.flash')->with('error', 'El parámetro cod_unidad debe ser un número válido');
    }

    // Realizar la solicitud HTTP a tu API
    $response = Http::delete("$this->serverapi/pr_unidadD/{$cod_unidad}");

    // Verificar el código de estado de la respuesta
    if ($response->successful()) {
        // Producto eliminado exitosamente, redirige a la vista de mensaje flash
        return redirect()->route('Paginas.Producto.flash')->with('success', 'Marca eliminado exitosamente');
    } else {
        // Manejar error en la respuesta de la API
        $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
        return view('Paginas.flash')->with('error', $errorMessage);

    }
}



}// fin Unidad Controller
