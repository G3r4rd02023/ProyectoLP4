<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serverapi = 'http://localhost:3000/';
        $response = Http::get($serverapi.'empleados/');
        return view('empleados.empleados')->with('ResulEmpleados', json_decode($response,true)); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::post('http://localhost:3000/empleados', [
            'COD_EMPLEADO' => $request->input('COD_EMPLEADO'),           
            'COD_PERSONA' => $request ->input('COD_PERSONA'),
            'NOM_EMPLEADO' => $request ->input('NOM_EMPLEADO'),
            'APE_EMPLEADO' => $request ->input('APE_EMPLEADO'),
            'ROL_EMPLEADO' => $request ->input('ROL_EMPLEADO'),
            'FEC_CONTRATACION' => $request ->input('FEC_CONTRATACION'),                     
            'SALARIO' => $request ->input('SALARIO'),
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/empleados')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cod_empleado)
    {
        $response = Http::get('http://localhost:3000/empleados/'.$cod_empleado);
        $personaData = json_decode($response->body(), true);

        return view('empleados.detalle')->with('personaData', $personaData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $persona = Http::get("http://localhost:3000/empleados/{$id}")->json();
        
        return view('empleados.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::put("http://localhost:3000/empleados/{$id}", [
            'COD_EMPLEADO' => $request->input('COD_EMPLEADO'),
            'COD_PERSONA' => $request->input('COD_PERSONA'),
            'NOM_EMPLEADO' => $request ->input('NOM_EMPLEADO'),
            'APE_EMPLEADO' => $request ->input('APE_EMPLEADO'),
            'ROL_EMPLEADO' => $request ->input('ROL_EMPLEADO'),
            'FEC_CONTRATACION' => $request ->input('FEC_CONTRATACION'),
            'SALARIO' => $request ->input('SALARIO'),            
            'USR_REGISTRO' => $request ->input('USR_REGISTRO'),
            'FEC_REGISTRO' => $request ->input('FEC_REGISTRO'),
            // ... resto de los campos ...
        ]);

        // Verificar la respuesta de la API y manejarla según sea necesario

        return redirect('/empleados')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            // Realizar la solicitud HTTP para eliminar la persona
            $response = Http::delete("http://localhost:3000/empleados/{$id}");

            // Verificar la respuesta de la API y manejarla según sea necesario
    
            return redirect('/empleados')->with('success', 'Registro eliminado exitosamente');
    }
}