<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('upload')->name('api.upload.')->group(function () {
  Route::post('/image', [UploadController::class, 'image'])->middleware(['auth:sanctum', 'ability:upload-image'])->name('image');
});

Route::prefix('products')->name('api.products.')->group(function () {
  Route::post('/', [ProductController::class, 'store'])->middleware(['auth:sanctum', 'ability:create-product'])->name('store');
});
