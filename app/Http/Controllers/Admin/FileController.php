<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function index() {
        return "123";
    }

    public function new() {
    	return view('admin/upload_file');
    }
}
