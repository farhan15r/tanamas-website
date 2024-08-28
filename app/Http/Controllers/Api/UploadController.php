<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
  public function image(Request $request)
  {
    $request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
    ]);

    $image = $request->file('image');
    $imageName = time() . '.' . $image->extension();
    $image->storeAs('public/images', $imageName);

    return response()->json([
      'message' => 'Image uploaded successfully!',
      'data' => [
        'url' => asset('storage/images/' . $imageName),
      ]
    ]);
  }
}
