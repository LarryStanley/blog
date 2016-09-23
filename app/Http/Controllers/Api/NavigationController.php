<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Api;

use App\Navigation;
use App\Sub_navigation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavigationController extends Controller
{

    public function index() {
        $result = Navigation::all();
        foreach ($result as $key => $value) {
            $value->sub_navigation;
        }
        return response()->json($result);
    }

    public function new(Request $request) {
        $navigation = new Navigation;

        $navigation->title = $request->title;
        $navigation->sub_nav = $request->sub_nav;
        $navigation->url = $request->url;

        $navigation->save();

        return response()->json(["status" => "success", "navigation" => $navigation]);
    }

    public function newSubNav(Request $request, $parent_id) {
        foreach ($request->input('posts') as $key => $value) {
            $sub_nav = new Sub_navigation;

            $sub_nav->title = $value['title'];
            $sub_nav->parent_id = $parent_id;
            $sub_nav->url = "/posts/".$value['id'];

            $sub_nav->save();
        }

        $navigation = Navigation::find($parent_id);
        $navigation->sub_navigation;

        return response()->json(["status" => "success", "navigation" => $navigation]);
    }

    public function deleteNav($id) {
        $navigation = Navigation::find($id);
        $navigation->delete();

        $sub_navigation = Sub_navigation::where("parent_id", $id);
        $sub_navigation->delete();

        $navigation = Navigation::all();
        foreach ($navigation as $key => $value) {
            $value->sub_navigation;
        }

        return response()->json(["status" => "success", "navigation" => $navigation]);

    }

    public function deleteSubNav(Request $request, $id) {
        $sub_navigation = Sub_navigation::find($id);
        $sub_navigation->delete();

        return response()->json(["status" => "success"]);        
    }

}
