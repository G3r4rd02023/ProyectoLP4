<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DireccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'direcciones/');
        return view('direcciones.direcciones')->with('ResulPersonas', json_decode($response,true)); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('direcciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/direcciones', [
            'COD_PERSONA' => $request->input('COD_PERSONA'),
            'NOM_CALLE' => $request->input('NOM_CALLE'),
            'NUM_CALLE' => $request ->input('NUM_CALLE'),
            'NOM_COLONIA' => $request ->input('NOM_COLONIA'),
            'NOM_CIUDAD' => $request ->input('NOM_CIUDAD'),
            'NOM_ESTADO' => $request ->input('NOM_ESTADO'),
            'NOM_PAIS' => $request ->input('NOM_PAIS'),
            'ID_COD_POSTAL' => $request ->input('ID_COD_POSTAL'),           
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/direcciones')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cod_direccion)
    {
        $response = Http::get('http://localhost:3000/direcciones/'.$cod_direccion);
        $personaData = json_decode($response->body(), true);

        return view('direcciones.detalle')->with('personaData', $personaData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         // Obtener los datos de la persona que se va a editar
         $persona = Http::get("http://localhost:3000/direcciones/{$id}")->json();
        
         return view('direcciones.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put("http://localhost:3000/direcciones/{$id}", [
            'COD_PERSONA' => $request->input('COD_PERSONA'),
            'NOM_CALLE' => $request->input('NOM_CALLE'),
            'NUM_CALLE' => $request ->input('NUM_CALLE'),
            'NOM_COLONIA' => $request ->input('NOM_COLONIA'),
            'NOM_CIUDAD' => $request ->input('NOM_CIUDAD'),
            'NOM_ESTADO' => $request ->input('NOM_ESTADO'),
            'NOM_PAIS' => $request ->input('NOM_PAIS'),
            'ID_COD_POSTAL' => $request ->input('ID_COD_POSTAL'),
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/direcciones')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://localhost:3000/direcciones/{$id}");

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/direcciones')->with('success', 'Registro eliminado exitosamente');
    }
}