-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2025 at 01:39 PM
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
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '5678904321', 'dokumen/u8MDsWtOImCu9ncOFS1snt8Hxob2p3h114NBF3Tg.png', 'dokumen/68RvWOjcVhJp14KFGVOJu3Ckoo2K6Xp7hIGi1MTj.jpg', 'dokumen/L9eEja0r75Nev3yhB7ylcJGWEvzyL1XLHe6x2FwP.jpg', 'dokumen/xCrIBSI6q9q1ny3D5fflMyKUKbyiET6kft6ePTts.jpg', 'dokumen/IxtSoBnTdAOcRMWHVOqmx54UoHomivTFUkxqYXOk.jpg', '2025-06-21 07:47:45'),
(2, '2806050008', 'dokumen/JrkM9cjNWAfE4qY17HF3vmr9mSJcNEy4xphLlQnG.png', 'dokumen/ChTTkNd6OdYuuqbb59iiy62maNqK9u25RaDmDg2a.jpg', 'dokumen/3h4hn26zJAywsbhpFJQ6Q0OryNXuSskLcnPSCkEl.jpg', 'dokumen/Q4yvBr4TkJx5CBTUCsTPBV0Yg7i0sGMrke1OOVpF.jpg', 'dokumen/GG7VtyyoHw8enwxxN8yYE0u6RFiIkiNzoAyEWE37.jpg', '2025-06-21 12:58:11'),
(3, '2346767699', 'dokumen/C3uw6QsYJ1409sJf55FdONqs2JsQukF4KrV7k8U8.png', 'dokumen/zTzSxSk8ClLmbMHAWPVqcv4eTyOXzCxuPPdPOEHP.jpg', 'dokumen/sbfTrMcnG94ycHNyBmtlICX5RRl6MlExokkrzLuo.jpg', 'dokumen/mgNllWeFBWoxqlXDwoBoi23xJq9loY3C1yDxKYFJ.jpg', 'dokumen/6y9YLpMeqTAnndyQrWsc2BjQkBpgtqNKLwZOHwMI.jpg', '2025-06-21 13:02:45'),
(4, '123', 'dokumen/xAdDGdcbv0UZzLwbNIkHYQhWVWWTcIikOy0LHZPS.png', 'dokumen/11pZ43dZdCx58O5q3C3X6Z4S84LOzZlJMrV6lwfr.jpg', 'dokumen/pytxD6H7aU3ueZm3N7dKQHdLmatpGQ88YmU9XLbZ.jpg', 'dokumen/yL5rhLVqBeh3Nlyghs3UtskMWGK192lvayvDT1H6.jpg', 'dokumen/zda3XMoj443rWM0MVLotVmE84XxWle8Nud2uqz3G.jpg', '2025-06-21 13:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gelombang`
--

CREATE TABLE `gelombang` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `biaya` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gelombang`
--

INSERT INTO `gelombang` (`id`, `nama`, `tanggal_mulai`, `tanggal_selesai`, `biaya`, `created_at`, `updated_at`) VALUES
(4, 'Gelombang 1', '2025-06-01', '2025-06-30', 150000, '2025-06-21 12:55:50', '2025-06-21 12:55:50'),
(5, 'Gelombang 2', '2025-07-01', '2025-07-31', 180000, '2025-06-21 12:55:50', '2025-06-21 12:55:50'),
(6, 'Gelombang 3', '2025-08-01', '2025-08-31', 210000, '2025-06-21 12:55:50', '2025-06-21 12:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_21_061640_create_pendaftars_table', 1),
(5, '2025_06_21_061729_create_dokumen_siswa_table', 1),
(6, '2025_06_21_070655_create_pembayaran_table', 1),
(7, '2025_06_21_074513_update_pembayaran_table_add_fields', 2),
(8, '2025_06_21_124508_create_gelombang_table', 3),
(9, '2025_06_21_124624_add_gelombang_id_to_pendaftar_table', 4),
(10, '2025_06_21_125321_create_gelombang_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint UNSIGNED NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `gross_amount` int NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `transaction_time` timestamp NULL DEFAULT NULL,
  `midtrans_response` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `nisn`, `order_id`, `status`, `gross_amount`, `payment_type`, `transaction_time`, `midtrans_response`, `created_at`, `updated_at`) VALUES
(1, '5678904321', 'ORDER-5678904321-1750493221', 'pending', 1, '-', '2025-06-21 01:07:02', '{\"customer_details\": {\"first_name\": \"Rivky Chao\"}, \"transaction_details\": {\"order_id\": \"ORDER-5678904321-1750493221\", \"gross_amount\": 1}}', '2025-06-21 01:07:02', '2025-06-21 01:07:02'),
(2, '5678904321', 'ORDER-5678904321-1750493530', 'pending', 1, '-', '2025-06-21 01:12:11', '{\"customer_details\": {\"first_name\": \"Rivky Chao\"}, \"transaction_details\": {\"order_id\": \"ORDER-5678904321-1750493530\", \"gross_amount\": 1}}', '2025-06-21 01:12:11', '2025-06-21 01:12:11'),
(3, '5678904321', 'ORDER-5678904321-1750493611', 'pending', 1, '-', '2025-06-21 01:13:32', '{\"customer_details\": {\"first_name\": \"Rivky Chao\"}, \"transaction_details\": {\"order_id\": \"ORDER-5678904321-1750493611\", \"gross_amount\": 1}}', '2025-06-21 01:13:32', '2025-06-21 01:13:32'),
(4, '5678904321', 'ORDER-5678904321-1750493756', 'pending', 1, '-', '2025-06-21 01:15:56', '{\"customer_details\": {\"first_name\": \"Rivky Chao\"}, \"transaction_details\": {\"order_id\": \"ORDER-5678904321-1750493756\", \"gross_amount\": 1}}', '2025-06-21 01:15:56', '2025-06-21 01:15:56'),
(5, '5678904321', 'ORDER-5678904321-1750494009', 'pending', 1, '-', '2025-06-21 01:20:10', '{\"customer_details\": {\"first_name\": \"Rivky Chao\"}, \"transaction_details\": {\"order_id\": \"ORDER-5678904321-1750494009\", \"gross_amount\": 1}}', '2025-06-21 01:20:10', '2025-06-21 01:20:10'),
(6, '5678904321', 'ORDER-5678904321-1750494062', 'pending', 1, '-', '2025-06-21 01:21:03', '{\"customer_details\": {\"first_name\": \"Rivky Chao\"}, \"transaction_details\": {\"order_id\": \"ORDER-5678904321-1750494062\", \"gross_amount\": 1}}', '2025-06-21 01:21:03', '2025-06-21 01:21:03'),
(7, '5678904321', 'ORDER-5678904321-1750494160', 'pending', 1, '-', '2025-06-21 01:22:41', '{\"customer_details\": {\"first_name\": \"Rivky Chao\"}, \"transaction_details\": {\"order_id\": \"ORDER-5678904321-1750494160\", \"gross_amount\": 1}}', '2025-06-21 01:22:41', '2025-06-21 01:22:41'),
(8, '5678904321', 'ORDER-5678904321-1750494235', 'pending', 1, '-', '2025-06-21 01:23:56', '{\"customer_details\": {\"first_name\": \"Rivky Chao\"}, \"transaction_details\": {\"order_id\": \"ORDER-5678904321-1750494235\", \"gross_amount\": 1}}', '2025-06-21 01:23:56', '2025-06-21 01:23:56'),
(9, '123', 'ORDER-123-1750511262', 'pending', 150000, '-', '2025-06-21 06:07:44', '{\"customer_details\": {\"first_name\": \"ertjygk\"}, \"transaction_details\": {\"order_id\": \"ORDER-123-1750511262\", \"gross_amount\": 150000}}', '2025-06-21 06:07:44', '2025-06-21 06:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` bigint UNSIGNED NOT NULL,
  `gelombang_id` bigint UNSIGNED DEFAULT NULL,
  `nisn` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal_sekolah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ortu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ortu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ortu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_ortu` text COLLATE utf8mb4_unicode_ci,
  `pendidikan_ortu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon_ortu` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_verifikasi` enum('menunggu','terbayar','diterima','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `gelombang_id`, `nisn`, `nama_lengkap`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `telepon`, `email`, `asal_sekolah`, `jurusan`, `nama_ortu`, `pekerjaan_ortu`, `penghasilan_ortu`, `alamat_ortu`, `pendidikan_ortu`, `telepon_ortu`, `status_verifikasi`, `updated_at`) VALUES
(1, NULL, '5678904321', 'Rivky Chao', '3175032806050008', 'Land Of Dawn', '1111-11-11', 'Laki-laki', 'Hindu', 'Jl. Raya Jatiwaringin No.2, RT.8/RW.13', '081234567895', 'anakpapi.moonton@ac.id', 'SMP HOK', 'TKJ', 'Nolan', 'Hero', '1-3jt', 'Jl. Raya Jatiwaringin No.2, RT.8/RW.13', 'SMA', '081234567891', 'terbayar', '2025-06-21 07:47:45'),
(2, NULL, '2806050008', 'cocofun', '312435465586912', 'Land Of Dawn', '2012-12-12', 'Laki-laki', 'Buddha', 'Jl. Raya Jatiwaringin No.2, RT.8/RW.13', '081234567895', 'Dev@g.c', 'HOK SCHOOL', 'MP', 'Nolan', 'Hero', '3-5jt', 'Jl. Raya Jatiwaringin No.2, RT.8/RW.13', 'Pasca Sarjana', '081234567892', 'menunggu', '2025-06-21 12:58:10'),
(3, NULL, '2346767699', 'fsdgfhgfnnd', '234565534', 'fgshdjgfnf', '1111-11-11', 'Perempuan', 'Khonghucu', 'fdfhgjhgfghdg', '12345657098', 'sgrdhtjf@g.c', 'dfsddghf', 'DKV', 'fdgnhg', 'sdfgnvhbm', '3-5jt', 'dfdfgchvhvbm', 'Sarjana', '23565787', 'menunggu', '2025-06-21 13:02:45'),
(4, 4, '123', 'ertjygk', '321', 'j', '1111-11-11', 'Laki-laki', 'Islam', 'fsdgfg', '1234', 'sdg@g.c', 'fsdfhg', 'TKJ', 'fgfngh', 'fgfg', '3-5jt', 'ergdtf', 'SMP', '1234', 'terbayar', '2025-06-21 13:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AUKYIIthlPUf1ywb9QynmPRQi4sSNwlmvezdfMLy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWE1VR2tnWUFSY1A0VGlvYUl0UUNsMGc3cXVaaGhBN1k5MGR3SE5WdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaXN3YS9wcm9maWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6Im5pc24iO3M6MzoiMTIzIjt9', 1750512413);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `dokumen_siswa`
--
ALTER TABLE `dokumen_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pembayaran_order_id_unique` (`order_id`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendaftar_nisn_unique` (`nisn`),
  ADD KEY `pendaftar_gelombang_id_foreign` (`gelombang_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumen_siswa`
--
ALTER TABLE `dokumen_siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gelombang`
--
ALTER TABLE `gelombang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `pendaftar_gelombang_id_foreign` FOREIGN KEY (`gelombang_id`) REFERENCES `gelombang` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
