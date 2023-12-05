<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CorreosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'correos/');
        return view('correos.correos')->with('ResulPersonas', json_decode($response,true));          
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('correos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/correos', [
            'COD_CORREO' => $request->input('COD_CORREO'),            
            'COD_PERSONA' => $request ->input('COD_PERSONA'),
            'NOM_CORREO' => $request ->input('NOM_CORREO'),
            'TIP_CORREO' => $request ->input('TIP_CORREO'),            
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/correos')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cod_correo)
    {
        $response = Http::get('http://localhost:3000/correos/'.$cod_correo);
        $personaData = json_decode($response->body(), true);

        return view('correos.detalle')->with('personaData', $personaData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener los datos de la persona que se va a editar
        $persona = Http::get("http://localhost:3000/correos/{$id}")->json();
        //dd($persona);
        return view('correos.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put("http://localhost:3000/correos/{$id}", [
            'COD_CORREO' => $request->input('COD_CORREO'),            
            'COD_PERSONA' => $request ->input('COD_PERSONA'),
            'NOM_CORREO' => $request ->input('NOM_CORREO'),
            'TIP_CORREO' => $request ->input('TIP_CORREO'),            
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/correos')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
             // Realizar la solicitud HTTP para eliminar la persona
             $response = Http::delete("http://localhost:3000/correos/{$id}");

             // Verificar la respuesta de la API y manejarla según sea necesario
     
             return redirect('/correos')->with('success', 'Registro eliminado exitosamente');
    }
}