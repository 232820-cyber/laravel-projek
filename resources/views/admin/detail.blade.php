@extends('admin.layout')

@section('title','Detail Aspirasi')

@section('content')

<style>
.detail-card{
    width: 850px;
    margin: 40px auto;
    background: #f5f5f5;
    padding: 35px;
    border-radius: 25px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.detail-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.detail-header h2{
    font-size:28px;
    font-weight:700;
}

.detail-box{
    background:white;
    padding:25px;
    border-radius:20px;
    margin-bottom:25px;
}

.label{
    font-weight:600;
    color:#666;
}

.value{
    margin-bottom:12px;
}

textarea{
    width:100%;
    border-radius:12px;
    padding:12px;
    border:1px solid #ccc;
    resize:none;
}

.btn-group{
    display:flex;
    gap:10px;
    margin-top:15px;
}

.btn{
    padding:10px 18px;
    border:none;
    border-radius:10px;
    cursor:pointer;
    font-weight:600;
}

.btn-process{
    background:#6ab04c;
    color:white;
}

.btn-reject{
    background:#eb4d4b;
    color:white;
}

.btn-finish{
    background:#2980b9;
    color:white;
}

.timeline{
    margin-top:25px;
    border-left:4px solid #6ab04c;
    padding-left:15px;
}

.timeline-item{
    margin-bottom:12px;
    font-size:14px;
}
</style>

<div class="detail-card">

    <div class="detail-header">
        <h2>Detail Aspirasi #ASP/{{ $aspirasi->id_aspirasi }}</h2>
        <span>{{ $aspirasi->tanggal }}</span>
    </div>

    <div class="detail-box">
        <div class="value">
            <span class="label">Nama Siswa:</span>
            {{ $aspirasi->nama_siswa }}
        </div>

        <div class="value">
            <span class="label">Kategori:</span>
            {{ $aspirasi->nama_kategori }}
        </div>

        <div class="value">
            <span class="label">Lokasi:</span>
            {{ $aspirasi->lokasi }}
        </div>

        <div class="value">
            <span class="label">Deskripsi:</span><br>
            {{ $aspirasi->isi_laporan }}
        </div>
    </div>

    <div class="detail-box">
        <h4>Input Umpan Balik</h4>

        <form method="POST" action="{{ route('admin.update', $aspirasi->id_aspirasi) }}">
            @csrf

            <textarea name="feedback" rows="3"
                placeholder="Tuliskan tanggapan atau informasi tindak lanjut..."></textarea>

            <div class="btn-group">
                <button name="status" value="Diproses" class="btn btn-process">
                    Proses
                </button>

                <button name="status" value="Ditolak" class="btn btn-reject">
                    Tolak
                </button>

                <button name="status" value="Selesai" class="btn btn-finish">
                    Selesai
                </button>
            </div>
        </form>
    </div>

    <div class="detail-box">
        <h4>Riwayat Status</h4>

        <div class="timeline">
            <div class="timeline-item">
                ✔ Aspirasi dibuat
            </div>

            @if($aspirasi->status == 'Diproses')
                <div class="timeline-item">
                    ✔ Sedang diproses
                </div>
            @endif

            @if($aspirasi->status == 'Selesai')
                <div class="timeline-item">
                    ✔ Aspirasi selesai
                </div>
            @endif

            @if($aspirasi->status == 'Ditolak')
                <div class="timeline-item" style="color:red;">
                    ✖ Aspirasi ditolak
                </div>
            @endif
        </div>
    </div>

</div>

@endsection