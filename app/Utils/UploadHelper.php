<?php

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

function upload($file, $path)
{


    $fileName = time() . '.' . $file->extension();
    $fileOriginalName = $file->getClientOriginalName();
    $file->move(public_path($path), $fileName . $fileOriginalName);
    return response()->json([
        'path' => config('app.url') . '/' . $path . '/' . $fileName . $fileOriginalName
    ]);
}
