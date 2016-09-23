<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavigationController extends Controller
{

	public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin/navigation');
    }
}
