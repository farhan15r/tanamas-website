<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('index');
})->name('index');

Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'store'])->name('login.create');
