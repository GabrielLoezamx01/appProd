<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DataUsers::find(Auth::id());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'user_id' => 'required|integer',
            'codigopostal' => 'required|string',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'telefono' => 'required|string',
            'fotodeperfil' => 'nullable|string',
            'estado' => 'required|string',
            'ciudad' => 'required|string',
            'direccion' => 'required|string',
        ];

        // Validar los datos
        try {
            $validatedData = $this->validate($request, $rules);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        DataUsers::store($validatedData);
        return response()->json(['message' => 'Datos almacenados con éxito'], 201);
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
