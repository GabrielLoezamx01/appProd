<?php

namespace App\Http\Controllers\Api\Comments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
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
        $validated = $request->validate([
            'idpost'  => 'required',
            'content' => 'required',
        ]);
        $items = [
            'idpost'  => $request->idpost,
            'id_user' => Auth::user()->id,
            'content' => $request->content,
        ];
        return Comments::create($items);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $comments, string $id)
    {
        try {
            $post =  Post::where('id',$id)->with('sucursal', 'images')->get();
            if(count($post)){
                $comments = $comments::with('user.data')->where('idpost', $id)->orderBy('created_at', 'asc')->paginate(4);
                 return response()->json(['post' => $post, 'comments' => $comments]);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'No records found for this post ID'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while retrieving the comments'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validateRequest($request->all());
        $comment = Comments::find($id);
        $comment->update($request->all());
        return $comment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Comments::destroy($id);
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
        ]);
    }



    private function getCommentsData(Comments $comments, string $id)
    {
        return $comments->where('idpost', $id)
            ->join('data_users', 'comments_seller.id_user', '=', 'data_users.id')
            ->select('comments_clients.*', 'data_users.nombres', 'data_users.apellidos', 'data_users.fotodeperfil')
            ->get();
    }
}
