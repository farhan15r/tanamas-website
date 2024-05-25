<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailController extends Controller
{
  public function index()
  {
    return view('auth.verify-email');
  }

  public function verify(EmailVerificationRequest $request)
  {
    $request->fulfill();

    session()->flash('alertType', 'success');
    session()->flash('alertMessage', 'Your email has been verified!');

    return redirect('/');
  }

  public function send(Request $request)
  {
    $request->user()->sendEmailVerificationNotification();

    session()->flash('alertType', 'success');
    session()->flash('alertMessage', 'Verification link sent!');

    return back();
  }
}
