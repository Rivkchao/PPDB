<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login PPDB Siswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="{{ asset('image/Logo 1.png') }}" alt="Logo Sekolah">
        </div>

        <div class="login-header">
            <h2>Login Siswa</h2>
            <p>Masukkan NISN dan Tanggal Lahir Anda</p>
        </div>

        @if ($errors->has('login'))
        <div class="error-message">{{ $errors->first('login') }}</div>
        @endif

        <form action="{{ route('siswa.login.siswa.submit') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" id="nisn" name="nisn" value="{{ old('nisn') }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            <button type="submit">
                <i data-feather="log-in"></i>
                Masuk
            </button>
        </form>

        <div class="info">
            Belum daftar? <a href="{{ route('pendaftaran.form') }}">Silakan isi formulir berikut</a>
        </div>
        <script src="https://unpkg.com/feather-icons"></script>
        <script>
            feather.replace();
        </script>
    </div>
</body>

</html>