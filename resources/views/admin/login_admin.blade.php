<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin PPDB - UIHC</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

</head>

<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="{{ asset('image/Logo 1.png') }}" alt="Logo Sekolah">
        </div>

        <div class="login-header">
            <h2>Login Admin</h2>
            <p>Masukkan email dan password Anda</p>
        </div>

        @if ($errors->has('login'))
        <div class="error-message">{{ $errors->first('login') }}</div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">
                <i data-feather="log-in"></i>
                Masuk
            </button>
        </form>
    </div>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
    </script>
    <script>
        // Smooth focus for error fields
        document.addEventListener('DOMContentLoaded', function() {
            if (document.querySelector('.error-message')) {
                const firstErrorField = document.querySelector('input');
                if (firstErrorField) {
                    firstErrorField.focus();
                }
            }
        });
    </script>
</body>

</html>