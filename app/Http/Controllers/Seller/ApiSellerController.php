<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sucursal;
use Illuminate\Support\Facades\Auth;

class ApiSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seller = Sucursal::where('usuario_id', Auth::id())->get();
        if (count($seller)) {
            return $seller;
        }else{
            return response()->json(['message' => 'Sin Sucursales Registradas'], 201);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'info' => 'required|string',
            'postal' => 'required|numeric',
            'Dirrecion' => 'required|string',
            'estado' => 'required|string',
            'ciudad' => 'required|string',
            'Correo' => 'required|email',
        ]);
        $sucursal = new Sucursal([
            'nombre' => $request->input('name'),
            'acerca_de_nosotros' => $request->input('info'),
            'codigo_postal' => $request->input('postal'),
            'direccion' => $request->input('Dirrecion'),
            'estado' => $request->input('estado'),
            'ciudad' => $request->input('ciudad'),
            'facebook' => $request->input('Facebook'),
            'tiktok' => $request->input('Tiktok'),
            'instagram' => $request->input('Instagram'),
            'twitter' => $request->input('X'),
            'whatsapp' => $request->input('Whatsapp'),
            'correo' => $request->input('Correo'),
            'rango_estrellas' => 0,
            'usuario_id' => Auth::id()
        ]);
        $sucursal->save();
        return response()->json(['message' => '¡Validación exitosa y almacenamiento realizado con éxito!']);
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
