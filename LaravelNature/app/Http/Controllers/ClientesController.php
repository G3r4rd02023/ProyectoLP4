<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'clientes/');
        return view('clientes.clientes')->with('ResulPersonas', json_decode($response,true));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/clientes', [
            'COD_PERSONA' => $request->input('COD_PERSONA'),
            'NOM_CLIENTE' => $request->input('NOM_CLIENTE'),
            'TIP_CLIENTE' => $request ->input('TIP_CLIENTE'),           
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/clientes')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cod_cliente)
    {
        $response = Http::get('http://localhost:3000/clientes/'.$cod_cliente);
        $personaData = json_decode($response->body(), true);

        return view('clientes.detalle')->with('personaData', $personaData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $persona = Http::get("http://localhost:3000/clientes/{$id}")->json();
        //dd($persona);
        return view('clientes.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put("http://localhost:3000/clientes/{$id}", [
            'COD_CLIENTE' => $request->input('COD_CLIENTE'),
            'COD_PERSONA' => $request->input('COD_PERSONA'),           
            'TIP_CLIENTE' => $request ->input('TIP_CLIENTE'),
            'NOM_CLIENTE' => $request ->input('NOM_CLIENTE'),            
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/clientes')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://localhost:3000/clientes/{$id}");

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/clientes')->with('success', 'Registro eliminado exitosamente');
    }
}