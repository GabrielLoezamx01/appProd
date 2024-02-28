<?php

namespace App\Http\Controllers\Api\Publications\Shared;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SharedClients;
use Illuminate\Support\Facades\Auth;
class ClientsSharedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SharedClients::where('user_id', Auth::id())->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_post' => 'required|exists:publicaciones,id'
        ]);
        $shared = SharedClients::create([
            'user_id' => Auth::id(),
            'id_post' => $request->id_post
        ]);
        return response()->json($shared, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return SharedClients::where('id_post', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_post' => 'required|exists:publicaciones,id'
        ]);
        $shared = SharedClients::where('id_post', $id)->first();
        $shared = $shared->update([
            'user_id' => Auth::id(),
            'id_post' => $request->id_post
        ]);
        return response()->json($shared, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return SharedClients::where('id_post', $id)->delete();
    }
}
