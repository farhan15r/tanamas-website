<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
  public function index()
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

  public function forgotPassword()
  {
    return view('auth.forgot-password');
  }

  public function sendResetLinkEmail(Request $request)
  {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
      $request->only('email')
    );

    if ($status === Password::RESET_LINK_SENT) {
      session()->flash('alertMessage', __($status));
      return back();
    } else {
      session()->flash('alertType', 'danger');
      session()->flash('alertMessage', __($status));
      return back();
    }
  }

  public function resetPassword(Request $request)
  {
    return view('auth.reset-password', ['token' => $request->token]);
  }

  public function updatePassword(Request $request)
  {
    $request->validate([
      'token' => 'required',
      'email' => 'required|email',
      'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
      $request->only('email', 'password', 'password_confirmation', 'token'),
      function (User $user, string $password) {
        $user->forceFill([
          'password' => bcrypt($password)
        ])->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));
      }
    );

    if ($status === Password::PASSWORD_RESET) {
      session()->flash('alertType', 'success');
      session()->flash('alertMessage', __($status));
      return redirect()->route('login.index');
    } else {
      session()->flash('alertType', 'danger');
      session()->flash('alertMessage', __($status));
      return back()->withInput($request->only('email'));
    }
  }
}
