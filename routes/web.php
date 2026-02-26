<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;

use App\Http\Controllers\AuthSiswaController;

/* ======================
   HALAMAN LOGIN
====================== */

Route::get('/', [AuthController::class,'formLogin']);
Route::post('/login', [AuthController::class,'login']);

/* ======================
   DASHBOARD ADMIN
====================== */
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

/* ======================
   DASHBOARD SISWA
====================== */

Route::get('/dashboard-siswa', function(){
    return view('siswa.dashboard');
});

/* ======================
   LOGOUT
====================== */

Route::get('/logout', [AuthController::class,'logout']);
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
});
