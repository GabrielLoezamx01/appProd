<?php

namespace App\Http\Controllers\Api\Comments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentsClients;
use App\Models\PublicacionesClientes;
use Illuminate\Support\Facades\Auth;

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
        $items = [
            'idpost'  => $request->idpost,
            'id_user' => Auth::user()->id,
            'content' => $request->content,
        ];
        return CommentsClients::create( $items );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $post =  PublicacionesClientes::where('id',$id)->with('categoria','data')->get();
        if(count($post)){
            $comments = CommentsClients::with('data')->where('idpost', $id)->orderBy('created_at', 'asc')->paginate(4);
            return response()->json(['post' => $post, 'comments' => $comments]);
        }
        return response()->json(['message' => 'No records found for this post ID'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $items = [
            'idpost'  => $id,
            'id_user' => Auth::user()->id,
            'content' => $request->content,
        ];
        $comment = CommentsClients::find($id);
        $comment->update($items);
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
