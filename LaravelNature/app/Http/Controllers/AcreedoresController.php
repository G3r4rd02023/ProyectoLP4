<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AcreedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'acreedores/');
        return view('acreedores.acreedores')->with('ResulPersonas', json_decode($response,true)); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('acreedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/acreedores', [
            'COD_PERSONA' => $request->input('COD_PERSONA'),
            'NOM_ACREEDOR' => $request->input('NOM_ACREEDOR'),
            'TIP_ACREEDOR' => $request ->input('TIP_ACREEDOR'),           
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/acreedores')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cod_cliente)
    {
        $response = Http::get('http://localhost:3000/acreedores/'.$cod_cliente);
        $personaData = json_decode($response->body(), true);

        return view('acreedores.detalles')->with('personaData', $personaData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $persona = Http::get("http://localhost:3000/acreedores/{$id}")->json();
        //dd($persona);
        return view('acreedores.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put("http://localhost:3000/acreedores/{$id}", [
            'COD_ACREEDOR' => $request->input('COD_ACREEDOR'),
            'COD_PERSONA' => $request->input('COD_PERSONA'),           
            'TIP_ACREEDOR' => $request ->input('TIP_ACREEDOR'),
            'NOM_ACREEDOR' => $request ->input('NOM_ACREEDOR'),            
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/acreedores')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://localhost:3000/acreedores/{$id}");

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/acreedores')->with('success', 'Registro eliminado exitosamente');
    }
}