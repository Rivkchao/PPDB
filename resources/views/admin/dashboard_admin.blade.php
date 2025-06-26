<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pendaftar - UIHC</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
    @include('partials.sidebar')

    <!-- Main Content -->
    <div class="wrapper-dashboard">

        <div class="main-content" id="main-content">
            <div class="logo-container">
                <img src="{{ asset('image/Logo 1.png') }}" alt="Logo Sekolah">
            </div>

            <div class="top">
                <h2>Data PPDB - Admin</h2>
                <!-- Filter Gelombang -->
                <form action="{{ route('admin.dashboard_admin') }}" method="GET" style="margin-bottom: 20px;">
                    <label for="gelombang_id">Filter berdasarkan Gelombang:</label>
                    <select name="gelombang_id" id="gelombang_id" onchange="this.form.submit()">
                        <option value="">Semua Gelombang</option>
                        @foreach ($gelombangList as $gelombang)
                        <option value="{{ $gelombang->id }}" {{ request('gelombang_id') == $gelombang->id ? 'selected' : '' }}>
                            {{ $gelombang->nama }}
                        </option>
                        @endforeach
                    </select>
                </form>
            </div>


            <table>
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama Lengkap</th>
                        <th>Gelombang</th>
                        <th>Status Verifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftar as $data)
                    <tr>
                        <td>{{ $data->nisn }}</td>
                        <td>{{ $data->nama_lengkap }}</td>
                        <td>{{ $data->gelombang->nama ?? 'Tidak diketahui' }}</td>
                        <td class="status-verifikasi-{{ strtolower($data->status_verifikasi) }}">
                            {{ ucfirst($data->status_verifikasi) }}
                        </td>
                        <td>
                            <a href="{{ route('admin.pendaftar.detail', $data->nisn) }}" class="button">Lihat Dokumen</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');

            sidebar.classList.toggle('open');
            mainContent.classList.toggle('sidebar-open');

            // For mobile devices, add overlay when sidebar is open
            if (sidebar.classList.contains('open')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'auto';
            }
        }

        // Close sidebar when clicking outside of it
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuBtn = document.querySelector('.menu-btn');

            if (!sidebar.contains(event.target) && event.target !== menuBtn) {
                sidebar.classList.remove('open');
                document.getElementById('main-content').classList.remove('sidebar-open');
                document.body.style.overflow = 'auto';
            }
        });

        // Close sidebar when window is resized to desktop size
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                document.getElementById('sidebar').classList.remove('open');
                document.getElementById('main-content').classList.remove('sidebar-open');
                document.body.style.overflow = 'auto';
            }
        });
    </script>
</body>

</html>