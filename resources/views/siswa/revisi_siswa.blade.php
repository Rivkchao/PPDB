<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Revisi PPDB Online</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styleform.css') }}">
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

        <form action="{{ route('siswa.update_data') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="logo-container">
                <img src="{{ asset('image/Logo 1.png') }}" alt="Logo Sekolah">
            </div>
            <header>
                <h1>Formulir Revisi PPDB Online</h1>
                <p class="subtitle">(FORMULIR REVISI ONLINE PPDB)</p>
            </header>

            <fieldset>
                <legend>Data Siswa</legend>

                <div class="form-group">
                    <label for="nama-lengkap">Nama Lengkap</label>
                    <input type="text" id="nama-lengkap" name="nama_lengkap" value="{{ $data->nama_lengkap }}" required>
                </div>

                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" id="nisn" name="nisn" value="{{ $data->nisn }}" readonly>
                </div>

                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" id="nik" name="nik" value="{{ $data->nik }}" required>
                </div>

                <div class="form-group-inline">
                    <div class="form-group">
                        <label for="tempat-lahir">Tempat Lahir</label>
                        <input type="text" id="tempat-lahir" name="tempat_lahir" value="{{ $data->tempat_lahir }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal-lahir">Tanggal Lahir</label>
                        <input type="date" id="tanggal-lahir" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="radio-group">
                        <label><input type="radio" name="jenis_kelamin" value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}> Laki-laki</label>
                        <label><input type="radio" name="jenis_kelamin" value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}> Perempuan</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select id="agama" name="agama" required>
                        <option value="" disabled>Pilih Agama</option>
                        @foreach(['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Buddha', 'Khonghucu'] as $agama)
                        <option value="{{ $agama }}" {{ $data->agama == $agama ? 'selected' : '' }}>{{ $agama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea id="alamat" name="alamat" rows="4" required>{{ $data->alamat }}</textarea>
                </div>

                <div class="form-group">
                    <label for="telepon">No. Telepon/HP</label>
                    <input type="tel" id="telepon" name="telepon" value="{{ $data->telepon }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email (opsional)</label>
                    <input type="email" id="email" name="email" value="{{ $data->email }}">
                </div>

                <div class="form-group">
                    <label for="asal-sekolah">Asal Sekolah (SMP/MTs)</label>
                    <input type="text" id="asal-sekolah" name="asal_sekolah" value="{{ $data->asal_sekolah }}" required>
                </div>

                <div class="form-group">
                    <label for="jurusan">Pilihan Kompetensi Keahlian</label>
                    <select id="jurusan" name="jurusan" required>
                        <option value="" disabled>Pilih Jurusan</option>
                        @foreach(['TKJ', 'RPL', 'DKV', 'AKL', 'MP', 'TKR'] as $jurusan)
                        <option value="{{ $jurusan }}" {{ $data->jurusan == $jurusan ? 'selected' : '' }}>{{ $jurusan }}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>

            <!-- ORTU -->
            <fieldset>
                <legend>Data Orang Tua/Wali</legend>

                <div class="form-group">
                    <label for="nama-ortu">Nama Orang Tua/Wali</label>
                    <input type="text" id="nama-ortu" name="nama_ortu" value="{{ $data->nama_ortu }}" required>
                </div>

                <div class="form-group">
                    <label for="pekerjaan-ortu">Pekerjaan Orang Tua/Wali</label>
                    <input type="text" id="pekerjaan-ortu" name="pekerjaan_ortu" value="{{ $data->pekerjaan_ortu }}" required>
                </div>

                <div class="form-group">
                    <label for="penghasilan-ortu">Penghasilan Orang Tua</label>
                    <select id="penghasilan-ortu" name="penghasilan_ortu">
                        <option value="" disabled>Pilih rentang penghasilan</option>
                        @foreach(['<1jt', '1-3jt' , '3-5jt' , '>5jt' ] as $range)
                            <option value="{{ $range }}" {{ $data->penghasilan_ortu == $range ? 'selected' : '' }}>{{ $range }}</option>
                            @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat-ortu">Alamat Orang Tua/Wali</label>
                    <textarea id="alamat-ortu" name="alamat_ortu" rows="3" required>{{ $data->alamat_ortu }}</textarea>
                </div>

                <div class="form-group">
                    <label for="pendidikan-ortu">Pendidikan Terakhir Orang Tua/Wali</label>
                    <select id="pendidikan-ortu" name="pendidikan_ortu" required>
                        <option value="" disabled>Pilih pendidikan terakhir</option>
                        @foreach(['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana', 'Pasca Sarjana'] as $pendidikan)
                        <option value="{{ $pendidikan }}" {{ $data->pendidikan_ortu == $pendidikan ? 'selected' : '' }}>{{ $pendidikan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="telepon-ortu">Nomor HP Orang Tua/Wali</label>
                    <input type="tel" id="telepon-ortu" name="telepon_ortu" value="{{ $data->telepon_ortu }}" required>
                </div>
            </fieldset>

            <!-- DOKUMEN -->
            <fieldset>
                <legend>Upload Dokumen Wajib</legend>

                <div class="form-group">
                    <label for="pas-foto">Pas Foto Terbaru</label>
                    <input type="file" id="pas-foto" name="pas_foto" accept="image/jpeg, image/png">
                </div>

                <div class="form-group">
                    <label for="scan-ijazah">Scan Ijazah atau SKL</label>
                    <input type="file" id="scan-ijazah" name="scan_ijazah" accept="application/pdf, image/jpeg">
                </div>

                <div class="form-group">
                    <label for="scan-kk">Scan Kartu Keluarga (KK)</label>
                    <input type="file" id="scan-kk" name="scan_kk" accept="application/pdf, image/jpeg">
                </div>

                <div class="form-group">
                    <label for="scan-akta">Scan Akta Kelahiran</label>
                    <input type="file" id="scan-akta" name="scan_akta" accept="application/pdf, image/jpeg">
                </div>

                <div class="form-group">
                    <label for="scan-kelakuan">Scan Surat Keterangan Kelakuan Baik (Opsional)</label>
                    <input type="file" id="scan-kelakuan" name="scan_kelakuan" accept="application/pdf, image/jpeg">
                </div>
            </fieldset>

            <div class="form-group">
                <button type="submit">Kirim Revisi Data</button>
            </div>
        </form>
    </div>

</body>
</html>