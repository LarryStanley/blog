<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\File;

class FileController extends Controller
{
    public function index() {
    	$files = File::all();
        return $files;
    }

    public function getFile($file_name) {
    	$file = File::where('file_name', $file_name)->firstOrFail();
    	return response()->download("/var/www/blog/public/documents/".$file->name, $file->file_name, []);
    }

    public function getFileInfo($file_name) {
      $file = File::where('file_name', $file_name)->firstOrFail();

      return $file;
    }

    public function new(Request $request) {
    	if ($request->hasFile('files')) {
    		$type = $request->file('files')->getClientMimeType();
    		$name = $request->file('files')->getClientOriginalName();
    		$random_name = substr( md5(rand()), 0, 10);
    		$request->file('files')->move("/var/www/blog/public/documents", $random_name);

    		$file = new File;
    		$file->name = $random_name;
    		$file->file_name = $name;
    		$file->save();

    		return response()->json(
    			["status" => "success", 
				 "file" => ["name" => $name,
				 			"type" => $type ]
			]);
    	}
    }

    public function delete($id) {
      	$file = File::find($id);
      	$file->delete();

      	$files = File::all();

      	return response()->json([
      			"status" => "success",
      			"files" => $files
      		]);
    }
}
