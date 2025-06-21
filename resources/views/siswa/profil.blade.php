<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Pendaftar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dataSiswa.css') }}">

</head>

<body>
    <div class="container">
        <div class="logo-container">
            <img src="{{ asset('Logo 1.png') }}" alt="Logo Sekolah">
        </div>

        <h2>Profil Calon Peserta Didik</h2>
        <p id="tahun-ajaran">Tahun Ajaran</p>
        <script>
            const now = new Date();
            const tahunIni = now.getFullYear();
            const tahunDepan = tahunIni + 1;
            document.getElementById("tahun-ajaran").textContent =
                `Tahun Ajaran ${tahunIni}/${tahunDepan} - Umbrella International High School`;
        </script>
        <div class="info-item">
            <label>Gelombang:</label>
            <i>{{ $data->gelombang->nama ?? 'Tidak diketahui' }} ( Rp {{ $data->gelombang->biaya ?? 'Tidak diketahui' }} )</i>
        </div>
        @php $status = strtolower($data->status_verifikasi); $statusBayar = strtolower($data->pembayaran->status ?? ''); @endphp
        @if ($status == 'diterima')
        <p class="status-verifikasi status-diterima">✅ Data Anda telah diverifikasi dan DITERIMA oleh Admin.</p>
        @elseif ($status == 'ditolak')
        <p class="status-verifikasi status-ditolak">❌ Data Anda DITOLAK. Silakan perbaiki data Anda.</p>
        @elseif ($status == 'terbayar')
        <p class="status-verifikasi status-menunggu">💳 Sudah dibayar. Mohon menunggu verifikasi oleh Admin.</p>
        @else
        <p class="status-verifikasi status-menunggu">⏳ Silakan selesaikan pembayaran terlebih dahulu.</p>
        @endif

        <div class="section">
            <h3>Data Siswa</h3>
            @foreach ([
            'Nama Lengkap' => $data->nama_lengkap,
            'NISN' => $data->nisn,
            'NIK' => $data->nik,
            'Tempat, Tanggal Lahir' => $data->tempat_lahir . ', ' . $data->tanggal_lahir,
            'Jenis Kelamin' => $data->jenis_kelamin,
            'Agama' => $data->agama,
            'Alamat' => $data->alamat,
            'No. HP' => $data->telepon,
            'Email' => $data->email,
            'Asal Sekolah' => $data->asal_sekolah,
            'Jurusan Pilihan' => $data->jurusan
            ] as $label => $value)
            <div class="info-item">
                <label>{{ $label }}:</label>
                <span>{{ $value }}</span>
            </div>
            @endforeach
        </div>

        <div class="section">
            <h3>Data Orang Tua/Wali</h3>
            @foreach ([
            'Nama Orang Tua/Wali' => $data->nama_ortu,
            'Pekerjaan' => $data->pekerjaan_ortu,
            'Penghasilan' => $data->penghasilan_ortu,
            'Alamat Orang Tua' => $data->alamat_ortu,
            'Pendidikan Terakhir' => $data->pendidikan_ortu,
            'No. HP Orang Tua' => $data->telepon_ortu
            ] as $label => $value)
            <div class="info-item">
                <label>{{ $label }}:</label>
                <span>{{ $value }}</span>
            </div>
            @endforeach
        </div>

        <div class="section">
            <h3>Dokumen Terunggah</h3>
            @foreach ([
            'Pas Foto' => $data->dokumen->pas_foto ?? null,
            'Scan Ijazah / SKL' => $data->dokumen->scan_ijazah ?? null,
            'Scan Kartu Keluarga' => $data->dokumen->scan_kk ?? null,
            'Scan Akta Kelahiran' => $data->dokumen->scan_akta ?? null,
            'Surat Kelakuan Baik' => $data->dokumen->scan_kelakuan ?? null,
            ] as $label => $file)
            <div class="info-item">
                <label>{{ $label }}:</label>
                <span>
                    @if ($file)
                    <a class="view-link" href="{{ asset('uploads/' . $file) }}" target="_blank">Lihat Dokumen</a>
                    @else
                    <em>Belum diunggah</em>
                    @endif
                </span>
            </div>
            @endforeach
        </div>

        <div class="button-group">
            @if ($status == 'ditolak')
            <a href="{{ route('siswa.edit') }}" id="btn-edit">Edit Data</a>
            @endif

            @if ($status == 'menunggu')
            <button class="btn-success" id="pay-button">💳 Bayar Sekarang</button>
            @endif

            <form id="logout-form" action="{{ route('logout.siswa') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #007BFF; cursor: pointer; padding: 0;">
                    <a>🔓 Keluar</a>
                </button>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-n4EimX_k9kBXW1lF"></script>
    <script>
        const payBtn = document.getElementById('pay-button');
        if (payBtn) {
            payBtn.addEventListener('click', function() {
                fetch("{{ route('midtrans.token') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            nisn: '{{ $data->nisn }}',
                            nama: '{{ $data->nama_lengkap }}'
                        })
                    })
                    .then(async res => {
                        const text = await res.text();
                        if (!res.ok) {
                            console.error('Fetch failed. Response was: ', text);
                            throw new Error(text);
                        }
                        return JSON.parse(text);
                    })
                    .then(data => {
                        snap.pay(data.token, {
                            onSuccess: function(result) {
                                fetch('/update-status-terbayar', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({
                                            nisn: '{{ $data->nisn }}'
                                        })
                                    })
                                    .then(res => res.json())
                                    .then(res => {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Pembayaran Berhasil!',
                                            text: res.message,
                                            confirmButtonText: 'OK'
                                        }).then(() => location.reload());
                                    })
                                    .catch(err => {
                                        console.error('Update status error:', err);
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal update status!',
                                            text: 'Silakan coba lagi.',
                                            confirmButtonText: 'OK'
                                        });
                                    });
                            },
                            onPending: function() {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Pembayaran Tertunda',
                                    confirmButtonText: 'OK'
                                });
                            },
                            onError: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    });
            });
        }
    </script>

</body>

</html>