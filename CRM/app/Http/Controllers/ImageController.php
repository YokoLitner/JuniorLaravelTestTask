<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function imageUpload(Request $request){
        $path = $request->file('image')->store('uploads','public');

        return view('welcome',['path' => $path]);
    }
}
