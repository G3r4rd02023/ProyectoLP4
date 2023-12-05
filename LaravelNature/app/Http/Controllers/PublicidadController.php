<?php

namespace App\Http\Controllers;

//incluimos Http
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class PublicidadController extends Controller
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
         $response = Http::get("$this->serverapi/pu_publicidad");
     
         if ($response->successful()) {
             // Decodificar la respuesta JSON
             $result = $response->json();
     
             // Pasar directamente el resultado a la vista
             return view('Paginas.SelectPublicidad')->with('ResulPublicidad', $result);
         } else {
             // Manejar errores de manera específica si es necesario
             return response()->json(['error' => 'No se encontró ningún Publicidad'], $response->status());
         }
     }

     


//*************************************************** */     
public function CrearPublicidad()
{
    // Mostrar el formulario para ingresar los datos del producto
    return view('Paginas.CrearPublicidad');
}


public function guardarPublicidad(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'FEC_INICIO' => 'required|date',
        'FEC_FINAL' => 'required|date',
        'PUB_DESCRIPCION' => 'required|string|max:250',
        'PUB_RECURSOS' => 'required|string|max:250',
        'PUB_CANALES' => 'required|string|max:250',
        'PUB_COSTO' => 'required|numeric|between:0,9999999.99',
        'OBJ_AUDIENCIA' => 'required|string|max:100',
        'RES_CONTACTO' => 'required|string|max:100',
        'MET_KPIS' => 'required|numeric|between:0,9999999.99',
        'NOT_COMENTARIOS' => 'required|string|max:500',
        'NOM_PUBLICIDAD' => 'required|string|max:50',
        'PUB_RESULTADOS' => 'required|string|max:255',
        // Agrega otras reglas de validación según tus necesidades
    ]);

    // Obtener los datos del formulario
    $datosPublicidad = $request->only([
        'FEC_INICIO',
        'FEC_FINAL',
        'PUB_DESCRIPCION',
        'PUB_RECURSOS',
        'PUB_CANALES',
        'PUB_COSTO',
        'OBJ_AUDIENCIA',
        'RES_CONTACTO',
        'MET_KPIS',
        'NOT_COMENTARIOS',
        'NOM_PUBLICIDAD',
        'PUB_RESULTADOS',
        // Ajusta los nombres de los campos según tu API
    ]);


// Realizar la solicitud HTTP POST con los datos del formulario
$response = Http::post("$this->serverapi/pu_publicidadI", $datosPublicidad);

if ($response->successful()) {
    return redirect()->route('publicidad.index')->with('success', 'Publicidad Ingresada exitosamente');
} else {
    // Manejar errores de manera específica si es necesario
    $error_message = $response->json()['error'] ?? 'Error al Ingresar La Publicidad';
    return redirect()->route('publicidad.index')->with('error', $error_message);
}

}


//-----------------------------------------------------------------------------------------------------------------------------------
public function  UpdateForm($cod_publicidad)
{
    // No necesitas encontrar el producto aquí, simplemente pasas el código a la vista
    return view('Paginas.UpdatePublicidad', ['cod_publicidad' => $cod_publicidad]);
}


public function updatePublicidad(Request $request, $cod_publicidad)
    {
        // Validar que $cod_producto sea un número antes de realizar la actualización
        if (!is_numeric($cod_publicidad)) {
            return redirect()->back()->with('error', 'El parámetro cod_publicidad debe ser un número válido');
        }

        try {
            // Lógica para preparar los datos y la solicitud HTTP aquí
            $data = [
                'FEC_INICIO' => $request->input('FEC_INICIO'),
                'FEC_FINAL' => $request->input('FEC_FINAL'),
                'PUB_DESCRIPCION' => $request->input('PUB_DESCRIPCION'),
                'PUB_RECURSOS' => $request->input('PUB_RECURSOS'),
                'PUB_CANALES' => $request->input('PUB_CANALES'),
                'PUB_COSTO' => $request->input('PUB_COSTO'),
                'OBJ_AUDIENCIA' => $request->input('OBJ_AUDIENCIA'),
                'RES_CONTACTO' => $request->input('RES_CONTACTO'),
                'MET_KPIS' => $request->input('MET_KPIS'),
                'NOT_COMENTARIOS' => $request->input('NOT_COMENTARIOS'),
                'NOM_PUBLICIDAD' => $request->input('NOM_PUBLICIDAD'),
                'PUB_RESULTADOS' => $request->input('PUB_RESULTADOS'),
                // ... Agrega más campos según sea necesario
            ];
        
            // Realizar la solicitud HTTP a tu API
            $response = Http::put("$this->serverapi/pu_publicidadU/{$cod_publicidad}", $data);

            // Verificar el código de estado de la respuesta
            if ($response->successful()) {
                // Puedes realizar acciones adicionales si es necesario
                return redirect()->back()->with('success', 'Publicidad actualizado con éxito');
                return redirect()->route('publicidad.index')->with('success', 'Publicidad Ingresada exitosamente');
            } else {
                // Manejar error en la respuesta
                $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
                return redirect()->back()->with('error', $errorMessage);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error interno del servidor al actualizar la publicidad');
        }
    }



//PENDIENTE



public function eliminarPublicidad($cod_publicidad)
{
    // Validar que $cod_producto sea un número antes de realizar la consulta
    if (!is_numeric($cod_publicidad)) {
        // Puedes personalizar el mensaje de error según tus necesidades
        return redirect()->route('Paginas.flash')->with('error', 'El parámetro cod_publicidad debe ser un número válido');
    }

    // Realizar la solicitud HTTP a tu API
    $response = Http::delete("$this->serverapi/pu_publicidadD/{$cod_publicidad}");

    // Verificar el código de estado de la respuesta
    if ($response->successful()) {
        // Producto eliminado exitosamente, redirige a la vista de mensaje flash
        return redirect()->route('Paginas.flash')->with('success', 'Publicidad eliminado exitosamente');
    } else {
        // Manejar error en la respuesta de la API
        $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
        return view('Paginas.flash')->with('error', $errorMessage);

    }
}



}

