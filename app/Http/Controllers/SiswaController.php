<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $id = Session::get('id_siswa');

        $aspirasi = DB::table('aspirasi')
            ->join('kategori','aspirasi.id_kategori','=','kategori.id')
            ->where('id_siswa',$id)
            ->select('aspirasi.*','kategori.nama_kategori')
            ->get();

        $kategori = DB::table('kategori')->get();

        return view('siswa.dashboard', compact('aspirasi','kategori'));
    }

    public function kirimAspirasi(Request $request)
    {
        DB::table('aspirasi')->insert([
            'id_siswa' => Session::get('id_siswa'),
            'id_kategori' => $request->kategori,
            'isi' => $request->isi,
            'status' => 'Menunggu'
        ]);

        return back()->with('success','Aspirasi berhasil dikirim');
    }
}

{
    //
}
