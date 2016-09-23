<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Navigation;
use App\Sub_navigation;
use App\Post;
class HomeController extends Controller
{
    public function index()
    {
        $navigation = Navigation::all();
        foreach ($navigation as $key => $value) {
            $value->sub_navigation;
        }
        return view('index', ["navigation" => $navigation]);
    }

    public function posts($id) {
        $navigation = Navigation::all();
        foreach ($navigation as $key => $value) {
            $value->sub_navigation;
        }

        $post = Post::find($id);


        return view('posts', ["navigation" => $navigation, "post" => $post]);
    }
}
