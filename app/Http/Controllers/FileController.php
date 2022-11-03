<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FileController extends Controller
{
    public function upload_temp(Request $request)
    {
        $request->validate(['image' => 'required|file']);
        $path = $request->file('image')->store('/temp');
        return json_encode(['uploaded_file_path' => $path, 'status' => '200']);
    }
}