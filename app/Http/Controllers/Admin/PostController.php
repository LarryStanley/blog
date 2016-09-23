<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

	public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin/posts');
    }

    public function new() {
        return view('admin/new_posts');
    }

    public function edit($id) {
    	$post = Post::find($id);
    	if ($post)
	    	return view('admin/new_posts', ["post" => $post]);
	    else
	    	return redirect('/admin/posts');
    }
}
