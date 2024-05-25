<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index(Request $request)
  {
    return view('register');
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'name' => 'required|min:3|max:255',
      'email' => 'required|email|unique:users,email',
      'company' => '',
      'password' => 'required|min:8',
      'password_confirmation' => 'required|same:password',
    ], [
      'password_confirmation.same' => 'The password confirmation does not match.',
    ]);

    $data['password'] = bcrypt($data['password']);

    $user = User::create($data);

    auth()->login($user);
    event(new Registered($user));

    session()->flash('alertType', 'success');
    session()->flash('alertMessage', 'You have been registered');

    return redirect()->route('verification.notice');
  }
}
