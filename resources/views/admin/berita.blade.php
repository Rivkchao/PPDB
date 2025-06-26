<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Berita - UIHC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/berita.css') }}">
</head>

<body>
    @include('partials.sidebar')
    <div class="wrapper-dashboard">
        <div class="main-content" id="main-content">
            <div class="logo-container">
                <img src="{{ asset('image/Logo 1.png') }}" alt="Logo Sekolah">
            </div>

            <header>
                <h1>MANAJEMEN BERITA</h1>
                <p class="subtitle">(HALAMAN ADMINISTRATOR)</p>
            </header>

            @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
            @endif

            <div class="card-form">
                <h3 class="card-title">
                    <i data-feather="plus-circle"></i> Tambah Berita Baru
                </h3>
                <form action="{{ route('admin.berita.simpan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul Berita</label>
                        <input type="text" id="judul" name="judul" required>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar Berita</label>
                        <div class="file-upload">
                            <input type="file" id="gambar" name="gambar" class="file-upload-input" accept="image/*" required>
                            <label for="gambar" class="file-upload-label">
                                <span class="file-name">Pilih file gambar...</span>
                                <span class="file-upload-button">Pilih File</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="isi_konten">Isi Konten</label>
                        <textarea id="isi_konten" name="isi_konten" required></textarea>
                    </div>

                    <button type="submit">
                        <i data-feather="save"></i> Simpan Berita
                    </button>
                </form>
            </div>

            <div class="card-form">
                <h3 class="card-title">
                    <i data-feather="list"></i> Daftar Berita
                </h3>
                <div class="table-responsive">
                    <table class="berita-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th>Isi Konten</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($beritaList as $i => $berita)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $berita->judul }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="gambar" class="img-thumb">
                                </td>
                                <td>{{ Str::limit($berita->isi_konten, 100) }}</td>
                                <td>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d/m/Y') }}</td>
                                <td>
                                    <form action="{{ route('admin.berita.delete', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            <i data-feather="trash-2"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center;">Belum ada berita.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();

        // File upload name display
        document.querySelectorAll('.file-upload-input').forEach(input => {
            input.addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name || 'Pilih file gambar...';
                const label = this.closest('.file-upload').querySelector('.file-name');
                label.textContent = fileName;
            });
        });

        // Smooth scroll to error fields
        document.addEventListener('DOMContentLoaded', function() {
            if (document.querySelector('.alert-danger')) {
                const firstErrorField = document.querySelector('[name]');
                if (firstErrorField) {
                    firstErrorField.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    firstErrorField.focus();
                }
            }
        });
    </script>
</body>

</html>