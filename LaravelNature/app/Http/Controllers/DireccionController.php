<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'direccion/');
        return view('sucursal/direccion.direccion')->with('ResulSucursal', json_decode($response,true)); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sucursal/direccion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/sucursal/direccion', [
            'COD_SUCURSAL' => $request->input('COD_SUCURSAL'),
            'DIR_SUCURSAL' => $request->input('DIR_SUCURSAL'),
            'DEP_SUCURSAL' => $request ->input('DEP_SUCURSAL'),           
            'CIU_SUCURSAL' => $request ->input('CIU_SUCURSAL'),  
            'FEC_AGR_DIRECCION' => $request ->input('FEC_AGR_DIRECCION'),           
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/direccion')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cod_direccion)
    {
        $response = Http::get("http://localhost:3000/sucursal/direccion/{$cod_direccion}");
        $sucursalData = json_decode($response->body(), true);

        return view('sucursal/direccion.detalle')->with('sucursalData', $sucursalData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sucursal = Http::get("http://localhost:3000/sucursal/direccion/{$id}")->json();
        
        return view('sucursal/direccion.edit', compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put("http://localhost:3000/sucursal/direccion/{$id}", [
            'COD_SUCURSAL' => $request->input('COD_SUCURSAL'),
            'DIR_SUCURSAL' => $request->input('DIR_SUCURSAL'),
            'DEP_SUCURSAL' => $request ->input('DEP_SUCURSAL'),           
            'CIU_SUCURSAL' => $request ->input('CIU_SUCURSAL'),  
            'FEC_AGR_DIRECCION' => $request ->input('FEC_AGR_DIRECCION'),           
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/direccion')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://localhost:3000/sucursal/direccion/{$id}");        
        return redirect('/direccion')->with('success', 'Registro eliminado exitosamente');
    }
}