<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthSiswaController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Hash;

Route::get('/hash', function () {
    return Hash::make('12345');
});

/* ======================
   HALAMAN LOGIN
====================== */

Route::get('/', [AuthController::class,'formLogin']);
Route::post('/login', [AuthController::class,'login']);

/* ======================
   DASHBOARD ADMIN
====================== */

Route::get('/admin', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');

/* ======================
   DASHBOARD SISWA
====================== */

Route::get('/reset-siswa', function () {

    DB::table('siswa')
        ->where('nis', 232820)
        ->update([
            'password' => Hash::make('12345')
        ]);

    return 'Password siswa berhasil direset';
});

Route::get('/dashboard-siswa', function () {

    if (session('role') != 'siswa') {
        return redirect('/');
    }

    return view('siswa.dashboard');
});

Route::post('/kirim-aspirasi', [SiswaController::class,'kirimAspirasi']);

/* ======================
   LOGOUT
====================== */

Route::get('/logout', [AuthController::class,'logout']);