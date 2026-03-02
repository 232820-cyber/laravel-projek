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
            </tr>
        </thead>

        <tbody>

            @foreach($aspirasi as $a)
            <tr>
                <td>{{ $a->tanggal }}</td>
                <td>{{ $a->nis }}</td>
                <td>{{ $a->nama_kategori }}</td>

                <td>
                    @if($a->status == 'Menunggu')
                        <span class="status-menunggu">Menunggu</span>
                    @elseif($a->status == 'Diproses')
                        <span class="status-diproses">Diproses</span>
                    @else
                        <span class="status-selesai">Selesai</span>
                    @endif
                </td>

            </tr>
            @endforeach

        </tbody>

    </table>

</div>

@endsection