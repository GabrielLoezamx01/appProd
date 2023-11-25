<?php

namespace App\Http\Controllers\Api\Publications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublicacionesClientes;
use Illuminate\Support\Facades\Auth;
class PostClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PublicacionesClientes::with(['usuario','categoria'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categorias,id',
            'content' => 'required|string',
        ]);
        $publicacion = new PublicacionesClientes([
            'user_id'      => Auth::id(),
            'categoria_id' => $request->category_id,
            'contenido'    => $request->content,
        ]);
        $publicacion->save();
        return response()->json(['message' => 'Publicación creada con éxito', 'publicacion' => $publicacion], 201);
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
