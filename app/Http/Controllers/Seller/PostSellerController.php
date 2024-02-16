<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\ImagesPost;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Tools\ResponseApi as Api;
class PostSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    private function requestStore(){
        return [
            'contenido' => 'required|string',
            'id'        => 'required|exists:sucursales,id',
            'imgs.*'    => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request  -> validate( $this -> requestStore() );
        $id         = $request->id;
        $dataInsert = [
            'sucursal_id'       => $id,
            'contenido'         => nl2br($request->input('contenido')),
            'fecha_publicacion' => Carbon::now(),
            'me_gusta'          => 0,
        ];
        $Post = new Post( $dataInsert );
        $Post -> save();
        $imagenes = $request->file('imgs');
        if ($request->hasFile('imgs')) {
            foreach ($imagenes as $imagen) {
                $nombreImagen = uniqid('imagen_') . '.' . $imagen->getClientOriginalExtension();
                // $nombreImagen       = time() . '_' . $foto->getClientOriginalName();
                $ruta                =  $imagen->storeAs('public/publicaciones/sucursales', $nombreImagen);
                $guardarImagen       = new  ImagesPost([
                    'publicacion_id' => $Post->getAttribute('id'),
                    'ruta'           => $nombreImagen,
                ]);
                $guardarImagen -> save();
            }
        }
       return  Api::success([] , '¡Validación exitosa y almacenamiento realizado con éxito!');
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
