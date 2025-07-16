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
-- Table structure for table `dokumen_siswa`
--

CREATE TABLE `dokumen_siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `nisn` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pas_foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scan_ijazah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scan_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scan_akta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scan_kelakuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploaded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumen_siswa`
--

INSERT INTO `dokumen_siswa` (`id`, `nisn`, `pas_foto`, `scan_ijazah`, `scan_kk`, `scan_akta`, `scan_kelakuan`, `uploaded_at`) VALUES
(11, '1234567890', 'dokumen/syTR6YUoWhV8vXvxmbAA6x4fb89ku2cDGWn9l80O.jpg', 'dokumen/w5TTD6nQrJUPVNh6ZFLpyLP2NQwKObxb6wAqxC1D.pdf', 'dokumen/xVSS1i6twacSIxIvHgnWYJcKUuOxrdQm5voCl9zd.pdf', 'dokumen/E8iIip2aI8JutJSYGZuy7ECPdWElJfVKiTBoN9dF.pdf', 'dokumen/KO0OJ3H3g3VRws3GyMK1ll3gZ37yaO4vdwb63h5m.pdf', '2025-07-16 00:33:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen_siswa`
--
ALTER TABLE `dokumen_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dokumen_siswa_nisn` (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumen_siswa`
--
ALTER TABLE `dokumen_siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumen_siswa`
--
ALTER TABLE `dokumen_siswa`
  ADD CONSTRAINT `fk_dokumen_siswa_nisn` FOREIGN KEY (`nisn`) REFERENCES `pendaftar` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
