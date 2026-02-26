<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // DATA TABEL (JOIN LENGKAP)
        $aspirasi = DB::table('aspirasi')
            ->join('pelaporan','aspirasi.id_pelaporan','=','pelaporan.id_pelaporan')
            ->join('siswa','pelaporan.nis','=','siswa.nis')
            ->join('kategori','aspirasi.id_kategori','=','kategori.id_kategori')
            ->select(
                'aspirasi.*',
                'pelaporan.isi_laporan',
                'pelaporan.tanggal',
                'siswa.nis',
                'siswa.kelas',
                'kategori.ket_kategori as nama_kategori'
            )
            ->get();

        // STATISTIK
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