<?php

namespace App\Http\Controllers\Api\Publications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LikesPost;
use Illuminate\Support\Facades\Auth;
class LikesPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return LikesPost::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        LikesPost::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return LikesPost::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $where = [
                'publicacion_id' => $id,
                'user_id'        => Auth::id()
            ];
            LikesPost::where($where)->delete();
            return response()->json(['message' => 'Registro eliminado correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'No se pudo eliminar el registro'], 500);
        }
    }
}
