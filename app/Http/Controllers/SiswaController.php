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
    ->where('aspirasi.id_siswa', $id)
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
    // 1. Simpan ke tabel pelaporan
    $idPelaporan = DB::table('pelaporan')->insertGetId([
        'nis' => session('nis'),
        'isi_laporan' => $request->isi,
        'tanggal' => now(),
        'lokasi' => $request->lokasi
    ]);

    // 2. Simpan ke tabel aspirasi
    DB::table('aspirasi')->insert([
        'id_pelaporan' => $idPelaporan,
        'id_siswa' => session('nis'),
        'id_kategori' => $request->kategori, // WAJIB ADA
        'status' => 'Menunggu',
        'feedback' => null
    ]);

    return back()->with('success','Aspirasi berhasil dikirim');
}

public function create()
{
    return view('siswa.aspirasi');
}
}