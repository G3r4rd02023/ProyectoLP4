<?php


namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;



class CitaController extends Controller
{

    // Define la URL base de la API como una propiedad de instancia
        private $serverapi = 'http://localhost:3000';

    /**
     * Muestra una lista de productos obtenidas de la API.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
         $response = Http::get("$this->serverapi/ci_cita");
     
         if ($response->successful()) {
             // Decodificar la respuesta JSON
             $result = $response->json();
     
             // Pasar directamente el resultado a la vista
             return view('Paginas.Cita.citas')->with('ResulCita', $result);
         } else {
             // Manejar errores de manera específica si es necesario
             return response()->json(['error' => 'No se encontro ninguna cita'], $response->status());
         }
     }
     
     

     public function ShowCita()
     {
         $response = Http::get("$this->serverapi/citas");
     
         if ($response->successful()) {
             // Decodificar la respuesta JSON
             $result = $response->json();
     
             // Pasar directamente el resultado a la vista
             return view('paginas.cita.CreateCita')->with('ResulCita', $result);
         } else {
             // Manejar errores de manera específica si es necesario
             return response()->json(['error' => 'No se Puede ingresar ninguna cita'], $response->status());
         }
     }
    


//*************************************************** */     
public function CreateCita()
{
   // Mostrar el formulario para ingresar los datos del cita
   return view('Paginas.Cita.createcita');
}


public function guardarCita(Request $request)
{
   // Validar los datos del formulario
   $request->validate([
       'COD_SERVICIO' => 'required',
       'EST_CITA' => 'required',
       'DUR_CITA' => 'required',
       'FEC_CITA' => 'required',
       'HOR_CITA' => 'required',
       'FEC_RECORDATORIO' => 'required',
       // Agrega otras reglas de validación según tus necesidades
   ]);

   // Obtener los datos del formulario
   $datosCita = $request->only([
    'COD_SERVICIO',
    'EST_CITA',
    'DUR_CITA',
    'FEC_CITA',
    'HOR_CITA',
    'FEC_RECORDATORIO',
       // Ajusta los nombres de los campos según tu API
   ]);

   // Realizar la solicitud HTTP POST con los datos del formulario
   $response = Http::post("$this->serverapi/citasins", $datosCita);

   if ($response->successful()) {
       return redirect()->route('citas.index')->with('success', 'cita creada exitosamente');
   } else {
       // Manejar errores de manera específica si es necesario
       $error_message = $response->json()['error'] ?? 'Error al crear la cita';
       return redirect()->route('citas.index')->with('error', $error_message);
   }
   
}


public function UpdateForm($cod_cita)
{
   // No necesitas encontrar el producto aqui, simplemente pasas el codigo a la vista
   return view('Paginas.Cita.updatecita', ['cod_cita' => $cod_cita]);
}


public function updateCita(Request $request, $cod_cita)
   {
       // Validar que $cod_cita sea un número antes de realizar la actualización
       if (!is_numeric($cod_cita)) {
           return redirect()->back()->with('error', 'El parametro cod_cita debe ser un numero valido');
       }

       try {
           // Lógica para preparar los datos y la solicitud HTTP aquí
           $data = [
               'COD_SERVICIO' => $request->input('COD_SERVICIO'),
               'EST_CITA' => $request->input('EST_CITA'),
               'DUR_CITA' => $request->input('DUR_CITA'),
               'FEC_CITA' => $request->input('FEC_CITA'),
               'HOR_CITA' => $request->input('HOR_CITA'),
               'FEC_RECORDATORIO' => $request->input('FEC_RECORDATORIO'),
               // ... Agrega más campos según sea necesario
           ];

           // Realizar la solicitud HTTP a tu API
           $response = Http::put("$this->serverapi/citass/{$cod_cita}", $data);

           // Verificar el código de estado de la respuesta
           if ($response->successful()) {
               // Puedes realizar acciones adicionales si es necesario
               return redirect()->back()->with('success', 'Cita actualizada con exito');
           } else {
               // Manejar error en la respuesta
               $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
               return redirect()->back()->with('error', $errorMessage);
           }

       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'Error interno del servidor al actualizar la cita');
       }
   }



public function eliminarCita($cod_cita)
{
   // Validar que $cod_producto sea un número antes de realizar la consulta
   if (!is_numeric($cod_cita)) {
       // Puedes personalizar el mensaje de error según tus necesidades
       return redirect()->route('Paginas.Cita.flash')->with('error', 'El parametro cod_cita debe ser un numero valido');
   }

   // Realizar la solicitud HTTP a tu API
   $response = Http::delete("$this->serverapi/citaas/{$cod_cita}");

   // Verificar el código de estado de la respuesta
   if ($response->successful()) {
       // Producto eliminado exitosamente, redirige a la vista de mensaje flash
       return redirect()->route('Paginas.flash')->with('success', 'Cita eliminada exitosamente');
   } else {
       // Manejar error en la respuesta de la API
       $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
       return view('Paginas.flash')->with('error', $errorMessage);

   }
}
}
