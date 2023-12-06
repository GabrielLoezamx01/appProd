<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataUser = DataUsers::where('user_id', Auth::id())->first();
        return $dataUser;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'codigopostal' => 'required',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'telefono' => 'required',
            'estado' => 'required|string',
            'ciudad' => 'required|string',
            'direccion' => 'required|string',
        ];
        try {
            $validatedData = $this->validate($request, $rules);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        $existingRecord = DataUsers::where('user_id', Auth::id())->first();
        if ($existingRecord) {
            $existingRecord->update($validatedData);
        } else {
            $validatedData['user_id'] = Auth::id();
            DataUsers::create($validatedData);
        }
        return response()->json(['message' => 'Datos almacenados con éxito'], 200);
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
    public function update(Request $request)
    {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $foto               = $request->file('foto');
        $nombreImagen       = time() . '_' . $foto->getClientOriginalName();
        $ruta               = $foto->storeAs('public/fotos_perfil', $nombreImagen);
        $existingRecord     = DataUsers::where('user_id', Auth::id())->first();
        if ($existingRecord) {
            $nombreFotoAnterior = $existingRecord->fotodeperfil;
            if ($nombreFotoAnterior) {
                Storage::delete('public/fotos_perfil/' . $nombreFotoAnterior);
            }
            $existingRecord->update(['fotodeperfil' => $nombreImagen]);
        } else {
            $validatedData = [
                'codigopostal' => '',
                'nombres' => '',
                'apellidos' => '',
                'telefono' => '',
                'estado' => '',
                'ciudad' => '',
                'direccion' => '',
            ];
            $validatedData['user_id']      = Auth::id();
            $validatedData['fotodeperfil'] = $nombreImagen;
            DataUsers::insert($validatedData);
        }
        return back()->with('success', "Imagen de perfil '$nombreImagen' actualizada correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
