<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

/* LOGIN */
Route::get('/', [AuthController::class,'formLogin']);
Route::post('/login', [AuthController::class,'login']);
Route::get('/logout', [AuthController::class,'logout']);

/* ADMIN */
Route::get('/admin', [AdminController::class,'dashboard'])
    ->name('admin.dashboard');

/* RESET */
Route::get('/reset-siswa', function () {
    DB::table('siswa')
        ->where('nis', 232820)
        ->update([
            'password' => Hash::make('12345')
        ]);

    return 'Password siswa berhasil direset';
});

/* SISWA */

Route::get('/siswa', [SiswaController::class,'dashboard'])
    ->name('siswa.dashboard');

Route::get('/siswa/aspirasi', [SiswaController::class,'create'])
    ->name('siswa.aspirasi');

Route::post('/kirim-aspirasi', [SiswaController::class,'kirimAspirasi'])
    ->name('siswa.kirim');