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
    'siswa.nama as nama_siswa',
    'pelaporan.tanggal',
    'pelaporan.isi_laporan'
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

public function detail($id)
{
    $aspirasi = DB::table('aspirasi')
        ->join('kategori','aspirasi.id_kategori','=','kategori.id_kategori')
        ->join('pelaporan','aspirasi.id_pelaporan','=','pelaporan.id_pelaporan')
        ->join('siswa','aspirasi.id_siswa','=','siswa.nis')
        ->where('aspirasi.id_aspirasi', $id)
        ->select(
            'aspirasi.*',
            'kategori.ket_kategori as nama_kategori',
            'pelaporan.isi_laporan',
            'pelaporan.tanggal',
            'pelaporan.lokasi',
            'siswa.nama as nama_siswa'
        )
        ->first();

    if(!$aspirasi){
        abort(404);
    }

    return view('admin.detail', compact('aspirasi'));
}

public function update(Request $request, $id)
{
    DB::table('aspirasi')
        ->where('id_aspirasi', $id)
        ->update([
            'status' => $request->status,
            'feedback' => $request->feedback
        ]);

    return redirect()->route('admin.detail', $id)
                     ->with('success','Status berhasil diperbarui');
}

}