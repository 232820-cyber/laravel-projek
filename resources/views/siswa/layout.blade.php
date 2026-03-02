<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    display:flex;
    background:#f4f6fb;
}

/* SIDEBAR */
.sidebar{
    width:260px;
    background:#2E4273;
    height:100vh;
    color:white;
    padding:20px;
    border-top-right-radius:30px;
    border-bottom-right-radius:30px;
}

/* PROFILE */
.profile{
    display:flex;
    align-items:center;
    margin-bottom:40px;
}

.profile-icon{
    width:50px;
    height:50px;
    border-radius:50%;
    background:#5c6ea8;
    margin-right:10px;
}

.profile-name{
    font-weight:600;
}

/* MENU */
.menu a{
    display:flex;
    align-items:center;
    color:white;
    text-decoration:none;
    padding:12px 15px;
    border-radius:10px;
    margin-bottom:8px;
}

.menu a.active{
    background:#405790;
}

.menu a:hover{
    background:#405790;
}

/* CONTENT */
.content{
    flex:1;
    padding:40px;
}

/* CARD */
.card{
    background:white;
    padding:40px;
    border-radius:20px;
    text-align:center;
}

.card h1{
    margin-bottom:30px;
}

/* BUTTON */
.btn{
    display:block;
    width:320px;
    margin:15px auto;
    padding:14px;
    border-radius:30px;
    border:none;
    background:white;
    color:black;
    font-size:16px;
    cursor:pointer;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    transition:0.3s;
}

.btn:hover{
    background:#3A6DBA;
    color:white;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="profile">
        <div class="profile-icon"></div>
        <div class="profile-name">
            USER
        </div>
    </div>

    <div class="menu">

        <a href="{{ route('siswa.dashboard') }}"
   class="{{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">
   Dashboard
</a>

<a href="{{ route('siswa.aspirasi') }}"
   class="{{ request()->routeIs('siswa.aspirasi') ? 'active' : '' }}">
   Ajukan Aspirasi
</a>

        <a href="#">
            Lihat Histori Aspirasi Saya
        </a>

    </div>

</div>

<!-- CONTENT -->
<div class="content">
    @yield('content')
</div>

</body>
</html>