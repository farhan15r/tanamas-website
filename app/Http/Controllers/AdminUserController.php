<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminUserController extends Controller
{
  public function index()
  {
    $users = User::with('roles')->get();

    $data = [
      'users' => $users,
    ];

    return view('admin.users', $data);
  }
}
