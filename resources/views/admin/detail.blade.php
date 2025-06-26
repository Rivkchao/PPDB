<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail PPDB - UIHC</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styleform.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detailverif.css') }}">
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <img src="{{ asset('image/Logo 1.png') }}" alt="Logo Sekolah">
        </div>

        <header>
            <h1>DETAIL PENDAFTAR</h1>
            <p class="subtitle">(HALAMAN ADMINISTRATOR)</p>
        </header>

        <!-- Data Siswa -->
        <fieldset>
            <legend>Data Siswa</legend>

            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" id="nisn" value="{{ $data->nisn }}" readonly>
            </div>

            <div class="form-group">
                <label for="nama-lengkap">Nama Lengkap</label>
                <input type="text" id="nama-lengkap" value="{{ $data->nama_lengkap }}" readonly>
            </div>

            <div class="form-group">
                <label for="asal-sekolah">Asal Sekolah</label>
                <input type="text" id="asal-sekolah" value="{{ $data->asal_sekolah }}" readonly>
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" id="jurusan" value="{{ $data->jurusan }}" readonly>
            </div>

            <div class="form-group">
                <label for="gelombang">Gelombang</label>
                <input type="text" id="gelombang" value="{{ $data->gelombang->nama ?? 'Tidak diketahui' }}" readonly>
            </div>

            <div class="form-group">
                <label for="status">Status Verifikasi</label>
                <input type="text" id="status" value="{{ ucfirst($data->status_verifikasi) }}" readonly>
            </div>

            @if ($data->catatan_penolakan)
            <div class="form-group">
                <label for="catatan" style="color: #b71c1c;">Catatan Penolakan</label>
                <textarea id="catatan" rows="4" readonly>{{ $data->catatan_penolakan }}</textarea>
            </div>
            @endif
        </fieldset>

        <!-- Data Orang Tua/Wali -->
        <fieldset>
            <legend>Data Orang Tua/Wali</legend>

            <div class="form-group">
                <label for="nama-ortu">Nama Orang Tua/Wali</label>
                <input type="text" id="nama-ortu" value="{{ $data->nama_ortu ?? 'Data tidak tersedia' }}" readonly>
            </div>

            <div class="form-group">
                <label for="pekerjaan-ortu">Pekerjaan</label>
                <input type="text" id="pekerjaan-ortu" value="{{ $data->pekerjaan_ortu ?? 'Data tidak tersedia' }}" readonly>
            </div>

            <div class="form-group">
                <label for="penghasilan-ortu">Penghasilan</label>
                <input type="text" id="penghasilan-ortu" value="{{ 
                    $data->penghasilan_ortu ? 
                    str_replace([
                        '<1jt', 
                        '1-3jt', 
                        '3-5jt', 
                        '>5jt'
                    ], [
                        '< Rp 1.000.000', 
                        'Rp 1.000.000 - Rp 3.000.000', 
                        'Rp 3.000.000 - Rp 5.000.000', 
                        '> Rp 5.000.000'
                    ], $data->penghasilan_ortu) : 
                    'Data tidak tersedia' 
                }}" readonly>
            </div>

            <div class="form-group">
                <label for="alamat-ortu">Alamat</label>
                <textarea id="alamat-ortu" rows="3" readonly>{{ $data->alamat_ortu ?? 'Data tidak tersedia' }}</textarea>
            </div>

            <div class="form-group">
                <label for="pendidikan-ortu">Pendidikan Terakhir</label>
                <input type="text" id="pendidikan-ortu" value="{{ $data->pendidikan_ortu ?? 'Data tidak tersedia' }}" readonly>
            </div>

            <div class="form-group">
                <label for="telepon-ortu">Nomor HP</label>
                <input type="text" id="telepon-ortu" value="{{ $data->telepon_ortu ?? 'Data tidak tersedia' }}" readonly>
            </div>
        </fieldset>

        <!-- Dokumen Siswa -->
        <fieldset>
            <legend>Dokumen Pendaftaran</legend>

            <div class="dokumen-container">
                @if ($data->dokumen)
                @foreach (['pas_foto', 'scan_ijazah', 'scan_kk', 'scan_akta', 'scan_kelakuan'] as $field)
                @if ($data->dokumen->$field)
                <div class="dokumen-item">
                    <label>{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                    <a href="{{ asset('storage/' . $data->dokumen->$field) }}" target="_blank" class="dokumen-link">
                        Lihat Dokumen
                    </a>
                </div>
                @endif
                @endforeach
                @else
                <p class="no-dokumen">Tidak ada dokumen tersedia.</p>
                @endif
            </div>
        </fieldset>

        <fieldset>
            <legend>Verifikasi Pendaftaran</legend>

            <form action="{{ route('admin.verifikasi.update', $data->nisn) }}" method="POST" onsubmit="return confirm('Yakin ingin mengubah status verifikasi?')">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="status-verifikasi">Status Verifikasi</label>
                    <select id="status-verifikasi" name="status" onchange="toggleCatatan()" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="diterima" {{ $data->status_verifikasi === 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ $data->status_verifikasi === 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <div class="form-group" id="catatan-box" style="display: none;">
                    @if($data->status_verifikasi == 'ditolak')
                    <script>
                        document.getElementById('catatan-box').style.display = 'block';
                    </script>
                    @endif
                    <label for="catatan-verifikasi">Catatan Penolakan</label>
                    <textarea id="catatan-verifikasi" name="catatan" rows="4">{{ $data->catatan_penolakan }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit">Simpan Perubahan</button>
                </div>
            </form>
        </fieldset>

        <div class="form-group" style="margin-top: -50px;">
            <a href="{{ route('admin.dashboard_admin') }}" class="button-back">← Kembali ke Dashboard</a>
        </div>
    </div>

    <script>
        function toggleCatatan() {
            const status = document.getElementById('status-verifikasi').value;
            const box = document.getElementById('catatan-box');
            if (status === 'ditolak') {
                box.style.display = 'block';
            } else {
                box.style.display = 'none';
            }
        }
    </script>
</body>

</html>