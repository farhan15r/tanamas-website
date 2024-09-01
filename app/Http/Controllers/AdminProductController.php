<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
  public function index(Request $request)
  {
    $products = Product::with(['category'])->get();

    $data = [
      'products' => $products,
    ];

    if ($request->alertType && $request->alertMessage) {
      session()->flash('alertType', $request->alertType);
      session()->flash('alertMessage', $request->alertMessage);
      // remove the alertType and alertMessage from the query string
      return redirect()->route('admin.products.index');
    } else {
      return view('admin.products.index', $data);
    }
  }

  public function create()
  {
    $uploadImageToken = auth()->user()->createToken('upload-image')->plainTextToken;
    $createProductToken = auth()->user()->createToken('create-product')->plainTextToken;
    $categories = Category::all();

    $data = [
      'uploadImageToken' => $uploadImageToken,
      'createProductToken' => $createProductToken,
      'categories' => $categories,
    ];

    return view('admin.products.create', $data);
  }

  public function edit($id){
    $product = Product::with('images')->find($id);

    $uploadImageToken = auth()->user()->createToken('upload-image')->plainTextToken;
    $updateProductToken = auth()->user()->createToken('update-product')->plainTextToken;
    $categories = Category::all();

    $data = [
      'product' => $product,
      'uploadImageToken' => $uploadImageToken,
      'updateProductToken' => $updateProductToken,
      'categories' => $categories,
    ];

    return view('admin.products.edit', $data);
  }

  public function destroy($id)
  {
    $product = Product::with('images')->find($id);

    if ($product) {
      $this->deleteImage($product->images);
      $product->delete();
      $alertType = 'success';
      $alertMessage = 'Product deleted successfully';
    } else {
      $alertType = 'danger';
      $alertMessage = 'Product not found';
    }

    return redirect()->route('admin.products.index', [
      'alertType' => $alertType,
      'alertMessage' => $alertMessage,
    ]);
  }

  private function deleteImage($images)
  {
    foreach ($images as $image) {
      $path = public_path($image->path);
      if (file_exists($path)) {
        unlink($path);

        $image->delete();
      }
    }
  }
}
