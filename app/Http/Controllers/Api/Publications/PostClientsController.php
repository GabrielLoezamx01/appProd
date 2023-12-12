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
       return PublicacionesClientes::with(['usuario', 'categoria'])
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'desc') // Order by the created_at column in descending order
        ->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categorias,id',
            'content'     => 'required|string',
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
        return PublicacionesClientes::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publicacion = PublicacionesClientes::find($id);
        if ($publicacion) {
            $request->validate([
                'contenido' => 'required|string',
                'categoria_id' => 'exists:categorias,id',
            ]);
            $user_id = Auth::id();
            $publicacion->update([
                'user_id'      => $user_id,
                'contenido'    => $request->input('contenido'),
                'categoria_id' => $request->input('categoria_id'),
                'me_gusta'     => 0,
            ]);
            return response()->json(['data' => $publicacion], 200);
        } else {
            return response()->json(['error' => 'La publicación no se encontró'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publicacionAEliminar = PublicacionesClientes::find($id);
        if ($publicacionAEliminar) {
            $publicacionAEliminar->delete();
            return response()->json(['message' => 'La publicación fue eliminada correctamente'], 200);
        } else {
            return response()->json(['error' => 'La publicación no se encontró'], 404);
        }
    }
}
