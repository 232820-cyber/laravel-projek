<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function dashboard()
    {
        if (session('role') != 'siswa') {
            return redirect('/');
        }

        $id = Session::get('nis');

        $aspirasi = DB::table('aspirasi')
            ->join('kategori','aspirasi.id_kategori','=','kategori.id_kategori')
            ->join('pelaporan','aspirasi.id_pelaporan','=','pelaporan.id_pelaporan')
            ->where('aspirasi.id_siswa', $id)
            ->select(
                'aspirasi.*',
                'kategori.ket_kategori as nama_kategori',
                'pelaporan.isi_laporan',
                'pelaporan.tanggal',
                'pelaporan.lokasi'
            )
            ->get();

        return view('siswa.dashboard', compact('aspirasi'));
    }

    public function create()
{
    $kategori = DB::table('kategori')->get();

    return view('siswa.aspirasi', compact('kategori'));
}

    public function kirimAspirasi(Request $request)
    {
        $idPelaporan = DB::table('pelaporan')->insertGetId([
            'nis' => session('nis'),
            'isi_laporan' => $request->isi,
            'tanggal' => now(),
            'lokasi' => $request->lokasi
        ]);

        DB::table('aspirasi')->insert([
            'id_pelaporan' => $idPelaporan,
            'id_siswa' => session('nis'),
            'id_kategori' => $request->kategori,
            'status' => 'Menunggu',
            'feedback' => null
        ]);

        return redirect()->route('siswa.create')
               ->with('success','Aspirasi berhasil dikirim');
    }

    
}