<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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

// Auth endpoint
Route::get('/login/admin', [AuthController::class, 'login_admin'])->name('login_admin')->middleware('guest');
Route::get('/login/user', [AuthController::class, 'login_user'])->name('login_user')->middleware('guest');
Route::post('/login/authenticate', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

// Admin endpoint
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');
Route::get('/admin/index_data', [AdminController::class, 'index_data']);
Route::get('/admin/data_pemilih', [AdminController::class, 'data_pemilih']);
