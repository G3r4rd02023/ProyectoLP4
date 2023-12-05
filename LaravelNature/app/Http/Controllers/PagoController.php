<?php


namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;



class PagoController extends Controller
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
         $response = Http::get("$this->serverapi/ci_pago");
     
         if ($response->successful()) {
             // Decodificar la respuesta JSON
             $result = $response->json();
     
             // Pasar directamente el resultado a la vista
             return view('Paginas.Pago.pagos')->with('ResulPago', $result);
         } else {
             // Manejar errores de manera específica si es necesario
             return response()->json(['error' => 'No se encontro ningun pago'], $response->status());
         }
     }
     
     

     public function ShowPago()
     {
         $response = Http::get("$this->serverapi/ci_pago");
     
         if ($response->successful()) {
             // Decodificar la respuesta JSON
             $result = $response->json();
     
             // Pasar directamente el resultado a la vista
             return view('Paginas.Pago.createpago')->with('ResulPago', $result);
         } else {
             // Manejar errores de manera específica si es necesario
             return response()->json(['error' => 'No se Puede ingresar ningun pago'], $response->status());
         }
     }
    


//*************************************************** */     
public function CreatePago()
{
   // Mostrar el formulario para ingresar los datos del cita
   return view('Paginas.Pago.createpago');
}


public function guardarPago(Request $request)
{
   // Validar los datos del formulario
   $request->validate([
       'COD_SERVICIO' => 'required',
       'TIP_PAGO' => 'required',
       'PLA_PAGO' => 'required',
       // Agrega otras reglas de validación según tus necesidades
   ]);

   // Obtener los datos del formulario
   $datosPago = $request->only([
    'COD_SERVICIO',
    'TIP_PAGO',
    'PLA_PAGO',
       // Ajusta los nombres de los campos según tu API
   ]);

   // Realizar la solicitud HTTP POST con los datos del formulario
   $response = Http::post("$this->serverapi/pagosins", $datosPago);

   if ($response->successful()) {
       return redirect()->route('pagos.index')->with('success', 'pago realizado exitosamente');
   } else {
       // Manejar errores de manera específica si es necesario
       $error_message = $response->json()['error'] ?? 'Error al crear el pago';
       return redirect()->route('pagos.index')->with('error', $error_message);
   }
   
}


public function UpdateFormPa($cod_pago)
{
   // No necesitas encontrar el pago aqui, simplemente pasas el codigo a la vista
   return view('Paginas.Pago.updatepago', ['cod_pago' => $cod_pago]);
}


public function updatePago(Request $request, $cod_pago)
   {
       // Validar que $codpago sea un número antes de realizar la actualización
       if (!is_numeric($cod_pago)) {
           return redirect()->back()->with('error', 'El parametro cod_pago debe ser un numero valido');
       }

       try {
           // Lógica para preparar los datos y la solicitud HTTP aquí
           $data = [
               'COD_SERVICIO' => $request->input('COD_SERVICIO'),
               'TIP_PAGO' => $request->input('TIP_PAGO'),
               'PLA_PAGO' => $request->input('PLA_PAGO'),
               // ... Agrega más campos según sea necesario
           ];

           // Realizar la solicitud HTTP a tu API
           $response = Http::put("$this->serverapi/pagoss/{$cod_pago}", $data);

           // Verificar el código de estado de la respuesta
           if ($response->successful()) {
               // Puedes realizar acciones adicionales si es necesario
               return redirect()->back()->with('success', 'Pago actualizado con exito');
           } else {
               // Manejar error en la respuesta
               $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
               return redirect()->back()->with('error', $errorMessage);
           }

       } catch (\Exception $e) {
           return redirect()->back()->with('error', 'Error interno del servidor al actualizar el pago');
       }
   }
   public function eliminarPago($cod_pago)
{
   // Validar que $cod_producto sea un número antes de realizar la consulta
   if (!is_numeric($cod_pago)) {
       // Puedes personalizar el mensaje de error según tus necesidades
       return redirect()->route('Paginas.flash')->with('error', 'El parametro cod_pago debe ser un numero valido');
   }

   // Realizar la solicitud HTTP a tu API
   $response = Http::delete("$this->serverapi/pagoos/{$cod_pago}");

   // Verificar el código de estado de la respuesta
   if ($response->successful()) {
       // Producto eliminado exitosamente, redirige a la vista de mensaje flash
       return redirect()->route('Paginas.flash')->with('success', 'Pago eliminado exitosamente');
   } else {
       // Manejar error en la respuesta de la API
       $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
       return view('Paginas.flash')->with('error', $errorMessage);

   }
}
}