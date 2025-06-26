<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gelombang PPDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/gelombangE.css') }}">
</head>

<body>
    <div class="wrapper-dashboard">
        <div class="main-content">
            <div class="logo-container">
                <img src="{{ asset('image/Logo 1.png') }}" alt="Logo Sekolah">
            </div>

            <header>
                <h1>EDIT GELOMBANG PPDB</h1>
                <p class="subtitle">(HALAMAN ADMINISTRATOR)</p>
            </header>

            @if ($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('admin.gelombang.update', $gelombang->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama">Nama Gelombang</label>
                    <input type="text" id="nama" name="nama" value="{{ $gelombang->nama }}" required>
                </div>

                <div class="form-group">
                    <label for="biaya">Biaya</label>
                    <input type="text" id="biaya" name="biaya" value="{{ $gelombang->biaya }}" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai" value="{{ $gelombang->tanggal_mulai->format('Y-m-d') }}" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_selesai">Tanggal Selesai</label>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai" value="{{ $gelombang->tanggal_selesai->format('Y-m-d') }}" required>
                </div>


                <div class="form-actions">
                    <a href="{{ route('admin.gelombang.index') }}" class="button-back">&larr; Kembali ke Daftar Gelombang</a>
                    <button type="submit">
                        <i data-feather="save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>