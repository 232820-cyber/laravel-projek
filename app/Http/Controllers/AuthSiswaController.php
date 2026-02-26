<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthSiswaController extends Controller
{
    public function formLogin()
    {
        return view('siswa.login');
    }

    public function login(Request $request)
    {
        $siswa = DB::table('siswa')
            ->where('nis', $request->nis)
            ->first();

        if($siswa && Hash::check($request->password, $siswa->password))
        {
            session([
                'login_siswa' => true,
                'nis' => $siswa->nis,
                'nama' => $siswa->nama,
                'kelas' => $siswa->kelas
            ]);

            return redirect('/dashboard-siswa');
        }

        return back()->with('error','NIS atau Password salah');
    }

    public function dashboard()
    {
        if(!session('login_siswa')){
            return redirect('/login-siswa');
        }

        return view('siswa.dashboard');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login-siswa');
    }
}