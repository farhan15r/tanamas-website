<?php

use App\Http\Controllers\Api\UploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('upload')->name('api.upload.')->group(function () {
  Route::post('/image', [UploadController::class, 'image'])->middleware(['auth:sanctum', 'ability:upload-image'])->name('image');
});
