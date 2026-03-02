<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Siswa - Aplikasi Pengaduan</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="login-box">
    <div class="top-label">LOGIN SISWA</div>

    <div class="login-content">
        <h1>Aplikasi Pengaduan<br>Sarana Sekolah</h1>

        {{-- ERROR MESSAGE --}}
        @if(session('error'))
            <div style="color:red; margin-bottom:15px;">
                {{ session('error') }}
            </div>
        @endif

<form method="POST" action="{{ url('/login-siswa') }}">            @csrf

            <label>NIS :</label>
            <div class="input-group">
                <i class="fa-solid fa-user"></i>
                <input 
                    type="text" 
                    name="nis"
                    placeholder="Masukkan NIS"
                    required>
            </div>

            <label>Password :</label>
            <div class="input-group">
                <i class="fa-solid fa-lock"></i>
                <input 
                    type="password" 
                    name="password"
                    placeholder="Masukkan Password"
                    required>
            </div>

            <button type="submit" class="btn-login">LOGIN</button>
        </form>
    </div>
</div>

</body>
</html>