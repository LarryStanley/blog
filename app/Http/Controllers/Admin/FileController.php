<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function index() {
        return view('admin/files');
    }

    public function new() {
    	return view('admin/upload_file');
    }
}
