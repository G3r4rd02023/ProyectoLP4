<?php


namespace App\Http\Controllers;
//incluimos Http
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;




class ProductoController extends Controller
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
         $response = Http::get("$this->serverapi/pr_productos");
     
         if ($response->successful()) {
             // Decodificar la respuesta JSON
             $result = $response->json();
     
             // Pasar directamente el resultado a la vista
             return view('Paginas.Producto.Productos')->with('ResulProductos', $result);
         } else {
             // Manejar errores de manera específica si es necesario
             return response()->json(['error' => 'No se encontró ningún producto'], $response->status());
         }
     }
     
     

     public function ShowProducto()
     {
         $response = Http::get("$this->serverapi/pr_productoI");
     
         if ($response->successful()) {
             // Decodificar la respuesta JSON
             $result = $response->json();
     
             // Pasar directamente el resultado a la vista
             return view('Paginas.Producto.CreateProducto')->with('ResulProducto', $result);
         } else {
             // Manejar errores de manera específica si es necesario
             return response()->json(['error' => 'No se Puede ingresar ningún producto'], $response->status());
         }
     }
     





//*************************************************** */     
public function CreateProducto()
{
    // Mostrar el formulario para ingresar los datos del producto
    return view('Paginas.Producto.CreateProducto');
}


public function guardarProducto(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'NOM_PRODUCTO' => 'required',
        'NOM_PRODUCTO' => 'required',
        'DES_PRODUCTO' => 'required',
        'PRECIO' => 'required',
        'CAN_PRODUCTO' => 'required',
        'IMG_PRODUCTO' => 'required',
        'FEC_AGREGADO' => 'required',
        // Agrega otras reglas de validación según tus necesidades
    ]);

    // Obtener los datos del formulario
    $datosProducto = $request->only([
        'NOM_PRODUCTO',
        'DES_PRODUCTO',
        'PRECIO',
        'CAN_PRODUCTO',
        'IMG_PRODUCTO',
        'FEC_AGREGADO',
        // Ajusta los nombres de los campos según tu API
    ]);

    // Realizar la solicitud HTTP POST con los datos del formulario
    $response = Http::post("$this->serverapi/pr_productoI", $datosProducto);

    if ($response->successful()) {
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente');
    } else {
        // Manejar errores de manera específica si es necesario
        $error_message = $response->json()['error'] ?? 'Error al crear el producto';
        return redirect()->route('productos.index')->with('error', $error_message);
    }
    
}


public function UpdateForm($cod_producto)
{
    // No necesitas encontrar el producto aquí, simplemente pasas el código a la vista
    return view('Paginas.Producto.UpdateProducto', ['cod_producto' => $cod_producto]);
}


public function updateProducto(Request $request, $cod_producto)
    {
        // Validar que $cod_producto sea un número antes de realizar la actualización
        if (!is_numeric($cod_producto)) {
            return redirect()->back()->with('error', 'El parámetro cod_producto debe ser un número válido');
        }

        try {
            // Lógica para preparar los datos y la solicitud HTTP aquí
            $data = [
                'NOM_PRODUCTO' => $request->input('NOM_PRODUCTO'),
                'DES_PRODUCTO' => $request->input('DES_PRODUCTO'),
                'PRECIO' => $request->input('PRECIO'),
                'CAN_PRODUCTO' => $request->input('CAN_PRODUCTO'),
                'IMG_PRODUCTO' => $request->input('IMG_PRODUCTO'),
                'FEC_AGREGADO' => $request->input('FEC_AGREGADO'),
                // ... Agrega más campos según sea necesario
            ];

            // Realizar la solicitud HTTP a tu API
            $response = Http::put("$this->serverapi/pr_productoU/{$cod_producto}", $data);

            // Verificar el código de estado de la respuesta
            if ($response->successful()) {
                // Puedes realizar acciones adicionales si es necesario
                return redirect()->back()->with('success', 'Producto actualizado con éxito');
            } else {
                // Manejar error en la respuesta
                $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
                return redirect()->back()->with('error', $errorMessage);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error interno del servidor al actualizar el producto');
        }
    }



//PENDIENTE



public function eliminarProducto($cod_producto)
{
    // Validar que $cod_producto sea un número antes de realizar la consulta
    if (!is_numeric($cod_producto)) {
        // Puedes personalizar el mensaje de error según tus necesidades
        return redirect()->route('Paginas.Producto.flash')->with('error', 'El parámetro cod_producto debe ser un número válido');
    }

    // Realizar la solicitud HTTP a tu API
    $response = Http::delete("$this->serverapi/pr_productoD/{$cod_producto}");

    // Verificar el código de estado de la respuesta
    if ($response->successful()) {
        // Producto eliminado exitosamente, redirige a la vista de mensaje flash
        return redirect()->route('Paginas.flash')->with('success', 'Producto eliminado exitosamente');
    } else {
        // Manejar error en la respuesta de la API
        $errorMessage = $response->json()['error'] ?? 'Error en la solicitud a la API externa';
        return view('Paginas.flash')->with('error', $errorMessage);

    }
}


}

