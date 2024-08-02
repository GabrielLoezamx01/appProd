<?php

namespace App\Http\Controllers\Branches;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sucursal;
class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $branch = Sucursal::find($request->id);
        $branch->nombre = $request->nombre;
        $branch->direccion = $request->direccion;
        $branch->codigo_postal = $request->codigo_postal;
        $branch->acerca_de_nosotros = $request->acerca_de_nosotros;
        $branch->estado = $request->estado;
        $branch->ciudad = $request->ciudad;
        $branch->update();
        return response()->json(['message' => 'Data stored successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
