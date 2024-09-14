<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index(Request $request)
  {
    $products = Product::with(['category', 'images'])->paginate(20);

    $data = [
      'products' => $products,
    ];

    if ($request->alertType && $request->alertMessage) {
      session()->flash('alertType', $request->alertType);
      session()->flash('alertMessage', $request->alertMessage);
      // remove the alertType and alertMessage from the query string
      return redirect()->route('admin.products.index');
    } else {
      return view('products.index', $data);
    }
  }
}
