<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'sucursal/');
        return view('sucursal.sucursal')->with('ResulSucursal', json_decode($response,true)); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sucursal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/sucursal', [
            'NOM_SUCURSAL' => $request->input('NOM_SUCURSAL'),
            'FEC_APERTURA' => $request->input('FEC_APERTURA'),
            'GER_SUCURSAL' => $request ->input('GER_SUCURSAL'),           
            'IMG_SUCURSAL' => $request ->input('IMG_SUCURSAL'),           
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/sucursal')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cod_sucursal)
    {
        $response = Http::get('http://localhost:3000/sucursal/'.$cod_sucursal);
        $sucursalData = json_decode($response->body(), true);

        return view('sucursal.detalle')->with('sucursalData', $sucursalData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sucursal = Http::get("http://localhost:3000/sucursal/{$id}")->json();
        
        return view('sucursal.edit', compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put("http://localhost:3000/sucursal/{$id}", [
            'COD_SUCURSAL' => $request->input('COD_SUCURSAL'),
            'NOM_SUCURSAL' => $request->input('NOM_SUCURSAL'),
            'FEC_APERTURA' => $request->input('FEC_APERTURA'),
            'GER_SUCURSAL' => $request ->input('GER_SUCURSAL'),           
            'IMG_SUCURSAL' => $request ->input('IMG_SUCURSAL'),           
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/sucursal')->with('success', 'Registro creado exitosamente');
    }

    
    public function destroy(string $id)
    {
        $response = Http::delete("http://localhost:3000/sucursal/{$id}");        
        return redirect('/sucursal')->with('success', 'Registro eliminado exitosamente');
    }
}