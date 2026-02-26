<!DOCTYPE html>
<html>
<head>
<title>Login Siswa</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#2E4273;">

<div class="d-flex justify-content-center align-items-center vh-100">

    <div class="card p-4 shadow" style="width:350px; border-radius:20px;">

        <h4 class="text-center mb-4">Login Siswa</h4>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login-siswa">
            @csrf

            <div class="mb-3">
                <label>NIS</label>
                <input type="text" name="nis" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn w-100 text-white"
                style="background:#2E4273; border-radius:30px;">
                Login
            </button>

        </form>

    </div>

</div>

</body>
</html>