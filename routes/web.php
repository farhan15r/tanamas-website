<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('index');
})->name('index');

Route::get('/register', [UserController::class, 'index'])->name('register.index')->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->name('register.create')->middleware('guest');

Route::get('/login', [AuthController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login', [AuthController::class, 'store'])->name('login.create');
Route::get('/logout', [AuthController::class, 'destroy'])->name('login.destroy');

Route::middleware([Auth::class])->group(function () {
  Route::get('/email/verify', [EmailController::class, 'index'])->name('verification.notice');
  Route::get('/email/verify/{id}/{hash}', [EmailController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
  Route::post('/email/verify', [EmailController::class, 'send'])->middleware(['throttle:6,1'])->name('verification.send');
});
