<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  function create()
  {
    return view('register');
  }

  function store(Request $request)
  {
    $user = User::create([
      'name'     => $request->name,
      'lastname' => $request->lastname,
      'email'    => $request->email,
      'password' => Hash::make($request->password),
    ]);

    Auth::login($user);

    return to_route('users.create');
  }
}
