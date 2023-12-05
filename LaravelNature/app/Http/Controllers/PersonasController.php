<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'personas/');
        return view('personas.personas')->with('ResulPersonas', json_decode($response,true));                       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/personas', [
            'COD_PERSONA' => $request->input('COD_PERSONA'),
            'IDENTIDAD' => $request->input('IDENTIDAD'),
            'NOM_PERSONA' => $request ->input('NOM_PERSONA'),
            'APE_PERSONA' => $request ->input('APE_PERSONA'),
            'GEN_PERSONA' => $request ->input('GEN_PERSONA'),
            'IND_CIVIL' => $request ->input('IND_CIVIL'),
            'EDA_PERSONA' => $request ->input('EDA_PERSONA'),
            'IND_PERSONA' => $request ->input('IND_PERSONA'),
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/personas')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cod_persona)
    {
        $response = Http::get('http://localhost:3000/personas/'.$cod_persona);
        $personaData = json_decode($response->body(), true);

        return view('personas.detalle')->with('personaData', $personaData);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener los datos de la persona que se va a editar
        $persona = Http::get("http://localhost:3000/personas/{$id}")->json();
        //dd($persona);
        return view('personas.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put("http://localhost:3000/personas/{$id}", [
            'COD_PERSONA' => $request->input('COD_PERSONA'),
            'IDENTIDAD' => $request->input('IDENTIDAD'),
            'NOM_PERSONA' => $request ->input('NOM_PERSONA'),
            'APE_PERSONA' => $request ->input('APE_PERSONA'),
            'GEN_PERSONA' => $request ->input('GEN_PERSONA'),
            'IND_CIVIL' => $request ->input('IND_CIVIL'),
            'EDA_PERSONA' => $request ->input('EDA_PERSONA'),
            'IND_PERSONA' => $request ->input('IND_PERSONA'),
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/personas')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            // Realizar la solicitud HTTP para eliminar la persona
        $response = Http::delete("http://localhost:3000/personas/{$id}");

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/personas')->with('success', 'Registro eliminado exitosamente');
    }
}