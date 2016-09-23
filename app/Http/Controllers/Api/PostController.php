<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PostController extends Controller
{

    public function index() {
        $result = Post::all();

        return response()->json($result);
    }

    public function getPost($id) {
        $result = Post::find($id);
        $result->created_user;
        $result->edited_user;

        return response()->json($result);
    }

    public function new(Request $request) {

        $post = new Post;

        $post->title = $request->title;
        $post->content = $request->content;
        $post->created_user_id = Auth::user()->id;
        $post->edited_user_id = Auth::user()->id;
        if ($request->draft)
            $post->draft = true;
        else            
            $post->draft = false;

        $post->save();

        return response()->json(["status" => "success"]);
    }

    public function edit(Request $request, $id) {
        $post = Post::find($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->edited_user_id = Auth::user()->id;
        if ($request->draft)
            $post->draft = true;
        else            
            $post->draft = false;

        $post->save();

        return response()->json(["status" => "success"]);
    }

    public function delete($id) {
        Post::destroy($id);

        return response()->json(["status" => "success"]);
    }
}
