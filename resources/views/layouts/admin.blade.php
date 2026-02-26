<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6fb;
}

/* SIDEBAR */
.sidebar{
    width:260px;
    background:#2E4273;
    min-height:100vh;
    color:white;
    padding:20px;
    border-top-right-radius:30px;
    border-bottom-right-radius:30px;
}

.profile-box{
    text-align:center;
    margin-bottom:30px;
}

.profile-pic{
    width:70px;
    height:70px;
    background:white;
    border-radius:50%;
    margin:auto;
}

.menu-item{
    display:block;
    padding:14px;
    border-radius:12px;
    color:white;
    text-decoration:none;
    margin-bottom:10px;
}

.menu-item.active{
    background:#405790;
    position:relative;
}

.menu-item.active::after{
    content:"✓";
    position:absolute;
    right:15px;
    font-weight:bold;
}

/* CONTENT */
.content{
    padding:30px;
    width:100%;
}

/* BUTTON CARD */
.menu-card{
    background:white;
    border-radius:30px;
    padding:30px;
    text-align:center;
    font-weight:600;
    transition:.3s;
    cursor:pointer;
}

.menu-card:hover{
    background:#3A6DBA;
    color:white;
}

/* TABLE */
.card-table{
    background:white;
    border-radius:20px;
    padding:20px;
}

.status-menunggu{color:#e0a800;font-weight:600;}
.status-diproses{color:#0dcaf0;font-weight:600;}
.status-selesai{color:#198754;font-weight:600;}

</style>
</head>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="profile-box">
            <div class="profile-pic"></div>
            <div class="mt-2">{{ session('nama') }}</div>
        </div>

        <a href="/admin" class="menu-item active">Dashboard</a>
        <a href="/kelola" class="menu-item">Kelola Aspirasi</a>
        <a href="/histori" class="menu-item">Histori Aspirasi</a>

    </div>

    <!-- CONTENT -->
    <div class="content">
        @yield('content')
    </div>

</div>

</body>
</html>