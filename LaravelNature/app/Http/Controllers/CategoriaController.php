<?php

namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Define la URL base de la API como una propiedad de instancia
    private $serverapi = 'http://localhost:3000';

    /**
     * Muestra una lista de productos obtenidas de la API.
     *
     * @return \Illuminate\Http\Response
     */

     //SELECCIONAR CATEGORIAS
     public function index()
     {
         $response = Http::get("$this->serverapi/pr_categorias");
     
         if ($response->successful()) {
             // Decodificar la respuesta JSON
             $result = $response->json();
     
             // Pasar directamente el resultado a la vista
             return view('Paginas.Categoria.SelectCategoria')->with('ResulCategoria', $result);
         } else {
             // Manejar errores de manera específica si es necesario
             return response()->json(['error' => 'No se encontró ningúna categoria'], $response->status());
         }
     }// FIN INDEX

      //INSERTAR CATEGORIAS
      public function CreateCategoria()
      {
          // Mostrar el formulario para ingresar los datos de la Categoria
          return view('Paginas.Categoria.CreateCategoria');
      }
 
 
     //GUARDAR Categoria
      public function guardarCategoria(Request $request)
     {
     // Validar los datos del formulario
     $request->validate([
         
         'COD_PRODUCTO' => 'required',
         'NOM_CATEGORIA' => 'required',
         'DES_CATEGORIA' => 'required',
         'IMG_CATEGORIA' => 'required',        
         // Agrega otras reglas de validación según necesidades
     ]);
 
     // Obtener los datos del formulario
     $datosCategoria = $request->only([
         'COD_PRODUCTO',
         'NOM_CATEGORIA',
         'DES_CATEGORIA',
         'IMG_CATEGORIA',
         // Ajusta los nombres de los campos según API
     ]);
 
     // Realizar la solicitud HTTP POST con los datos del formulario
     $response = Http::post("$this->serverapi/pr_categoriaI", $datosCategoria);
 
     if ($response->successful()) {
         return redirect()->route('categoria.index')->with('success', 'Categoria creado exitosamente');
     } else {
         // Manejar errores de manera específica si es necesario
         $error_message = $response->json()['error'] ?? 'Error al crear la Categoria';
         return redirect()->route('categoria.index')->with('error', $error_message);
     }
     
 }//fin insertar CATEGORIA
    
    //ACTUALIZAR CATEGORIA
public function UpdateForm($cod_categoria)
{
    // Simplemente pasa el código a la vista
    return view('Paginas.Categoria.UpdateCategoria', ['cod_categoria' => $cod_categoria]);
}


//GUARDAR ACTUALIZACION
public function updateCategoria(Request $request, $cod_categoria)
    {
        // Validar que $cod_categoria sea un número antes de realizar la actualización
        if (!is_numeric($cod_categoria)) {
            return redirect()->back()->with('error', 'El parámetro cod_categoria debe ser un número válido');
        }

        try {
            // Lógica para preparar los datos y la solicitud HTTP aquí
            $data = [
                'COD_PRODUCTO' => $request->input('COD_PRODUCTO'),
                'NOM_CATEGORIA' => $request->input('NOM_CATEGORIA'),
                'DES_CATEGORIA' => $request->input('DES_CATEGORIA'),
                'IMG_CATEGORIA' => $request->input('IMG_CATEGORIA'),
                // ... Agrega más campos según sea necesario
            ];

             // Realizar la solicitud HTTP a tu API
             $response = Http::put("$this->serverapi/pr_categoriaU/{$cod_categoria}", $data);

             // Verificar el código de estado de la respuesta
             if ($response->successful()) {
                 // Puedes realizar acciones adicionales si es necesario 
                 return redirect()->back()->with('success', 'Categoria actualizado con éxito');
             } else {
                 // Manejar error en la respuesta
                 $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
                 return redirect()->back()->with('error', $errorMessage);
             }
 
         } catch (\Exception $e) {
             return redirect()->back()->with('error', 'Error interno del servidor al actualizar la categoria');
         }
     }//FIN ACTUALIZAR

     //ELIMINAR MARCA
public function eliminarCategoria($cod_categoria)
{
    // Validar que $cod_categoria sea un número antes de realizar la consulta
    if (!is_numeric($cod_categoria) ){
        // Puedes personalizar el mensaje de error según tus necesidades
        return redirect()->route('Paginas.Producto.flash')->with('error', 'El parámetro cod_categoria debe ser un número válido');
    }

    // Realizar la solicitud HTTP a tu API
    $response = Http::delete("$this->serverapi/pr_categoriaD/{$cod_categoria}");

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



}//FIN CONTROLLADOR CATEGORIA