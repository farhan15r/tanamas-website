<?php

namespace App\Http\Controllers;

use App\Models\Product;

class AdminProductController extends Controller
{
  public function index()
  {
    $products = Product::with('roles')->get();

    $data = [
      'products' => $products,
    ];

    return view('admin.products.index', $data);
  }

  public function create()
  {
    $uploadImageToken = auth()->user()->createToken('upload-image')->plainTextToken;

    $data = [
      'uploadImageToken' => $uploadImageToken,
    ];

    return view('admin.products.create', $data);
  }
}
