<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilihan Login PPDB</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/choice.css')}}">
</head>

<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="{{ asset('image/Logo 1.png') }}" alt="Logo Sekolah">
        </div>

        <header>
            <h1 class="welcome-heading">Welcome <span class="future-leader">Future Leaders!</span></h1>
            <p class="subtitle">Silakan pilih jenis login Anda</p>
        </header>

        <div class="btn-group">
            <a href="{{ route('admin.login') }}" class="btn-login btn-admin">
                <i data-feather="lock"></i> Login Admin
            </a>
            <a href="{{ route('siswa.login.siswa') }}" class="btn-login btn-siswa">
                <i data-feather="user"></i> Login Siswa
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
   
    <script>
        feather.replace();
    </script>
</body>

</html>