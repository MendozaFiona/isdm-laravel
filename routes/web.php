<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes(); // from bootstrap install

// routes for views/pages display
Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('login');
Route::get('/register', [App\Http\Controllers\PagesController::class, 'register'])->name('register');
Route::get('/dashboard', [App\Http\Controllers\PagesController::class, 'dashboard'])->name('dashboard');

// routes for user transactions
Route::resources([
    'users' => UserController::class,
]);
