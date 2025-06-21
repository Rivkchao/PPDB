<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login PPDB Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('login.css') }}">
</head>

<body>
    <div class="login-box">
        <h2>Login Siswa PPDB</h2>

        @if ($errors->has('login'))
        <div class="error-message">{{ $errors->first('login') }}</div>
        @endif

        <form action="{{ route('login.siswa.submit') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" id="nisn" name="nisn" value="{{ old('nisn') }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            <button type="submit">Masuk</button>
        </form>

        <div class="info">
            Belum daftar? <a href="{{ route('pendaftaran.form') }}">Silakan isi formulir berikut</a>
        </div>
    </div>
</body>

</html>