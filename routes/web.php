<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DoRegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DoLoginController;
use App\Http\Controllers\UserAreaController;
use App\Http\Controllers\LogOutController;
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

Route::get('',HomeController::class)->name('home');

Route::get('register',RegisterController::class)->name('register');
Route::post('register',DoRegisterController::class)->name('do-register');

Route::get('login',LoginController::class)->name('login');
Route::post('login',DoLoginController::class)->name('do-login');

Route::get('user-area',UserAreaController::class)->name('user-area');

Route::get('logout',LogOutController::class)->name('logout');
