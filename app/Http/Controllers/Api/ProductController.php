<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string',
      'sku' => 'required|string',
      'description' => 'required|string',
      'category_id' => 'required|exists:categories,id',
      'images' => 'required|array',
    ]);

    $images = array_map(function ($imagePath) {
      return ['path' => $imagePath];
    }, $request->images);

    $product = Product::create($request->only(['name', 'sku', 'description', 'category_id']));
    $product->images()->createMany($images);

    $message = 'Product created successfully';

    return response()->json([
      'message' => $message,
      'redirect' => route('admin.products.index', ['alertType' => 'success', 'alertMessage' => $message]),
    ]);
  }
}
