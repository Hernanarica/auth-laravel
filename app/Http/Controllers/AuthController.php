<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  function login(Request $request)
  {
    if (Auth::attempt($request->only('email', 'password'))) {
      $user = $request->user();
      $token = $user->createToken('api-token')->plainTextToken;

      return response()->json([
        'user'  => $user,
        'token' => $token,
      ]);
    }
  }

  function logout()
  {
    $user = auth()->user();

    $user->tokens()->delete();

    return response()->json([
      'status' => 'success',
    ]);
  }
}
