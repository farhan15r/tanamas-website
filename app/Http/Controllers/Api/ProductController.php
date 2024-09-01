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
      'item_no' => 'required|string',
      'category_id' => 'required|exists:categories,id',
      'images' => 'required|array',
    ]);

    $images = array_map(function ($imagePath) {
      return ['path' => $imagePath];
    }, $request->images);

    $product = Product::create($request->only(['name', 'item_no', 'category_id']));
    $product->images()->createMany($images);

    $message = 'Product created successfully';

    return response()->json([
      'message' => $message,
      'redirect' => route('admin.products.index', ['alertType' => 'success', 'alertMessage' => $message]),
    ]);
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'name' => 'required|string',
      'item_no' => 'required|string',
      'category_id' => 'required|exists:categories,id',
      'images' => 'required|array',
    ]);

    $product = Product::find($id);
    $product->update($request->only(['name', 'item_no', 'category_id']));

    $images = array_map(function ($imagePath) {
      return ['path' => $imagePath];
    }, $request->images);

    $product->images()->delete();
    $product->images()->createMany($images);

    $message = 'Product updated successfully';

    return response()->json([
      'message' => $message,
      'redirect' => route('admin.products.index', ['alertType' => 'success', 'alertMessage' => $message]),
    ]);
  }
}
