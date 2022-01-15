<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentPagesController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendingRequestController;
use App\Http\Controllers\NewsController;

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

Route::post('/news', [NewsController::class, 'news_post'])->name('news-post');

Route::get('/viewmore/{id}', [AdminPagesController::class, 'viewmore'])->name('viewmore'); //pending
Route::get('/more/{id}', [AdminPagesController::class, 'more'])->name('more'); //others

Route::post('/register-form', [UserController::class, 'add_resident'])->name('reg-resident');
//Route::post('/profile', [UserController::class, 'edit_resident'])->name('edit-resident');
Route::match(array('PUT', 'PATCH'), '/profile', [UserController::class, 'edit_resident'])->name('edit-resident');

Route::get('/pending/accept/{pid}', [PendingRequestController::class, 'accept_request'])->name('accept-request');
Route::get('/pending/reject/{pid}', [PendingRequestController::class, 'reject_request'])->name('reject-request');
//Route::match(array('PUT', 'PATCH'), '/pending/{pid}', [PendingRequestController::class, 'reject_request'])->name('reject-request');
