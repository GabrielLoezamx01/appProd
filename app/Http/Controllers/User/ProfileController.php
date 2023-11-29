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
        $nameIMG = '';
        try {
            $validatedData = $this->validate($request, $rules);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
        if ($request->hasFile('fotoPerfil')) {
            // Obtener el archivo
            $file = $request->file('fotoPerfil');
            // Generar un nombre único para el archivo
            $fileName = time() . '_' . $file->getClientOriginalName();
            // Mover el archivo a la carpeta de almacenamiento
            $file->move(public_path('uploads'), $fileName);
            // Agregar el nombre del archivo a los datos validados
            $nameIMG = $fileName;
        }
        $validatedData['user_id']    = Auth::id();
        $validatedData['fotoPerfil'] = $nameIMG;
        DataUsers::create($validatedData);
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
