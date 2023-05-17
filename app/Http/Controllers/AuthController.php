<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
  function googleAuthRedirect()
  {
    return Socialite::driver('google')->redirect();
  }

  function googleAuthLogin()
  {
    $user = Socialite::driver('google')->user();

    $user = User::updateOrCreate([
      'google_id' => $user->id,
    ], [
      'name'                 => $user->name,
      'email'                => $user->email,
      'avatar'               => $user->avatar,
      'google_token'         => $user->token,
      'google_refresh_token' => $user->refreshToken,
    ]);

    Auth::login($user);

    return to_route('home');
  }

  function googleAuthLogout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return to_route('home');
  }
}
