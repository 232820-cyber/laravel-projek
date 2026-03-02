<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function dashboard()
    {
        // cek login siswa
        if (session('role') != 'siswa') {
            return redirect('/');
        }

        $id = Session::get('nis');

        $aspirasi = DB::table('aspirasi')
    ->join('kategori','aspirasi.id_kategori','=','kategori.id_kategori')
    ->where('id_siswa', $id)
    ->select(
        'aspirasi.*',
        'kategori.ket_kategori as nama_kategori'
    )
    ->get();
        $kategori = DB::table('kategori')->get();


        return view('siswa.dashboard', compact('aspirasi','kategori'));
    }

    public function kirimAspirasi(Request $request)
    {
        DB::table('aspirasi')->insert([
            'id_siswa' => Session::get('nis'),
            'id_kategori' => $request->kategori,
            'isi' => $request->isi,
            'status' => 'Menunggu'
        ]);

        return back()->with('success','Aspirasi berhasil dikirim');
    }
    public function create()
{
    $kategori = DB::table('kategori')->get();

    return view('siswa.aspirasi', compact('kategori'));
}
}