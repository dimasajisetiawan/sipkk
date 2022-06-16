-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2022 at 01:10 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipkk`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_penyumbang`
--

CREATE TABLE `daftar_penyumbang` (
  `id_daftar_penyumbang` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nominal` decimal(16,2) NOT NULL,
  `tgl_sumbangan` date NOT NULL,
  `id_penyumbang` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_penyumbang`
--

INSERT INTO `daftar_penyumbang` (`id_daftar_penyumbang`, `id_user`, `nominal`, `tgl_sumbangan`, `id_penyumbang`, `created_at`, `updated_at`) VALUES
(1, 1, '500000.00', '2010-11-10', 1, '2022-06-10 04:58:03', '2022-06-10 04:58:03'),
(2, 2, '500000.00', '2010-11-12', 1, '2022-06-10 04:58:03', '2022-06-10 04:58:03'),
(3, 2, '500000.00', '2010-11-14', 1, '2022-06-10 04:58:03', '2022-06-10 04:58:03'),
(4, 1, '30000000000000.00', '2022-06-10', 2, '2022-06-10 05:18:21', '2022-06-10 05:18:21'),
(5, 1, '90000000000000.00', '2022-06-10', 2, '2022-06-10 05:18:37', '2022-06-10 05:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level_dua`
--

CREATE TABLE `level_dua` (
  `id_level_dua` bigint(20) UNSIGNED NOT NULL,
  `kode_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_level_satu` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level_dua`
--

INSERT INTO `level_dua` (`id_level_dua`, `kode_akun`, `nama_akun`, `id_level_satu`, `created_at`, `updated_at`) VALUES
(1, '01', 'KAS LINGKUNGAN', 1, '2022-06-10 04:58:03', '2022-06-10 04:58:03'),
(2, '01', 'Biaya', 2, '2022-06-10 04:58:03', '2022-06-10 04:58:03'),
(3, '01', 'BIAYA LITURGI & PERIBADATAN', 3, '2022-06-10 04:58:03', '2022-06-10 04:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `level_satu`
--

CREATE TABLE `level_satu` (
  `id_level_satu` bigint(20) UNSIGNED NOT NULL,
  `kode_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level_satu`
--

INSERT INTO `level_satu` (`id_level_satu`, `kode_akun`, `nama_akun`, `created_at`, `updated_at`) VALUES
(1, '1', 'KAS', '2022-06-10 04:58:03', '2022-06-10 04:58:03'),
(2, '4', 'PENERIMAAN', '2022-06-10 04:58:03', '2022-06-10 04:58:03'),
(3, '5', 'BIAYA', '2022-06-10 04:58:03', '2022-06-10 04:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `level_tiga`
--

CREATE TABLE `level_tiga` (
  `id_level_tiga` bigint(20) UNSIGNED NOT NULL,
  `kode_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_level_dua` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level_tiga`
--

INSERT INTO `level_tiga` (`id_level_tiga`, `kode_akun`, `nama_akun`, `id_level_dua`, `created_at`, `updated_at`) VALUES
(1, '01', 'KAS LINGKUNGAN', 1, '2022-06-10 04:58:03', '2022-06-10 04:58:03'),
(2, '02', 'KAS KECIL BLOK', 1, '2022-06-10 04:58:03', '2022-06-10 04:58:03'),
(3, '01', 'KOLEKTE', 2, '2022-06-10 04:58:03', '2022-06-10 04:58:03'),
(4, '02', 'KOLEKTE PART 2', 2, '2022-06-10 04:58:03', '2022-06-10 04:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_27_050114_level_satu', 1),
(6, '2022_05_27_050207_level_dua', 1),
(7, '2022_05_27_050232_level_tiga', 1),
(8, '2022_05_27_050352_sumbangan', 1),
(9, '2022_05_27_050455_penyumbang', 1),
(10, '2022_05_27_050519_daftar_penyumbang', 1),
(11, '2022_05_27_050551_transaksi', 1),
(12, '2022_05_30_013951_create_trigger_penyumbang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyumbang`
--

CREATE TABLE `penyumbang` (
  `id_penyumbang` bigint(20) UNSIGNED NOT NULL,
  `kode_kegiatan` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyumbang`
--

INSERT INTO `penyumbang` (`id_penyumbang`, `kode_kegiatan`, `created_at`, `updated_at`) VALUES
(1, 'SBN_69', NULL, NULL),
(2, 'SBN_70', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sumbangan`
--

CREATE TABLE `sumbangan` (
  `kode_kegiatan` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sumbangan`
--

INSERT INTO `sumbangan` (`kode_kegiatan`, `nama_kegiatan`, `keterangan`, `tgl_buka`, `tgl_tutup`, `status`, `created_at`, `updated_at`) VALUES
('SBN_69', 'Sumbangan Gunung Merapi', 'Bantuan Korban Desa Cangkringan', '2010-11-10', '2010-11-20', 0, '2022-06-10 04:58:03', '2022-06-10 04:58:03'),
('SBN_70', 'Sumbangan Wedding Leoni & Dimas', 'test', '2022-06-10', '2022-06-10', 0, '2022-06-10 05:08:15', '2022-06-10 05:08:15');

--
-- Triggers `sumbangan`
--
DELIMITER $$
CREATE TRIGGER `after_sumbangan_insert` AFTER INSERT ON `sumbangan` FOR EACH ROW BEGIN
                        INSERT INTO `penyumbang`(`kode_kegiatan`) VALUES (NEW.kode_kegiatan);
                    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_level_satu` bigint(20) UNSIGNED NOT NULL,
  `id_level_dua` bigint(20) UNSIGNED DEFAULT NULL,
  `id_level_tiga` bigint(20) UNSIGNED DEFAULT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenis_saldo` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` decimal(17,2) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kegiatan` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_level_satu`, `id_level_dua`, `id_level_tiga`, `tgl_transaksi`, `jenis_saldo`, `saldo`, `keterangan`, `kode_kegiatan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-06-15', 'debit', '89080890808.00', 'test', NULL, '2022-06-15 00:54:43', '2022-06-15 00:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_users` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_temp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `nama`, `email`, `role_users`, `password`, `password_temp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Dimas Aji Setiawan', 'dimazaji619@gmail.com', 'admin', '$2y$10$jR1nX9V19/9dR71Syox8quHfvx3c/xn2Gum5lGOmEwgYkumghvGM6', '12345', NULL, '2022-06-10 04:58:03', '2022-06-10 04:58:03'),
(2, 'bendahara', 'Prima Ady Pamungkas', 'primady619@gmail.com', 'bendahara', '$2y$10$fx57GJN2mS6YH68VnVuA3Oh/AlHm5STAIShx2ZlqWCJbit59ThPK.', '12345', NULL, '2022-06-10 04:58:03', '2022-06-10 04:58:03'),
(3, 'pemantau', 'Dimas Aji Steven', 'dimazsteven619@gmail.com', 'pemantau', '$2y$10$TTLM/ZhBunXOQCje6cOhFuzRCiuxDnvKB/zYzESQR5fefC9rhlrOm', '12345', NULL, '2022-06-10 04:58:03', '2022-06-10 04:58:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_penyumbang`
--
ALTER TABLE `daftar_penyumbang`
  ADD PRIMARY KEY (`id_daftar_penyumbang`),
  ADD KEY `daftar_penyumbang_id_user_foreign` (`id_user`),
  ADD KEY `daftar_penyumbang_id_penyumbang_foreign` (`id_penyumbang`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `level_dua`
--
ALTER TABLE `level_dua`
  ADD PRIMARY KEY (`id_level_dua`),
  ADD KEY `level_dua_id_level_satu_foreign` (`id_level_satu`);

--
-- Indexes for table `level_satu`
--
ALTER TABLE `level_satu`
  ADD PRIMARY KEY (`id_level_satu`);

--
-- Indexes for table `level_tiga`
--
ALTER TABLE `level_tiga`
  ADD PRIMARY KEY (`id_level_tiga`),
  ADD KEY `level_tiga_id_level_dua_foreign` (`id_level_dua`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penyumbang`
--
ALTER TABLE `penyumbang`
  ADD PRIMARY KEY (`id_penyumbang`),
  ADD KEY `penyumbang_kode_kegiatan_foreign` (`kode_kegiatan`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sumbangan`
--
ALTER TABLE `sumbangan`
  ADD PRIMARY KEY (`kode_kegiatan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_kode_kegiatan_foreign` (`kode_kegiatan`),
  ADD KEY `transaksi_id_level_satu_foreign` (`id_level_satu`),
  ADD KEY `transaksi_id_level_dua_foreign` (`id_level_dua`),
  ADD KEY `transaksi_id_level_tiga_foreign` (`id_level_tiga`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_penyumbang`
--
ALTER TABLE `daftar_penyumbang`
  MODIFY `id_daftar_penyumbang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level_dua`
--
ALTER TABLE `level_dua`
  MODIFY `id_level_dua` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level_satu`
--
ALTER TABLE `level_satu`
  MODIFY `id_level_satu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level_tiga`
--
ALTER TABLE `level_tiga`
  MODIFY `id_level_tiga` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penyumbang`
--
ALTER TABLE `penyumbang`
  MODIFY `id_penyumbang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_penyumbang`
--
ALTER TABLE `daftar_penyumbang`
  ADD CONSTRAINT `daftar_penyumbang_id_penyumbang_foreign` FOREIGN KEY (`id_penyumbang`) REFERENCES `penyumbang` (`id_penyumbang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `daftar_penyumbang_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `level_dua`
--
ALTER TABLE `level_dua`
  ADD CONSTRAINT `level_dua_id_level_satu_foreign` FOREIGN KEY (`id_level_satu`) REFERENCES `level_satu` (`id_level_satu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `level_tiga`
--
ALTER TABLE `level_tiga`
  ADD CONSTRAINT `level_tiga_id_level_dua_foreign` FOREIGN KEY (`id_level_dua`) REFERENCES `level_dua` (`id_level_dua`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penyumbang`
--
ALTER TABLE `penyumbang`
  ADD CONSTRAINT `penyumbang_kode_kegiatan_foreign` FOREIGN KEY (`kode_kegiatan`) REFERENCES `sumbangan` (`kode_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_id_level_dua_foreign` FOREIGN KEY (`id_level_dua`) REFERENCES `level_dua` (`id_level_dua`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_id_level_satu_foreign` FOREIGN KEY (`id_level_satu`) REFERENCES `level_satu` (`id_level_satu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_id_level_tiga_foreign` FOREIGN KEY (`id_level_tiga`) REFERENCES `level_tiga` (`id_level_tiga`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_kode_kegiatan_foreign` FOREIGN KEY (`kode_kegiatan`) REFERENCES `sumbangan` (`kode_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
