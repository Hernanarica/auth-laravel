<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  function login(Request $request)
  {
    $credentials = $request->validate([
      'email'    => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerateToken();

      return response()->json([
        'status' => 'success',
        'user'   => $request->user(),
      ]);
    }

    return response()->json([
      'Error' => 'Credenciales incorrectas'
    ]);
  }

  function logAuth(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return response()->json([
      'status' => 'success'
    ]);
  }
}
