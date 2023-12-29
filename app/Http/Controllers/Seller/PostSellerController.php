<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\ImagesPost;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PostSellerController extends Controller
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
        $request->validate([
            'contenido' => 'required|string',
            'id' => 'required|exists:sucursales,id',
            'imgs.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imagenes = $request->file('imgs');
        $id       = $request->id;
        if ($request->hasFile('imgs')) {
            foreach ($imagenes as $imagen) {
                $nombreImagen = uniqid('imagen_') . '.' . $imagen->getClientOriginalExtension();
                Storage::put('publicaciones/sucursales/' . $nombreImagen, file_get_contents($imagen));
                $guardarImagen = new  ImagesPost([
                    'publicacion_id' => $id  ,
                    'ruta'           => $nombreImagen,
                ]);
                $guardarImagen -> save();
            }
        }
        $Post = new Post([
            'sucursal_id' => $id,
            'contenido'   => $request->input('contenido'),
            'fecha_publicacion' => Carbon::now(),
            'me_gusta'    => 0,
        ]);
        $Post->save();
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
