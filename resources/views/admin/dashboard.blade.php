@extends('layouts.admin')

@section('content')

<h3 class="mb-4 fw-bold">Halo, Admin !</h3>

<!-- MENU CARD -->
<div class="row mb-4">

    <div class="col-md-6">
        <a href="/kelola" style="text-decoration:none;">
            <div class="menu-card shadow">
                KELOLA ASPIRASI
            </div>
        </a>
    </div>

    <div class="col-md-6">
        <a href="/histori" style="text-decoration:none;">
            <div class="menu-card shadow">
                HISTORI ASPIRASI
            </div>
        </a>
    </div>

</div>

<!-- TABEL -->
<div class="card-table shadow">

    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Siswa</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>

        <tbody>

            @foreach($aspirasi as $a)
                <tr>
                    <td>{{ $a->tanggal }}</td>
                    <td>{{ $a->nama_siswa }}</td>
                    <td>{{ $a->nama_kategori }}</td>
                    <td>{{ $a->status }}</td>
                    <td>
                        <a href="{{ route('admin.detail', $a->id_aspirasi) }}" class="btn btn-sm btn-primary"> Lihat Detail</a>
</td>
                </tr>
            @endforeach

        </tbody>

    </table>

</div>

@endsection