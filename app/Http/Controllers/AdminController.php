<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
{
   $aspirasi = DB::table('aspirasi')
        ->leftJoin('kategori', 'aspirasi.id_kategori', '=', 'kategori.id_kategori')
        ->leftJoin('siswa', 'aspirasi.id_siswa', '=', 'siswa.nis')
        ->leftJoin('pelaporan', 'aspirasi.id_pelaporan', '=', 'pelaporan.id_pelaporan')
        ->select(
            'aspirasi.*',
            'kategori.ket_kategori as nama_kategori',
            'siswa.nis',
            'pelaporan.tanggal'
        )
        ->orderBy('aspirasi.id_aspirasi', 'desc')
        ->get();

    $total = DB::table('aspirasi')->count();

    $menunggu = DB::table('aspirasi')
        ->where('status','Menunggu')
        ->count();

    $diproses = DB::table('aspirasi')
        ->where('status','Diproses')
        ->count();

    $selesai = DB::table('aspirasi')
        ->where('status','Selesai')
        ->count();

    return view('admin.dashboard', compact(
        'aspirasi',
        'total',
        'menunggu',
        'diproses',
        'selesai'
    ));
}


}