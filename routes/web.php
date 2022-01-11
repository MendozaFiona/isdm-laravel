<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentPagesController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\ResidentPagesController::class, 'profile'])->name('profile');

Route::get('/records', [App\Http\Controllers\AdminPagesController::class, 'records'])->name('records');
Route::get('/grants', [App\Http\Controllers\AdminPagesController::class, 'grants'])->name('grants');
Route::get('/news', [App\Http\Controllers\AdminPagesController::class, 'news'])->name('news');
Route::get('/pending', [App\Http\Controllers\AdminPagesController::class, 'pending'])->name('pending');
Route::get('/viewmore', [App\Http\Controllers\AdminPagesController::class, 'viewmore'])->name('viewmore');