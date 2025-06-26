<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Gelombang PPDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/gelombang.css') }}">
</head>

<body>
    @include('partials.sidebar')
    <div class="wrapper-dashboard">
        <div class="main-content" id="main-content">
            <div class="logo-container">
                <img src="{{ asset('image/Logo 1.png') }}" alt="Logo Sekolah">
            </div>

            <header>
                <h1>MANAJEMEN GELOMBANG PPDB</h1>
                <p class="subtitle">(HALAMAN ADMINISTRATOR)</p>
            </header>

            @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="card-form">
                <h3 class="card-title">
                    <i data-feather="plus-circle"></i> Tambah Gelombang Baru
                </h3>
                <form method="POST" action="{{ route('admin.gelombang.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="nama">Nama Gelombang</label>
                            <input type="text" id="nama" name="nama" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="tanggal_mulai">Tanggal Mulai</label>
                            <input type="date" id="tanggal_mulai" name="tanggal_mulai" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="tanggal_selesai">Tanggal Selesai</label>
                            <input type="date" id="tanggal_selesai" name="tanggal_selesai" required>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="biaya">Biaya</label>
                            <input type="number" id="biaya" name="biaya" step="0.01" required>
                        </div>
                    </div>

                    <button type="submit">
                        <i data-feather="save"></i> Simpan Gelombang
                    </button>
                </form>
            </div>

            <div class="card-form">
                <h3 class="card-title">
                    <i data-feather="list"></i> Daftar Gelombang
                </h3>
                <div class="table-responsive">
                    <table class="gelombang-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Biaya</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gelombangs as $index => $gelombang)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $gelombang->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($gelombang->tanggal_mulai)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($gelombang->tanggal_selesai)->format('d/m/Y') }}</td>
                                <td>Rp {{ number_format($gelombang->biaya, 2, ',', '.') }}</td>
                                <td>
                                    <div class="action-group">
                                        <a href="{{ route('admin.gelombang.edit', $gelombang->id) }}" class="btn-action btn-edit">
                                            <i data-feather="edit"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.gelombang.destroy', $gelombang->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete" onclick="return confirm('Yakin ingin menghapus gelombang ini?')">
                                                <i data-feather="trash-2"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
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