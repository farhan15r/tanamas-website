<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function index()
  {
    return view('login');
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    if (!auth()->attempt($data)) {
      session()->flash('alertType', 'danger');
      session()->flash('alertMessage', 'Invalid credentials! Please try again.');

      return back()->withInput();
    }

    // delete all previous tokens
    auth()->user()->tokens()->delete();

    session()->flash('alertType', 'success');
    session()->flash('alertMessage', 'You have been logged in!');

    User::where('id', auth()->id())->update(['last_login' => now()]);

    $source = $request->input('redirect') ?? route('index');

    return redirect()->to($source);
  }

  public function destroy(Request $request)
  {
    auth()->user()->tokens()->delete();
    auth()->logout();

    session()->flash('alertType', 'success');
    session()->flash('alertMessage', 'You have been logged out!');

    return redirect()->route('index');
  }
}
