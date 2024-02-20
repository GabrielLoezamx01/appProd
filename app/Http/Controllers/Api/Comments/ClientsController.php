<?php

namespace App\Http\Controllers\Api\Comments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentsClients;
use App\Models\PublicacionesClientes;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['message' => 'No records found for this post ID'], 404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateRequest($request->all());
        return CommentsClients::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $post =  PublicacionesClientes::where('id',$id)->with('categoria','data')->get();
        if(count($post)){
            $comments = CommentsClients::where('idpost', $id)
            ->with('data')
            ->get();
            if ($comments->isEmpty()) {
                return response()->json(['message' => 'No records found for this post ID'], 404);
            }
            return response()->json(['post' => $post, 'comments' => $comments]);
        }
        return response()->json(['message' => 'No records found for this post ID'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validateRequest($request->all());
        $comment = CommentsClients::find($id);
        $comment->update($request->all());
        return $comment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return CommentsClients::destroy($id);
    }

     /**
     * Validate the request.
     * @param array $request
     */
    private function validateRequest(array $request)
    {
        return request()->validate([
            'idpost' => 'required',
            'content' => 'required',
            'id_user' => 'required|exists:users,id'
        ]);
    }
}
