<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita UIHC</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/comprof.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/beritaglobal.css')}}">
</head>

<body>

    @include('partials.navbar')
    <div class="container">
        <h2 class="page-title">Berita Terbaru</h2>

        <div class="grid-berita">
            @foreach ($beritas as $b)
            <div class="berita-card">
                <img src="{{ asset('storage/' . $b->gambar) }}" alt="{{ $b->judul }}">
                <div class="berita-body">
                    <h3>{{ $b->judul }}</h3>
                    <p>{{ Str::limit(strip_tags($b->isi_konten), 120) }}</p>
                    <a href="{{ route('beritaglobalshow', ['id' => $b->id]) }}" class="btn-detail">Selengkapnya</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @include('partials.footer')
    <script>
        feather.replace();
    </script>

</body>

</html>