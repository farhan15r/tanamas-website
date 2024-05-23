<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $request)
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


      session()->flash('alertType', 'success');
      session()->flash('alertMessage', 'You have been logged in!');

      return redirect()->route('index');
    }
}
