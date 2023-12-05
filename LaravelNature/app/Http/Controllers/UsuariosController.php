<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'usuarios/');
        return view('usuarios.usuarios')->with('ResulUsuarios', json_decode($response,true));      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/usuarios', [
            'COD_USUARIO' => $request->input('COD_USUARIO'),           
            'COD_PERSONA' => $request ->input('COD_PERSONA'),
            'USR_NOMBRE' => $request ->input('USR_NOMBRE'),
            'USR_CONTRASENA' => $request ->input('USR_CONTRASENA'),                     
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/usuarios')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cod_usuario)
    {
        $response = Http::get('http://localhost:3000/usuarios/'.$cod_usuario);
        $usuariosData = json_decode($response->body(), true);

        return view('usuarios.detalle')->with('usuariosData', $usuariosData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         // Obtener los datos de la persona que se va a editar
         $usuario = Http::get("http://localhost:3000/usuarios/{$id}")->json();
         //dd($telefono);
         return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put("http://localhost:3000/usuarios/{$id}", [
            'COD_USUARIO' => $request->input('COD_USUARIO'),
            'COD_PERSONA' => $request->input('COD_PERSONA'),
            'USR_NOMBRE' => $request ->input('USR_NOMBRE'),
            'USR_CONTRASENA' => $request ->input('USR_CONTRASENA'),            
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/usuarios')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Realizar la solicitud HTTP para eliminar la persona
         $response = Http::delete("http://localhost:3000/usuarios/{$id}");

         // Verificar la respuesta de la API y manejarla según sea necesario
 
         return redirect('/usuarios')->with('success', 'Registro eliminado exitosamente');
    }
}