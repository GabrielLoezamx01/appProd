<?php

namespace App\Http\Controllers\Api\Comments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentsClients;

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
        $comments = CommentsClients::where('idpost', $id)
        ->join('data_users', 'comments_clients.id_user', '=', 'data_users.id')
        ->select('comments_clients.*', 'data_users.nombres', 'data_users.apellidos', 'data_users.fotodeperfil')
        ->get();
        if ($comments->isEmpty()) {
            return response()->json(['message' => 'No records found for this post ID'], 404);
        }
        return $comments;
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