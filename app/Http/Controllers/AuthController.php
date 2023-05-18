<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
  function googleAuthLogin(string $accessToken)
  {
    $user = Socialite::driver('google')->userFromToken($accessToken);

    $user = User::updateOrCreate([
      'google_id' => $user->id,
    ], [
      'name'                 => $user->name,
      'email'                => $user->email,
      'avatar'               => $user->avatar,
      'google_token'         => $user->token,
      'google_refresh_token' => $user->refreshToken,
    ]);

    return response()->json([
      'status' => 'success',
      'user'   => $user,
      'token'  => $user->createToken('api_token')->plainTextToken,
    ]);
  }

  function googleAuthLogout(Request $request)
  {
    $user = $request->user();
    $user->tokens()->delete();

    return response()->json([
      'status' => 'success'
    ]);
  }
}
