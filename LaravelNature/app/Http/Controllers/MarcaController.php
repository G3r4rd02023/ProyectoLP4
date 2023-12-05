<?php

namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MarcaController extends Controller
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
         $response = Http::get("$this->serverapi/pr_marcas");
     
         if ($response->successful()) {
             // Decodificar la respuesta JSON
             $result = $response->json();
     
             // Pasar directamente el resultado a la vista
             return view('Paginas.Marca.SelectMarcas')->with('ResulMarcas', $result);
         } else {
             // Manejar errores de manera específica si es necesario
             return response()->json(['error' => 'No se encontró ningún producto'], $response->status());
         }
     }

     //INSERTAR MARCAS
     public function CreateMarca()
     {
         // Mostrar el formulario para ingresar los datos de la marca
         return view('Paginas.Marca.CreateMarca');
     }


    //GUARDAR MARCA
     public function guardarMarca(Request $request)
    {
    // Validar los datos del formulario
    $request->validate([
        
        'COD_PRODUCTO' => 'required',
        'NOM_MARCA' => 'required',
        'DES_MARCA' => 'required',
        'IMG_MARCA' => 'required',
        'IDP_PAIS' => 'required',
        'FAB_MARCA' => 'required',
        'FEC_AGR_MARCA' => 'required',
        'URL_WEB_MARCA' => 'required',
        // Agrega otras reglas de validación según necesidades
    ]);

    // Obtener los datos del formulario
    $datosMarca = $request->only([
        'COD_PRODUCTO',
        'NOM_MARCA',
        'DES_MARCA',
        'IMG_MARCA',
        'IDP_PAIS',
        'FAB_MARCA',
        'FEC_AGR_MARCA',
        'URL_WEB_MARCA',
        // Ajusta los nombres de los campos según API
    ]);

    // Realizar la solicitud HTTP POST con los datos del formulario
    $response = Http::post("$this->serverapi/pr_marcaI", $datosMarca);

    if ($response->successful()) {
        return redirect()->route('marcas.index')->with('success', 'Marca creado exitosamente');
    } else {
        // Manejar errores de manera específica si es necesario
        $error_message = $response->json()['error'] ?? 'Error al crear la Marca';
        return redirect()->route('marcas.index')->with('error', $error_message);
    }
    
}

//ACTUALIZAR MARCA
public function UpdateForm($cod_marca)
{
    // Simplemente pasa el código a la vista
    return view('Paginas.Marca.UpdateMarca', ['cod_marca' => $cod_marca]);
}


//GUARDAR ACTUALIZACION
public function updateMarca(Request $request, $cod_marca)
    {
        // Validar que $cod_marca sea un número antes de realizar la actualización
        if (!is_numeric($cod_marca)) {
            return redirect()->back()->with('error', 'El parámetro cod_marca debe ser un número válido');
        }

        try {
            // Lógica para preparar los datos y la solicitud HTTP aquí
            $data = [
                'COD_PRODUCTO' => $request->input('COD_PRODUCTO'),
                'NOM_MARCA' => $request->input('NOM_MARCA'),
                'DES_MARCA' => $request->input('DES_MARCA'),
                'IMG_MARCA' => $request->input('IMG_MARCA'),
                'IDP_PAIS' => $request->input('IDP_PAIS'),
                'FAB_MARCA' => $request->input('FAB_MARCA'),
                'FEC_AGR_MARCA' => $request->input('FEC_AGR_MARCA'),
                'URL_WEB_MARCA' => $request->input('URL_WEB_MARCA'),
                // ... Agrega más campos según sea necesario
            ];

             // Realizar la solicitud HTTP a tu API
             $response = Http::put("$this->serverapi/pr_marcaU/{$cod_marca}", $data);

             // Verificar el código de estado de la respuesta
             if ($response->successful()) {
                 // Puedes realizar acciones adicionales si es necesario
                 return redirect()->back()->with('success', 'Marca actualizado con éxito');
             } else {
                 // Manejar error en la respuesta
                 $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
                 return redirect()->back()->with('error', $errorMessage);
             }
 
         } catch (\Exception $e) {
             return redirect()->back()->with('error', 'Error interno del servidor al actualizar la marca');
         }
     }

//ELIMINAR MARCA
public function eliminarMarca($cod_marca)
{
    // Validar que $cod_producto sea un número antes de realizar la consulta
    if (!is_numeric($cod_marca) ){
        // Puedes personalizar el mensaje de error según tus necesidades
        return redirect()->route('Paginas.Producto.flash')->with('error', 'El parámetro cod_marca debe ser un número válido');
    }

    // Realizar la solicitud HTTP a tu API
    $response = Http::delete("$this->serverapi/pr_marcaD/{$cod_marca}");

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





}//FIN DEL CONTROLLADOR
