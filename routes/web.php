<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('welcome');
})->name('home');

Route::prefix('auth')->group(function () {
  Route::get('redirect', [AuthController::class, 'googleAuthRedirect'])->name('auth.redirect');
  Route::get('callback', [AuthController::class, 'googleAuthLogin'])->name('auth.login');
  Route::post('logout', [AuthController::class, 'googleAuthLogout'])->name('auth.logout');
});

