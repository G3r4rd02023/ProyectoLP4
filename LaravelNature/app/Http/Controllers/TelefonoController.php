<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'telefono/');
        return view('telefono.telefono')->with('ResulSucursal', json_decode($response,true)); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('telefono.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/sucursal/telefono', [
            'COD_SUCURSAL' => $request->input('COD_SUCURSAL'),
            'NUM_TELEFONO' => $request->input('NUM_TELEFONO'),
            'TIP_TELEFONO' => $request ->input('TIP_TELEFONO'),           
            'FEC_AGR_TELEFONO' => $request ->input('FEC_AGR_TELEFONO'),           
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/telefono')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cod_telefono)
    {
        $response = Http::get("http://localhost:3000/sucursal/telefono/{$cod_telefono}");
        $sucursalData = json_decode($response->body(), true);

        return view('telefono.detalle')->with('sucursalData', $sucursalData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $cod_telefono)
    {
        $sucursal = Http::get("http://localhost:3000/sucursal/telefono/{$cod_telefono}")->json();
        
        return view('telefono.edit', compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $cod_telefono)
    {
        $response = Http::put("http://localhost:3000/sucursal/telefono/{$cod_telefono}", [
            'COD_TELEFONO' => $request->input('COD_TELEFONO'),   
            'COD_SUCURSAL' => $request->input('COD_SUCURSAL'),           
            'NUM_TELEFONO' => $request->input('NUM_TELEFONO'),
            'TIP_TELEFONO' => $request ->input('TIP_TELEFONO'),           
            'FEC_AGR_TELEFONO' => $request ->input('FEC_AGR_TELEFONO'),     
        ]);

        return redirect('/telefono')->with('success', 'Registro editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://localhost:3000/sucursal/telefono/{$id}");        
        return redirect('/telefono')->with('success', 'Registro eliminado exitosamente');
    }
}