<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Registrasi PPDB Online</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>

    <div class="container">
        @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('pendaftaran.submit') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="logo-container">
                <img src="Logo 1.png" alt="Logo Sekolah">
            </div>
            <header>
                <h1>DATA PRIBADI</h1>
                <p class="subtitle">(FORMULIR ONLINE PPDB)</p>
            </header>

            <fieldset>
                <legend>Data Siswa</legend>

                <div class="form-group">
                    <label for="nama-lengkap">Nama Lengkap</label>
                    <input type="text" id="nama-lengkap" name="nama_lengkap" required>
                </div>

                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" id="nisn" name="nisn" required>
                </div>

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" id="nik" name="nik" required>
                </div>

                <div class="form-group-inline">
                    <div class="form-group">
                        <label for="tempat-lahir">Tempat Lahir</label>
                        <input type="text" id="tempat-lahir" name="tempat_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal-lahir">Tanggal Lahir</label>
                        <input type="date" id="tanggal-lahir" name="tanggal_lahir" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="radio-group">
                        <label><input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki</label>
                        <label><input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select id="agama" name="agama" required>
                        <option value="" disabled selected>Pilih Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Khonghucu">Khonghucu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea id="alamat" name="alamat" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="telepon">No. Telepon/HP</label>
                    <input type="tel" id="telepon" name="telepon" required>
                </div>

                <div class="form-group">
                    <label for="email">Email (opsional)</label>
                    <input type="email" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="asal-sekolah">Asal Sekolah (SMP/MTs)</label>
                    <input type="text" id="asal-sekolah" name="asal_sekolah" required>
                </div>

                <div class="form-group">
                    <label for="jurusan">Pilihan Kompetensi Keahlian</label>
                    <select id="jurusan" name="jurusan" required>
                        <option value="" disabled selected>Pilih Jurusan</option>
                        <option value="TKJ">Teknik Komputer dan Jaringan</option>
                        <option value="RPL">Rekayasa Perangkat Lunak</option>
                        <option value="DKV">Desain Komunikasi Visual</option>
                        <option value="AKL">Akuntansi dan Keuangan Lembaga</option>
                        <option value="MP">Manajemen Perkantoran</option>
                        <option value="TKR">Teknik Kendaraan Ringan</option>
                    </select>
                </div>


            </fieldset>

            <!-- ORTU -->
            <fieldset>
                <legend>Data Orang Tua/Wali</legend>

                <div class="form-group">
                    <label for="nama-ortu">Nama Orang Tua/Wali</label>
                    <input type="text" id="nama-ortu" name="nama_ortu" required>
                </div>

                <div class="form-group">
                    <label for="pekerjaan-ortu">Pekerjaan Orang Tua/Wali</label>
                    <input type="text" id="pekerjaan-ortu" name="pekerjaan_ortu" required>
                </div>

                <div class="form-group">
                    <label for="penghasilan-ortu">Penghasilan Orang Tua</label>
                    <select id="penghasilan-ortu" name="penghasilan_ortu">
                        <option value="" disabled selected>Pilih rentang penghasilan</option>
                        <option value="<1jt">&lt; Rp 1.000.000</option>
                        <option value="1-3jt">Rp 1.000.000 - Rp 3.000.000</option>
                        <option value="3-5jt">Rp 3.000.000 - Rp 5.000.000</option>
                        <option value=">5jt">&gt; Rp 5.000.000</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat-ortu">Alamat Orang Tua/Wali</label>
                    <textarea id="alamat-ortu" name="alamat_ortu" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="pendidikan-ortu">Pendidikan Terakhir Orang Tua/Wali</label>
                    <select id="pendidikan-ortu" name="pendidikan_ortu" required>
                        <option value="" disabled selected>Pilih pendidikan terakhir</option>
                        <option value="SD">SD/Sederajat</option>
                        <option value="SMP">SMP/Sederajat</option>
                        <option value="SMA">SMA/SMK</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Sarjana">Sarjana</option>
                        <option value="Pasca Sarjana">Pasca Sarjana</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="telepon-ortu">Nomor HP Orang Tua/Wali</label>
                    <input type="tel" id="telepon-ortu" name="telepon_ortu" required>
                </div>
            </fieldset>

            <!-- DOKUMEN -->
            <fieldset>
                <legend>Upload Dokumen Wajib</legend>

                <div class="form-group">
                    <label for="pas-foto">Pas Foto Terbaru</label>
                    <input type="file" id="pas-foto" name="pas_foto" accept="image/jpeg, image/png" required>
                    <small>Format: JPG atau PNG, Maks: 2MB</small>
                </div>

                <div class="form-group">
                    <label for="scan-ijazah">Scan Ijazah atau SKL</label>
                    <input type="file" id="scan-ijazah" name="scan_ijazah" accept="application/pdf, image/jpeg"
                        required>
                    <small>Format: PDF atau JPG</small>
                </div>

                <div class="form-group">
                    <label for="scan-kk">Scan Kartu Keluarga (KK)</label>
                    <input type="file" id="scan-kk" name="scan_kk" accept="application/pdf, image/jpeg" required>
                    <small>Format: PDF atau JPG</small>
                </div>

                <div class="form-group">
                    <label for="scan-akta">Scan Akta Kelahiran</label>
                    <input type="file" id="scan-akta" name="scan_akta" accept="application/pdf, image/jpeg" required>
                    <small>Format: PDF atau JPG</small>
                </div>

                <div class="form-group">
                    <label for="scan-kelakuan">Scan Surat Keterangan Kelakuan Baik (Opsional)</label>
                    <input type="file" id="scan-kelakuan" name="scan_kelakuan" accept="application/pdf, image/jpeg">
                    <small>Format: PDF atau JPG</small>
                </div>
            </fieldset>

            <div class="info-ppdb">
                <h3 style="color: #b71c1c; margin-bottom: 0.5em;">Informasi PPDB</h3>
                @foreach ($gelombangList as $g)
                <p>
                    <strong>{{ $g->nama }}</strong>:
                    Rp {{ number_format($g->biaya, 0, ',', '.') }} |
                    <strong>{{ \Carbon\Carbon::parse($g->tanggal_mulai)->format('d-m-Y') }} sampai {{ \Carbon\Carbon::parse($g->tanggal_selesai)->format('d-m-Y') }}</strong>
                </p>
                @endforeach

                <p style="font-size: 0.95em; color: #444; margin-top: 15px; font-weight: bold;">
                    💡 Biaya pendaftaran akan ditampilkan dan dapat dibayarkan setelah Anda berhasil melakukan pendaftaran dan login ke sistem.
                </p>
            </div>


            <div class="form-group">
                <button type="submit">Kirim Pendaftaran</button>
            </div>
        </form>
    </div>

</body>

</html>