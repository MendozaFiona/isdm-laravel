<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentPagesController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [ResidentPagesController::class, 'profile'])->name('profile');
Route::get('/register-form', [ResidentPagesController::class, 'reg_view'])->name('reg-form');

Route::get('/records', [AdminPagesController::class, 'records'])->name('records');
Route::get('/grants', [AdminPagesController::class, 'grants'])->name('grants');
Route::get('/news', [AdminPagesController::class, 'news'])->name('news');
Route::get('/pending', [AdminPagesController::class, 'pending'])->name('pending');
Route::get('/viewmore', [AdminPagesController::class, 'viewmore'])->name('viewmore');

Route::post('/register-form', [UserController::class, 'add_resident'])->name('reg-resident');
Route::post('/profile', [UserController::class, 'edit_resident'])->name('edit-resident');
