<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;



class TelefonosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'telefonos/');
        return view('telefonos.telefonos')->with('ResulTelefonos', json_decode($response,true)); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('telefonos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/telefonos', [
            'COD_TELEFONO' => $request->input('COD_TELEFONO'),           
            'COD_PERSONA' => $request ->input('COD_PERSONA'),
            'NUM_TELEFONO' => $request ->input('NUM_TELEFONO'),
            'TIP_TELEFONO' => $request ->input('TIP_TELEFONO'),                     
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/telefonos')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cod_telefono)
    {
        $response = Http::get('http://localhost:3000/telefonos/'.$cod_telefono);
        $telefonoData = json_decode($response->body(), true);

        return view('telefonos.detalle')->with('telefonoData', $telefonoData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener los datos de la persona que se va a editar
        $telefono = Http::get("http://localhost:3000/telefonos/{$id}")->json();
        //dd($telefono);
        return view('telefonos.edit', compact('telefono'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put("http://localhost:3000/telefonos/{$id}", [
            'COD_TELEFONO' => $request->input('COD_TELEFONO'),
            'COD_PERSONA' => $request->input('COD_PERSONA'),
            'NUM_TELEFONO' => $request ->input('NUM_TELEFONO'),
            'TIP_TELEFONO' => $request ->input('TIP_TELEFONO'),            
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/telefonos')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            // Realizar la solicitud HTTP para eliminar la persona
            $response = Http::delete("http://localhost:3000/telefonos/{$id}");

            // Verificar la respuesta de la API y manejarla según sea necesario
    
            return redirect('/telefonos')->with('success', 'Registro eliminado exitosamente');
    }
}