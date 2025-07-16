-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 16, 2025 at 12:35 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uihc`
--

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `gambar`, `isi_konten`, `tanggal`, `created_at`, `updated_at`) VALUES
(4, 'Agentic AI: Masa Depan Kecerdasan Buatan yang Lebih Mandiri', 'berita/tlZR9yveSfcwZEu06ueYo0XqKGYdpZIxKvUwMLqU.png', 'Dalam perkembangan terbaru dunia kecerdasan buatan, muncul konsep baru yang mulai menarik perhatian para peneliti dan pelaku industri: Agentic AI. Tidak seperti model AI tradisional yang pasif dan hanya merespons perintah pengguna, Agentic AI dirancang untuk memiliki kemampuan mengambil inisiatif, merencanakan, dan bertindak secara otonom dalam mencapai tujuan tertentu.\r\n\r\nAgentic AI mampu memecah masalah kompleks menjadi langkah-langkah kecil, menetapkan sub-tujuan, dan menyesuaikan strategi berdasarkan hasil yang dicapai — semuanya tanpa campur tangan manusia secara langsung. Teknologi ini membuka peluang besar di berbagai sektor seperti otomasi bisnis, riset ilmiah, hingga sistem pendukung keputusan.\r\n\r\nMeski menjanjikan efisiensi yang tinggi, pengembangan Agentic AI juga memunculkan tantangan baru, terutama dalam hal kontrol, etika, dan transparansi. Para ahli menekankan pentingnya membangun sistem agentic yang tetap berada dalam kerangka nilai-nilai manusia dan bertanggung jawab sosial.\r\n\r\nSeiring terus berkembangnya teknologi ini, Agentic AI diprediksi akan menjadi salah satu pilar utama dalam revolusi kecerdasan buatan generasi berikutnya.', '2025-06-24', '2025-06-24 05:56:13', '2025-06-24 05:56:13'),
(5, 'IEEE Organization Buka Rekrutmen Anggota Baru, Siap Kembangkan Inovator Muda Teknologi', 'berita/i9zj2YYQoXItBiR1IhNGrNpfV3OoyZF6whHaGs1q.png', 'Organisasi IEEE (Institute of Electrical and Electronics Engineers) resmi membuka rekrutmen anggota baru bagi mahasiswa yang tertarik di bidang teknologi, elektronika, dan rekayasa sistem. Rekrutmen ini menjadi kesempatan emas bagi para inovator muda untuk bergabung dalam komunitas global yang telah melahirkan banyak tokoh penting di dunia teknologi.\r\n\r\nMelalui kegiatan ini, calon anggota akan mendapatkan akses ke berbagai pelatihan eksklusif, seminar internasional, publikasi ilmiah, serta proyek-proyek kolaboratif lintas negara. Tak hanya itu, IEEE juga aktif mendorong anggotanya untuk berkontribusi langsung dalam pengembangan teknologi yang berdampak nyata bagi masyarakat.\r\n\r\n“Kami ingin membentuk lingkungan yang mendorong kreativitas, kolaborasi, dan kepemimpinan teknologi,” ujar ketua panitia rekrutmen IEEE Student Branch.\r\n\r\nRekrutmen terbuka bagi seluruh mahasiswa dari berbagai jurusan yang memiliki minat kuat dalam bidang teknologi. Proses seleksi mencakup pendaftaran online, wawancara singkat, dan penugasan berbasis minat.\r\n\r\nBagi kamu yang ingin memperluas koneksi, membangun portofolio profesional, dan berkontribusi dalam kemajuan dunia teknologi, inilah saatnya menjadi bagian dari keluarga besar IEEE.', '2025-06-24', '2025-06-24 05:56:42', '2025-06-24 05:56:42'),
(6, 'Workshop UI/UX Design: Membangun Pengalaman Digital yang Lebih Manusiawi', 'berita/QWYA2ZmNgaa3g44f6u1OXCr7rgYLBSSVHAqL5X6O.jpg', 'Dalam upaya meningkatkan keterampilan desain digital di kalangan mahasiswa, diadakan workshop bertema “UI/UX Design: Creating Human-Centered Interfaces”. Acara ini menghadirkan praktisi industri dan mentor dari startup teknologi lokal, yang membagikan pengalaman langsung seputar bagaimana membangun antarmuka aplikasi yang intuitif dan ramah pengguna.\r\n\r\nWorkshop ini membahas dasar-dasar desain antarmuka (UI), prinsip pengalaman pengguna (UX), serta tren terbaru dalam desain digital modern. Peserta juga diberi kesempatan untuk melakukan praktik langsung menggunakan tools populer seperti Figma dan Adobe XD.\r\n\r\nKegiatan ini disambut antusias oleh mahasiswa dari berbagai jurusan, terutama yang tertarik mengembangkan aplikasi mobile dan web. Workshop ini diharapkan mampu memacu lahirnya desainer-desainer muda yang peduli pada aspek fungsionalitas dan kenyamanan pengguna.', '2025-06-24', '2025-06-24 05:58:14', '2025-06-24 05:58:14'),
(7, 'Diskusi Panel: Etika Kecerdasan Buatan dan Tantangannya di Indonesia', 'berita/0bZAMX5eYBVgWK4pwp39PFokzadjGt41FMckQzJh.jpg', 'Dalam rangka menyikapi pesatnya perkembangan teknologi kecerdasan buatan (AI), diadakan diskusi panel bertajuk “Etika AI dan Implementasinya di Indonesia”. Kegiatan ini menghadirkan akademisi, peneliti, serta perwakilan industri yang membahas urgensi pengembangan AI yang etis dan bertanggung jawab.\r\n\r\nBeberapa isu utama yang diangkat antara lain transparansi algoritma, bias data, perlindungan privasi, serta tanggung jawab pengambilan keputusan oleh sistem AI. Diskusi ini juga mengulas bagaimana kebijakan pemerintah dan pendidikan tinggi perlu bersinergi untuk menyiapkan kerangka hukum dan sumber daya manusia yang memadai.\r\n\r\nPanel ini menjadi ruang penting bagi mahasiswa untuk memahami bukan hanya sisi teknis AI, tetapi juga dampak sosial dan moral yang menyertainya. Inisiatif seperti ini diharapkan dapat mendorong terciptanya teknologi yang inklusif dan berpihak pada kepentingan masyarakat luas.', '2025-06-24', '2025-06-24 05:58:52', '2025-06-24 05:58:52'),
(8, 'Pelatihan Git & Version Control: Bekal Wajib untuk Developer Masa Kini', 'berita/lwHCVyoHarQjErdtmIu1tWzfLTLrz3Ko9gNaiaxo.jpg', 'Dalam era kolaborasi digital, kemampuan mengelola versi kode menjadi sangat penting bagi para pengembang perangkat lunak. Menjawab kebutuhan tersebut, komunitas teknologi kampus menggelar pelatihan bertajuk “Mastering Git & Version Control”.\r\n\r\nPelatihan ini bertujuan memperkenalkan konsep dasar Git, seperti commit, branch, merge, hingga kolaborasi menggunakan GitHub. Para peserta diajak langsung mempraktikkan skenario kerja tim dengan simulasi proyek kolaboratif.\r\n\r\n“Git bukan cuma alat, tapi bagian penting dari workflow profesional,” ungkap salah satu mentor. Dengan pelatihan ini, mahasiswa diharapkan siap menghadapi standar kerja industri teknologi yang menuntut efisiensi dan koordinasi tinggi dalam pengembangan perangkat lunak.', '2025-06-24', '2025-06-24 06:00:28', '2025-06-24 06:00:28'),
(9, 'AI Hackathon 2025: Mahasiswa Berlomba Ciptakan Solusi Berbasis Kecerdasan Buatan', 'berita/BRhePLxfnvRFP5y2jicZwuTCpc5C7Ecn20iYvLlR.jpg', 'Semangat inovasi dan kolaborasi terlihat jelas dalam gelaran AI Hackathon 2025, di mana tim mahasiswa berlomba mengembangkan solusi berbasis kecerdasan buatan dalam waktu 48 jam.\r\n\r\nAcara ini menghadirkan tantangan di berbagai bidang, mulai dari kesehatan, pendidikan, hingga lingkungan. Beberapa tim mengembangkan chatbot konseling, detektor penyakit dari citra medis, hingga sistem prediksi cuaca berbasis data lokal.\r\n\r\nHackathon ini tidak hanya menguji kemampuan teknis peserta, tetapi juga mendorong kerja tim, kreativitas, dan ketahanan menghadapi tekanan waktu. Kegiatan ini menjadi bukti nyata bahwa mahasiswa memiliki potensi besar dalam menciptakan solusi inovatif untuk masalah nyata di masyarakat.', '2025-06-24', '2025-06-24 06:01:11', '2025-06-24 06:01:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
