<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('welcome'); // halaman login kamu
    }

    public function login(Request $request)
    {
    $username = $request->username;
    $password = $request->password;

        /* =======================
           CEK ADMIN
        ======================= */

        $admin = DB::table('admin')
    ->where('username', $username)
    ->first();

if ($admin && Hash::check($password, $admin->password)) {
    session([
        'role' => 'admin',
        'nama' => $admin->nama
    ]);
    return redirect('/admin');
}

$siswa = DB::table('siswa')
    ->where('nis', $username)
    ->first();

        if($siswa && Hash::check($password, $siswa->password))
        {
            session([
                'role' => 'siswa',
                'nis' => $siswa->nis,
                'kelas' => $siswa->kelas
            ]);

            return redirect('/dashboard-siswa');
        }

        return back()->with('error','Username / NIS atau password salah');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}