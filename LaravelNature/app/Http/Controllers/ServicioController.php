<?php


namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;



class ServicioController extends Controller
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
         $response = Http::get("$this->serverapi/ci_servicio");
     
         if ($response->successful()) {
             // Decodificar la respuesta JSON
             $result = $response->json();
     
             // Pasar directamente el resultado a la vista
             return view('Paginas.Servicio.servicios')->with('ResulServicio', $result);
         } else {
             // Manejar errores de manera específica si es necesario
             return response()->json(['error' => 'No se encontro ningun servicio'], $response->status());
         }
     }
     
     

     public function ShowCita()
     {
         $response = Http::get("$this->serverapi/servicios");
     
         if ($response->successful()) {
             // Decodificar la respuesta JSON
             $result = $response->json();
     
             // Pasar directamente el resultado a la vista
             return view('Paginas.Servicio.createservicio')->with('ResulServicio', $result);
         } else {
             // Manejar errores de manera específica si es necesario
             return response()->json(['error' => 'No se Puede ingresar ningun servicio'], $response->status());
         }
     }
    


//*************************************************** */     
public function CreateServicio()
{
   // Mostrar el formulario para ingresar los datos del cita
   return view('Paginas.Servicio.createservicio');
}


public function guardarServicio(Request $request)
{
   // Validar los datos del formulario
   $request->validate([
       'DET_SERVICIO' => 'required',
       'TIP_SERVICIO' => 'required',
       'TOT_SERVICIO' => 'required',
       // Agrega otras reglas de validación según tus necesidades
   ]);

   // Obtener los datos del formulario
   $datosServicio = $request->only([
    'DET_SERVICIO',
    'TIP_SERVICIO',
    'TOT_SERVICIO',
       // Ajusta los nombres de los campos según tu API
   ]);

   // Realizar la solicitud HTTP POST con los datos del formulario
   $response = Http::post("$this->serverapi/serviciosins", $datosServicio);

   if ($response->successful()) {
       return redirect()->route('servicios.index')->with('success', 'Servicio creado exitosamente');
   } else {
       // Manejar errores de manera específica si es necesario
       $error_message = $response->json()['error'] ?? 'Error al crear el servicio';
       return redirect()->route('servicios.index')->with('error', $error_message);
   }
   
}


public function UpdateFormSe($cod_servicio)
{
   // No necesitas encontrar el producto aqui, simplemente pasas el codigo a la vista
   return view('Paginas.Servicio.updateservicio', ['cod_servicio' => $cod_cita]);
}


public function updateServicio(Request $request, $cod_servicio)
   {
       // Validar que $cod_cita sea un número antes de realizar la actualización
       if (!is_numeric($cod_servicio)) {
           return redirect()->back()->with('error', 'El parametro cod_servicio debe ser un numero valido');
       }

       try {
           // Lógica para preparar los datos y la solicitud HTTP aquí
           $data = [
               'DET_SERVICIO' => $request->input('DET_SERVICIO'),
               'TIP_SERVICIO' => $request->input('TIP_SERVICIO'),
               'TOT_SERVICIO' => $request->input('TOT_SERVICIO'),
               // ... Agrega más campos según sea necesario
           ];

           // Realizar la solicitud HTTP a tu API
           $response = Http::put("$this->serverapi/servicioss/{$cod_servicio}", $data);

           // Verificar el código de estado de la respuesta
           if ($response->successful()) {
               // Puedes realizar acciones adicionales si es necesario
               return redirect()->back()->with('success', 'Servicio actualizado con exito');
           } else {
               // Manejar error en la respuesta
               $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
               return redirect()->back()->with('error', $errorMessage);
           }

       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'Error interno del servidor al actualizar el servicio');
       }
   }
   public function eliminarServicio($cod_servicio)
{
   // Validar que $cod_producto sea un número antes de realizar la consulta
   if (!is_numeric($cod_servicio)) {
       // Puedes personalizar el mensaje de error según tus necesidades
       return redirect()->route('Paginas.flash')->with('error', 'El parametro cod_servicio debe ser un numero valido');
   }

   // Realizar la solicitud HTTP a tu API
   $response = Http::delete("$this->serverapi/servicioos/{$cod_servicio}");

   // Verificar el código de estado de la respuesta
   if ($response->successful()) {
       // Producto eliminado exitosamente, redirige a la vista de mensaje flash
       return redirect()->route('Paginas.flash')->with('success', 'Servicio eliminado exitosamente');
   } else {
       // Manejar error en la respuesta de la API
       $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
       return view('Paginas.flash')->with('error', $errorMessage);

   }
}

}