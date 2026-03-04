@extends('siswa.layout')

@section('title','Ajukan Aspirasi')

@section('content')

<style>
.form-card{
    background:#eee;
    padding:30px;
    border-radius:20px;
    width:600px;
    margin:auto;
}

.form-card h2{
    text-align:center;
    margin-bottom:20px;
}

.input{
    width:100%;
    padding:12px;
    border-radius:12px;
    border:1px solid #aaa;
    margin-bottom:15px;
}

textarea.input{
    height:90px;
    resize:none;
}

.btn-save{
    width:100%;
    padding:14px;
    border:none;
    border-radius:12px;
    background:#e0a12a;
    color:black;
    font-weight:600;
    font-size:18px;
    cursor:pointer;
}

.notif{
    background:#e6e6e6;
    padding:15px;
    border-radius:15px;
    width:600px;
    margin:0 auto 20px;
    display:flex;
    align-items:center;
    box-shadow:0 3px 6px rgba(0,0,0,0.2);
}

.notif-icon{
    font-size:30px;
    margin-right:15px;
}

.notif-text b{
    font-size:18px;
}
</style>


{{-- NOTIFIKASI SUKSES --}}
@if(session('success'))
<div class="notif">
    <div class="notif-icon">📢</div>
    <div class="notif-text">
        <b>Aspirasi berhasil dikirim</b><br>
        terima kasih sudah menyampaikan aspirasi kamu.<br>
        tunggu kabar selanjutnya ya.
    </div>
</div>
@endif


<div class="form-card">

    <h2>Ajukan Aspirasi Baru</h2>

    <form method="POST" action="/kirim-aspirasi">
        @csrf

        <label>Nama Siswa</label>
        <input type="text" name="nama" class="input"
               placeholder="Silahkan masukkan nama..." required>

        <label>Deskripsi</label>
        <textarea name="isi" class="input"
                  placeholder="Silahkan masukkan deskripsi..." required></textarea>

        <label>Kategori</label>
<select name="kategori" class="input" required>
    <option value="" disabled selected>Pilih</option>
    @foreach($kategori as $k)
        <option value="{{ $k->id_kategori }}">
            {{ $k->ket_kategori }}
        </option>
    @endforeach
</select>

        <label>Lokasi</label>
        <select name="lokasi" class="input" required>
            <option>Pilih</option>
            <option>Ruang Kelas</option>
            <option>Lapangan</option>
            <option>Toilet</option>
        </select>

        <button class="btn-save">SIMPAN</button>

    </form>

</div>

@endsection