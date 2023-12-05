<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'proveedores/');
        return view('proveedores.proveedores')->with('ResulPersonas', json_decode($response,true));       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/proveedores', [
            'COD_PERSONA' => $request->input('COD_PERSONA'),
            'TIP_PROVEEDOR' => $request->input('TIP_PROVEEDOR'),
            'NOM_PROVEEDOR' => $request ->input('NOM_PROVEEDOR'),           
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/proveedores')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cod_proveedor)
    {
        $response = Http::get('http://localhost:3000/proveedores/'.$cod_proveedor);
        $personaData = json_decode($response->body(), true);

        return view('proveedores.detalle')->with('personaData', $personaData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         // Obtener los datos de la persona que se va a editar
         $persona = Http::get("http://localhost:3000/proveedores/{$id}")->json();
         //dd($persona);
         return view('proveedores.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put("http://localhost:3000/proveedores/{$id}", [
            'COD_PROVEEDOR' => $request->input('COD_PROVEEDOR'),
            'COD_PERSONA' => $request->input('COD_PERSONA'),           
            'TIP_PROVEEDOR' => $request ->input('TIP_PROVEEDOR'),
            'NOM_PROVEEDOR' => $request ->input('NOM_PROVEEDOR'),            
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/proveedores')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://localhost:3000/proveedores/{$id}");

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/proveedores')->with('success', 'Registro eliminado exitosamente');
    }
}