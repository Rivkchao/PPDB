<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita UIHC</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/comprof.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/beritaglobalshow.css')}}">
</head>

<body>

    @include('partials.navbar')
    <div class="container">
        <h2 class="page-title">{{ $berita->judul }}</h2>
        <p style="color: #666;">Dipublikasikan pada: {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}</p>
        <img src="{{ asset('storage/' . $berita->gambar) }}" style="width:100%; max-width:700px; border-radius:8px; margin-bottom:20px;">
        <div style="line-height:1.8; color:#333;">
            {!! nl2br(e($berita->isi_konten)) !!}
        </div>
    </div>
    @include('partials.footer')
    <script>
        feather.replace();
    </script>

</body>

</html>