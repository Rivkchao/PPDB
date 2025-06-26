<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Umbrella International Highschool</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>

    @include('partials.navbar')
    <section id="home" class="home">
        <div class="row">
            <div class="wrapper">
                <img class="logo-background" src="image/UMBRELLA-02.png" alt="logobg-uihc">
                <h1 class="home-title">Tempat Dimana Pemimpin Dilahirkan</h1>
                <p class="home-title-small">Selamat Datang di Umbrella International Highschool, Sekolah pilihan terbaik di dunia untuk kamu yang ingin mewujudkan mimpimu menjadi nyata</p>
                <a class="regist" href="{{route('pendaftaran.form')}}">Daftar Sekarang</a>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <h1 class="title">Tentang Sekolah</h1>
        <p class="title-desc">Umbrella International High School adalah institusi pendidikan menengah atas bertaraf internasional yang berfokus pada keunggulan akademis, pengembangan karakter, dan pemikiran global. Berdiri sejak pertengahan dekade ini, kami berlokasi strategis di Jakarta dan memberikan pengalaman belajar dinamis bagi siswa usia 14–18 tahun.
        </p>
        <div class="row">
            <div class="image-about">
                <img class="image" src="image/founder.jpg" data-aos="fade-right" alt="founder-uihc">
            </div>
            <div class="content-about">
                <div class="wrap" data-aos="fade-left" data-aos-delay="400" data-aos-easing="ease-in-sine">

                    <h3 class="title-content">Visi & Misi</h3>
                    <p class="text-desc">Menjadi pusat pendidikan internasional unggulan, yang melahirkan generasi muda berdaya saing global, etis, dan peduli terhadap lingkungan.</p>
                    <p class="text-desc">1. Menyediakan kurikulum berbasis Cambridge IGCSE dan IB Diploma, dibawakan oleh tenaga pengajar berpengalaman dan bersertifikasi internasional.</p>
                    <p class="text-desc">2. Mengembangkan karakter kepemimpinan, kolaborasi, kreativitas, dan kepekaan sosial melalui berbagai program akademis dan ekstra­kurikuler.</p>
                    <p class="text-desc">3. Menciptakan komunitas pelajar yang inklusif, menghormati keberagaman budaya, dan membangun empati melalui pengalaman lintas budaya.</p>
                    <p class="text-desc">4. Mempersiapkan siswa menuju studi lanjut di universitas ternama, baik dalam maupun luar negeri.</p>
                </div>
                <div class="wrap" data-aos="fade-left" data-aos-delay="400" data-aos-easing="ease-in-sine">

                    <h3 class="title-content">Nilai‑Nilai</h3>
                    <p class="text-desc">1. Integrity (Integritas): Menanamkan kejujuran dan tanggung jawab dalam setiap aspek pembelajaran dan interaksi.</p>
                    <p class="text-desc">2. Excellence (Keunggulan): Berorientasi pada kualitas dalam akademik, olahraga, seni, dan layanan masyarakat.</p>
                    <p class="text-desc">3. Respect (Respek): Menghargai diri sendiri, orang lain, dan lingkungan.</p>
                    <p class="text-desc">4. Innovation (Inovasi): Melatih siswa menjadi pemecah masalah, berpikir kritis, dan kreatif.</p>
                    <p class="text-desc">5. Global Citizenship (Kewarganegaraan Global): Berperan aktif dalam isu sosial dan lingkungan secara lokal dan global.</p>

                </div>
                <div class="wrap" data-aos="fade-left" data-aos-delay="400" data-aos-easing="ease-in-sine">

                    <h3 class="title-content">Program & Kurikulum</h3>
                    <p class="text-desc">1. Cambridge IGCSE (Kelas 10–11): Mata pelajaran inti seperti Bahasa Inggris, Matematika, Sains, Bahasa Asing, dan Humaniora.</p>
                    <p class="text-desc">2. IB Diploma Programme (Kelas 12–13): Kurikulum internasional yang menekankan riset (Extended Essay), kreativitas (CAS), serta mata pelajaran HL/SL.</p>
                    <p class="text-desc">3. Paket Bahasa Asing: Bahasa Mandarin, Prancis, serta Bahasa Indonesia dan Agama Sesuai Kebutuhan.</p>
                    <p class="text-desc">4. Ekstrakurikuler & Layanan Masyarakat: Klub olahraga, seni, tarik suara, debat, Model PBB, coding, kepemimpinan dan kegiatan sosial.</p>

                </div>
            </div>

        </div>

    </section>

    <section class="kontak" id="kontak">
        <h1 class="title">Kontak</h1>
        <p class="title-desc">Jika Anda memiliki pertanyaan lebih lanjut mengenai pendaftaran, program akademik, kunjungan kampus, atau informasi umum lainnya, tim kami siap membantu Anda.

            Silakan hubungi kami melalui informasi di bawah ini, atau isi formulir kontak untuk dihubungi langsung oleh staf administrasi kami.</p>

        <div class="row">
            <div class="map-content">

                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d104253.81474754732!2d106.68806084335938!3d-6.357817999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed5873b95e8f%3A0x73a3d74cfe631348!2sUniversitas%20Nusa%20Mandiri%20Kampus%20Margonda!5e1!3m2!1sid!2sid!4v1750748674105!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="content-kontak">
                <div class="item">
                    <i data-feather="mail"></i>
                    <p>umbrellainternationalhighschool@uihc.id</p>
                </div>
                <div class="item">
                    <i data-feather="instagram"></i>
                    <p>@UI - Highschool</p>
                </div>
                <div class="item">
                    <i data-feather="facebook"></i>
                    <p>@UI - Highschool</p>
                </div>
                <div class="item">
                    <i data-feather="phone"></i>
                    <p>+62 821-2212-3323</p>
                </div>
            </div>
        </div>


    </section>
    @include('partials.footer')
    
    <script>
        feather.replace();
        AOS.init();
    </script>

</body>

</html>