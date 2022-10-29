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
Route::get('/login/admin', [AuthController::class, 'loginAdmin'])->name('loginAdmin')->middleware('guest');
Route::get('/login/user', [AuthController::class, 'loginUser'])->name('loginUser')->middleware('guest');
Route::post('/login/authenticate', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

// Admin endpoint
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');
Route::get('/admin/index_data', [AdminController::class, 'indexData'])->middleware('auth');
Route::get('/admin/data_pemilih', [AdminController::class, 'dataPemilih'])->middleware('auth');
Route::post('/admin/import_data', [AdminController::class, 'importData']);
Route::delete('/admin/data_pemilih', [AdminController::class, 'deleteDataPemilih']);
