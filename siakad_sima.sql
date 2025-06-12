-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2025 at 08:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad_sima`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` char(36) NOT NULL,
  `asal_sekolah_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `asal_sekolah_id`, `username`, `email`, `phone`, `password`, `foto_profil`, `created_at`, `updated_at`) VALUES
('0ae04540-0b40-47d6-b54a-bfe317e911b4', 3, 'Xaviera', 'xaviera@gmail.com', '0821387438232', '$2y$12$1CuI.yGJsjDjLbM2XWJUD.h/cS6hjWY2q87izYg7P6KEHlqv2umAi', '1747201265.jpeg', '2025-05-13 22:41:05', '2025-05-13 22:41:05'),
('6e6b2537-1288-4a25-9281-92e7b554a6ea', 2, 'Aditya Prasetyo', 'user.aditprasetyo25@gmail.com', '089531758539', '$2y$12$9F2nzUCAer0bKDZK8ZOPCuEgVZcax2T91.0i5VxqV4OW3zAlAJ26u', '1747200566.png', '2025-05-14 05:39:36', '2025-05-13 22:39:36'),
('878198b6-33cc-46d1-a55d-00df109bd443', 3, 'arfy slowy', 'arfy.slowy@gmail.com', '0899753294231', '$2y$12$1P.tMK7FTHxnuA1xzAPLaugBM7.IGX.0aHgTi812RIjOi0uo0LFfy', '1747201236.jpeg', '2025-05-13 22:40:36', '2025-05-13 22:40:36'),
('bc0dbf0d-d7c6-4f20-890e-46b1029c1d23', 2, 'Aditya Fernanda', 'adit.nanda@gmail.com', '089693633254', '$2y$12$A7omvpbyCtMppnkc0mHzh.rm8MfV6dtm.OqbAG7BbqlzY3MZo/xsO', 'foto-admin-1747199005.jpg', '2025-05-14 05:03:25', '2025-05-13 22:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nip` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Buddha','Hindu','Konghuchu') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `no_telepon` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jabatan` enum('ASN','Honorer','Magang','Waka Kesiswaan','Waka Kurikulum','Tata Usaha') NOT NULL,
  `pendidikan_terakhir` enum('Diploma','Sarjana','Megister','Doktor') NOT NULL,
  `tahun_masuk` int(11) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `username`, `nip`, `password`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `status`, `no_telepon`, `email`, `jabatan`, `pendidikan_terakhir`, `tahun_masuk`, `foto_profil`, `created_at`, `updated_at`) VALUES
('37b552fb-63df-410f-8af5-ed44783ca354', 'Deswita Mutia Putri', 708053481, '$2y$12$RCRG5ZMCryPks8/P2NeGauhKSVs2f/uS0SQErlo2z02OygPvBKjGa', 'Perempuan', 'Islam', 'Ketapang, Kalimantan Barat', '2004-06-10', 'aku tak tau dimane rumah nye', 'Aktif', 89528607792, 'deswita@gmail.com', 'ASN', 'Megister', 2022, 'foto-guru-1746847305.jpeg', '2025-05-09 20:21:45', '2025-05-09 20:21:45'),
('4a05a5e9-6ede-41d8-9df5-078b315dc41b', 'Novalgianto', 23908432, '$2y$12$Gp7/TwYj.wvUk01SVZholO6S2fHAj7AZ49uPoq.k8oVWVfGDUvMji', 'Laki-Laki', 'Islam', 'Ketapang, Kalimantan Barat', '2004-02-20', 'JL. BRIGJEND KATAMSO', 'Aktif', 89521479933, 'novalgiantoktp@gmai.com', 'Magang', 'Diploma', 2022, 'foto-guru-1747271742.jpeg', '2025-05-14 18:15:43', '2025-05-14 18:15:43'),
('5dabc99f-7d62-44c0-ae65-7479427c9c46', 'Junaidi', 8823888239, '$2y$12$qr93cfEJCi1dOEGE2ke3COW4ajC1QdnTzznVkv/SIOr8ntGC9uP7u', 'Laki-Laki', 'Islam', 'Ketapang, Kalimantan Barat', '1998-08-02', 'JL. D.I. Panjaitan', 'Tidak Aktif', 83824800823, 'junaidi@politap.ac.id', 'ASN', 'Diploma', 2021, 'foto-guru-1747205151.jpeg', '2025-05-15 02:39:06', '2025-05-14 19:39:06'),
('c6b77038-9fe8-44d3-9f20-d849c4ebf999', 'Heru Dwi Saputra', 708052481, '$2y$12$GdLZXIz0C.uA.4CiLKgKkes3ANmhGKJvx4k/1QP3R5z0CfgNpB3cm', 'Laki-Laki', 'Islam', 'Ketapang, Kalimantan Barat', '2004-07-13', 'dak tau alamat rumahnye', 'Aktif', 89521270307, 'herudwisaputra@gmail.com', 'ASN', 'Doktor', 2021, 'foto-guru-1746847553.jpeg', '2025-05-14 02:57:02', '2025-05-13 19:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `jurusan` enum('IPA','IPS') NOT NULL,
  `tingkat` enum('X','XI','XII') NOT NULL,
  `wali_kelas_id` char(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `jurusan`, `tingkat`, `wali_kelas_id`, `created_at`, `updated_at`) VALUES
(3, 'IPA 1', 'IPA', 'X', '37b552fb-63df-410f-8af5-ed44783ca354', '2025-05-09 21:39:10', '2025-05-09 21:39:10'),
(4, 'IPA 2', 'IPA', 'X', 'c6b77038-9fe8-44d3-9f20-d849c4ebf999', '2025-05-13 23:19:35', '2025-05-13 23:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` int(11) NOT NULL,
  `guru_id` char(36) NOT NULL,
  `kode_mapel` varchar(255) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapels`
--

INSERT INTO `mapels` (`id`, `guru_id`, `kode_mapel`, `nama_mapel`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, '37b552fb-63df-410f-8af5-ed44783ca354', 'MTK001', 'Matematika', 'Matematika', '2025-05-09 21:19:43', '2025-05-09 21:19:43'),
(3, 'c6b77038-9fe8-44d3-9f20-d849c4ebf999', 'ARB001', 'Bahasa Arab', 'Bahasa Arab', '2025-05-13 23:20:03', '2025-05-13 23:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `master_admins`
--

CREATE TABLE `master_admins` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_admins`
--

INSERT INTO `master_admins` (`id`, `username`, `email`, `password`, `foto_profil`, `created_at`, `updated_at`) VALUES
('c7694955-e46e-49e2-a782-1b7cd8994b2d', 'Sandhika Galih', 'sandhika.galih@gmail.com', '$2y$12$WKjv6yfFuId/A682RBfdVOsLuqmbj6hfGy3UvOHv4xxTZDbKacDpy', '1746686226.jpeg', '2025-05-09 01:20:54', '2025-05-08 18:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(53, '2025_01_03_122241_create_guru_table', 2),
(59, '2025_01_05_082443_create_siswa_table', 4),
(61, '0001_01_01_000000_create_users_table', 5),
(62, '0001_01_01_000001_create_cache_table', 5),
(63, '0001_01_01_000002_create_jobs_table', 5),
(64, '2024_11_07_043659_create_sekolahs_table', 5),
(65, '2024_11_07_053401_create_admins_table', 5),
(66, '2025_01_03_122212_create_master-admins_table', 6),
(67, '2025_01_03_122241_create_gurus_table', 6),
(68, '2025_01_05_082443_create_siswas_table', 6),
(69, '2025_01_06_023104_create_tahun-ajars_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sekolahs`
--

CREATE TABLE `sekolahs` (
  `id` int(11) NOT NULL,
  `nama_sekolah` text NOT NULL,
  `npsn` bigint(20) NOT NULL,
  `akreditasi` enum('A','B','C','Tidak Terakreditasi') NOT NULL,
  `kurikulum` enum('Kurikulum KTSP','Kurikulum K-13','Kurikulum Merdeka') NOT NULL,
  `kepala_sekolah` varchar(255) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `status_sekolah` enum('Negeri','Swasta') NOT NULL,
  `kepemilikan_sekolah` enum('Pemerintah Daerah','Yayasan') NOT NULL,
  `status_aktif` enum('Aktif','Tidak Aktif') NOT NULL,
  `jumlah_guru` int(11) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL,
  `tahun_berdiri` int(11) NOT NULL,
  `ruang_kelas` int(11) NOT NULL,
  `ruang_perpustakaan` int(11) NOT NULL,
  `ruang_lab` int(11) NOT NULL,
  `ruang_pimpinan` int(11) NOT NULL,
  `ruang_guru` int(11) NOT NULL,
  `tempat_ibadah` int(11) NOT NULL,
  `ruang_uks` int(11) NOT NULL,
  `toilet` int(11) NOT NULL,
  `ruang_tata_usaha` int(11) NOT NULL,
  `ruang_konseling` int(11) NOT NULL,
  `foto_sekolah` varchar(255) NOT NULL,
  `logo_sekolah` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekolahs`
--

INSERT INTO `sekolahs` (`id`, `nama_sekolah`, `npsn`, `akreditasi`, `kurikulum`, `kepala_sekolah`, `alamat_lengkap`, `email`, `telepon`, `status_sekolah`, `kepemilikan_sekolah`, `status_aktif`, `jumlah_guru`, `jumlah_siswa`, `tahun_berdiri`, `ruang_kelas`, `ruang_perpustakaan`, `ruang_lab`, `ruang_pimpinan`, `ruang_guru`, `tempat_ibadah`, `ruang_uks`, `toilet`, `ruang_tata_usaha`, `ruang_konseling`, `foto_sekolah`, `logo_sekolah`, `created_at`, `updated_at`) VALUES
(2, 'SMAN 3 Ketapang', 30103482, 'A', 'Kurikulum Merdeka', 'Dedy Sadar Setyawan', 'JL. GATOT SUBROTO NO. 18 KETAPANG', 'sman3ketapang@sch.id', '(5173) 889933', 'Negeri', 'Pemerintah Daerah', 'Aktif', 50, 1000, 1978, 25, 2, 5, 1, 1, 1, 2, 10, 1, 1, 'foto-1747195143.jpg', 'logo-1747195143.png', '2025-05-13 20:59:03', '2025-05-13 20:59:03'),
(3, 'SMAN 2 Ketapang', 30103481, 'A', 'Kurikulum Merdeka', 'TAJUDIN', 'JL. WOLTER MONGINSIDI NO 9 KETAPANG', 'sman2ketapang@yahoo.co.id', '(5173) 883322', 'Negeri', 'Pemerintah Daerah', 'Aktif', 50, 1000, 1975, 30, 2, 5, 1, 1, 1, 1, 20, 1, 1, 'foto-1747201155.jpg', 'logo-1747201155.png', '2025-05-13 22:39:15', '2025-05-13 22:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` char(36) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GJsIKlZmnLCUKhEZ6EgNfyY00UdBGsmNHfdFP7GP', '878198b6-33cc-46d1-a55d-00df109bd443', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUEJJNkpnYW5lWkxicVVOVGtScWxxV29WakZLNzJBanRrUW9KclVxUCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cDovL2xvY2FsaG9zdC9zaWFrYWQvYWRtaW4vZ3VydSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ3OiJodHRwOi8vbG9jYWxob3N0L3NpYWthZC9hZG1pbi90YWh1bi1hamFyL2NyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO3M6MzY6Ijg3ODE5OGI2LTMzY2MtNDZkMS1hNTVkLTAwZGYxMDliZDQ0MyI7fQ==', 1747325986),
('IUITD2rnVRdlieeBtX5SVRVSzrZRRv5FoWN2tz5Z', '878198b6-33cc-46d1-a55d-00df109bd443', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidHpCOUdoZU1LNlJ5VDRYV3BTNEtXTGxUR0lxemVJZVYxWHVhb3NqaSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9sb2NhbGhvc3Qvc2lha2FkL2FkbWluL3RhaHVuLWFqYXIvY3JlYXRlIjt9czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7czozNjoiODc4MTk4YjYtMzNjYy00NmQxLWE1NWQtMDBkZjEwOWJkNDQzIjt9', 1747302657),
('UDHUIREi4GjndWpSQIqGup9wO5H20DCRIRr99VD3', '878198b6-33cc-46d1-a55d-00df109bd443', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQllBRDJFY0IyTGRBNW82SWI5NHF4d1RDYzlTRTdEVG9IVFJ2ZWpDMCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MDoiaHR0cDovL2xvY2FsaG9zdC9zaWFrYWQvYWRtaW4vdGFodW4tYWphciI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vbG9jYWxob3N0L3NpYWthZC9hZG1pbi9ndXJ1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7czozNjoiODc4MTk4YjYtMzNjYy00NmQxLWE1NWQtMDBkZjEwOWJkNDQzIjt9', 1747358678),
('voEVVFZI6YcyEYNU0TF1suSh9oAiGvhE6muWeF11', NULL, '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2dGN0hIT2RlazlSOVh6NEI1Nng2UUU5eXBLVlZSZ2pscFVsdEVZMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9sb2NhbGhvc3Qvc2lha2FkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1747397632);

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` char(36) NOT NULL,
  `nisn` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(225) NOT NULL,
  `kelas` varchar(225) NOT NULL,
  `jenis_pendaftaran` enum('Peserta Didik Baru','Pindahan') NOT NULL,
  `jalur_pendaftaran` enum('Zonasi','Afirmasi','Perpindahan Orang Tua','Prestasi','Mandiri') NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `kebutuhan_khusus` enum('Iya','Tidak') NOT NULL,
  `email` varchar(225) NOT NULL,
  `no_kk` varchar(225) NOT NULL,
  `nik` varchar(225) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `agama` enum('Islam','Katolik','Kristen','Buddha','Hindu','Konghucu') NOT NULL,
  `tempat_lahir` varchar(225) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `dusun` varchar(225) NOT NULL,
  `desa_kelurahan` varchar(225) NOT NULL,
  `provinsi` varchar(225) NOT NULL,
  `kabupaten` varchar(225) NOT NULL,
  `kecamatan` varchar(225) NOT NULL,
  `telepon` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nisn`, `nis`, `nama_siswa`, `kelas`, `jenis_pendaftaran`, `jalur_pendaftaran`, `tanggal_masuk`, `status`, `kebutuhan_khusus`, `email`, `no_kk`, `nik`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `rt`, `rw`, `dusun`, `desa_kelurahan`, `provinsi`, `kabupaten`, `kecamatan`, `telepon`, `password`, `foto`, `created_at`, `updated_at`) VALUES
('003fe80f-1af3-4fc5-9c53-84226827b0c6', 83859722, 42726027, 'Endah Hasanah', 'IPA 3', 'Pindahan', 'Zonasi', '2025-01-09', 'Tidak Aktif', 'Iya', 'gaduhwahyudin@gmail.com', '9588360655617634', '9308548858810512', 'Perempuan', 'Buddha', 'Serang', '2015-05-22', 'Jl. Siliwangi No. 30, Salatiga, JK 71822', 85, 61, 'Dusun 9', 'Desa Gg. Ahmad Dahlan', 'Sulawesi Selatan', 'Probolinggo', 'Gg. Surapati', '+62 (787) 133-1509', '$2y$12$lGknI5fVto.PLTILsaJx0OLTUrpb/5yGdDLOQQyhqQQ3zp.Mb7cyy', 'foto-siswa-1747270839.jpeg', '2025-05-15 01:00:39', '2025-05-14 18:00:39'),
('05abb8d3-8967-4e22-ac0c-64c46f0f0598', 20518025, 33423314, 'Balidin Dongoran, S.T.', 'IPA 1', 'Pindahan', 'Zonasi', '2022-10-06', 'Tidak Aktif', 'Iya', 'corneliasuartini@perum.ponpes.id', '2985552297862820', '6307632319421738', 'Laki-Laki', 'Kristen', 'Tual', '2011-02-05', 'Gang Jakarta No. 511, Bengkulu, Nusa Tenggara Timur 94078', 16, 49, 'Dusun 4', 'Desa Gg. Medokan Ayu', 'Papua', 'Tarakan', 'Jl. Kapten Muslihat', '+62-0413-164-7525', '$2y$12$rM0v1cWotPbdmbbPnPiAeOa/LXfvuDpVTyz4h2chWxqCeEcRc9f5G', 'belum ada foto', '2025-05-14 01:49:54', '2025-05-14 01:49:54'),
('07b333ac-4483-4f69-859e-013ae46b970d', 37832907, 41315757, 'Fathonah Winarsih', 'IPA 2', 'Pindahan', 'Zonasi', '2025-02-01', 'Aktif', 'Iya', 'balidin30@pd.mil', '9492975332215264', '8893619750123070', 'Laki-Laki', 'Kristen', 'Sungai Penuh', '2011-09-20', 'Jalan Pasirkoja No. 388, Tidore Kepulauan, SN 53287', 12, 97, 'Dusun 8', 'Desa Jl. Jakarta', 'Jawa Timur', 'Serang', 'Gg. Sukabumi', '(0848) 018 4514', '$2y$12$f3TZt8cbdMt8GGzQDc0D/uAAdasPs/BQKADGv8wBMtrLqYhyQ8G0O', 'belum ada foto', '2025-05-14 01:49:54', '2025-05-14 01:49:54'),
('09d66615-aad3-4a6d-84be-e7ff8a3574f0', 10308844, 12528608, 'Sutan Lanjar Prasetya', 'IPA 4', 'Pindahan', 'Zonasi', '2023-10-09', 'Tidak Aktif', 'Tidak', 'kalimwinarsih@cv.id', '5260164250947999', '4666471019880349', 'Perempuan', 'Kristen', 'Bengkulu', '2009-08-09', 'Gang Rawamangun No. 0, Banjarmasin, RI 13338', 58, 18, 'Dusun 7', 'Desa Jalan Pelajar Pejuang', 'Sulawesi Tenggara', 'Batu', 'Jalan Cikapayang', '0801326773', '$2y$12$rjjBbOWnoe.jiRDa4VSjceARs4bMmFG8okE6BSaSI7VxB/cx8wmH.', 'belum ada foto', '2025-05-14 01:47:21', '2025-05-14 01:47:21'),
('10689d7f-87bf-4a5d-8785-137f369ab043', 69718159, 86670722, 'drg. Almira Marbun, S.Sos', 'IPA 1', 'Pindahan', 'Zonasi', '2024-09-23', 'Aktif', 'Tidak', 'harjasasihombing@gmail.com', '1526773309494854', '7626930866858176', 'Laki-Laki', 'Katolik', 'Tidore Kepulauan', '2015-08-04', 'Gg. S. Parman No. 2, Pekanbaru, JK 19136', 16, 73, 'Dusun 12', 'Desa Jl. Wonoayu', 'DKI Jakarta', 'Surabaya', 'Gang Laswi', '+62 (346) 247 5107', '$2y$12$F7icAS7p6WuxdxuwIKxbt.QnTeq5Gq7/tt0Tu9JgrtFA4iuBCq356', 'belum ada foto', '2025-05-14 01:49:55', '2025-05-14 01:49:55'),
('15c25315-59a5-43d0-9202-bd0cf653e8d1', 33091221, 74677255, 'Ir. Cinthia Hidayanto', 'IPA2', 'Pindahan', 'Zonasi', '2022-08-28', 'Tidak Aktif', 'Iya', 'kairav27@perum.ponpes.id', '9392513411093994', '1933024364746695', 'Perempuan', 'Islam', 'Binjai', '2008-08-25', 'Gang Rungkut Industri No. 534, Kota Administrasi Jakarta Pusat, Bengkulu 64005', 99, 17, 'Dusun 18', 'Desa Jalan Cempaka', 'Sulawesi Selatan', 'Binjai', 'Jl. R.E Martadinata', '+62-059-826-2045', '$2y$12$00bB8p3DtmP7.psqLRIZ.eJMEKyBXZro/ARyTTxhkzSytOXelqA6S', 'belum ada foto', '2025-05-14 01:49:37', '2025-05-14 01:49:37'),
('19521d81-57e3-4efa-a50a-0c8a8e199919', 20518025, 33423314, 'Balidin Dongoran, S.T.', 'IPA 1', 'Pindahan', 'Zonasi', '2022-10-06', 'Tidak Aktif', 'Iya', 'corneliasuartini@perum.ponpes.id', '2985552297862820', '6307632319421738', 'Laki-Laki', 'Kristen', 'Tual', '2011-02-05', 'Gang Jakarta No. 511, Bengkulu, Nusa Tenggara Timur 94078', 16, 49, 'Dusun 4', 'Desa Gg. Medokan Ayu', 'Papua', 'Tarakan', 'Jl. Kapten Muslihat', '+62-0413-164-7525', '$2y$12$izB6QHO3eJbyFj7I9Ubk3ecLGOOTteH592rHvk2Wp8XXfBnE.IhGy', 'belum ada foto', '2025-05-14 01:49:36', '2025-05-14 01:49:36'),
('1a838fe9-966c-457b-acea-94b9476ae52d', 83859722, 42726027, 'Endah Hasanah', 'IPA 3', 'Pindahan', 'Zonasi', '2025-01-09', 'Tidak Aktif', 'Iya', 'gaduhwahyudin@gmail.com', '9588360655617634', '9308548858810512', 'Perempuan', 'Buddha', 'Serang', '2015-05-22', 'Jl. Siliwangi No. 30, Salatiga, JK 71822', 85, 61, 'Dusun 9', 'Desa Gg. Ahmad Dahlan', 'Sulawesi Selatan', 'Probolinggo', 'Gg. Surapati', '+62 (787) 133-1509', '$2y$12$/pKbNaA3Y5UJkpUCmWpJounNwydTILbYlBsWRALr8mhPHc6kxurxK', 'belum ada foto', '2025-05-14 01:49:30', '2025-05-14 01:49:30'),
('1b7abd1c-6720-4bbc-a59d-d253432afb3c', 83859722, 42726027, 'Endah Hasanah', 'IPA 3', 'Pindahan', 'Zonasi', '2025-01-09', 'Tidak Aktif', 'Iya', 'gaduhwahyudin@gmail.com', '9588360655617634', '9308548858810512', 'Perempuan', 'Buddha', 'Serang', '2015-05-22', 'Jl. Siliwangi No. 30, Salatiga, JK 71822', 85, 61, 'Dusun 9', 'Desa Gg. Ahmad Dahlan', 'Sulawesi Selatan', 'Probolinggo', 'Gg. Surapati', '+62 (787) 133-1509', '$2y$12$LLJm09r03aC9gg6Xq2kFkO7i72SKghJN/bgUkPjemXd7CTzCJii.G', 'belum ada foto', '2025-05-14 01:49:54', '2025-05-14 01:49:54'),
('1b882ada-1c5d-4a6f-b47d-5eb5097ff911', 39294541, 38644572, 'Dt. Uda Tamba, S.Kom', 'IPA 3', 'Pindahan', 'Zonasi', '2024-02-04', 'Aktif', 'Iya', 'gamaninugroho@pt.id', '2433927517298955', '7316551654432831', 'Laki-Laki', 'Konghucu', 'Bandung', '2008-03-15', 'Gg. Sentot Alibasa No. 33, Surabaya, KS 54145', 83, 66, 'Dusun 8', 'Desa Gang Astana Anyar', 'Jambi', 'Cirebon', 'Jalan Dr. Djunjunan', '(055) 698-1693', '$2y$12$9j7zP5wkrYLezfnvv7JvXOTYXwG8D7PKh0L0d5XOHw2NM6pkG40bK', 'belum ada foto', '2025-05-14 01:49:55', '2025-05-14 01:49:55'),
('1d58808b-2d4d-44c1-8817-976eac8001b1', 83859722, 42726027, 'Endah Hasanah', 'IPA 3', 'Pindahan', 'Zonasi', '2025-01-09', 'Tidak Aktif', 'Iya', 'gaduhwahyudin@gmail.com', '9588360655617634', '9308548858810512', 'Perempuan', 'Buddha', 'Serang', '2015-05-22', 'Jl. Siliwangi No. 30, Salatiga, JK 71822', 85, 61, 'Dusun 9', 'Desa Gg. Ahmad Dahlan', 'Sulawesi Selatan', 'Probolinggo', 'Gg. Surapati', '+62 (787) 133-1509', '$2y$12$S2/szIiySP6hFlvC8giRCOUI81oBvuwDy9AfhlEnDG/JmUzaeAlZK', 'belum ada foto', '2025-05-14 01:47:21', '2025-05-14 01:47:21'),
('22ff378b-b20c-437f-a78d-ff16b99bda25', 37832907, 41315757, 'Fathonah Winarsih', 'IPA 2', 'Pindahan', 'Zonasi', '2025-02-01', 'Aktif', 'Iya', 'balidin30@pd.mil', '9492975332215264', '8893619750123070', 'Laki-Laki', 'Kristen', 'Sungai Penuh', '2011-09-20', 'Jalan Pasirkoja No. 388, Tidore Kepulauan, SN 53287', 12, 97, 'Dusun 8', 'Desa Jl. Jakarta', 'Jawa Timur', 'Serang', 'Gg. Sukabumi', '(0848) 018 4514', '$2y$12$gyaB0Du1i0mTTppdYKq26OeCFKua9plMentOxm7TEhDlU9zNUqGOy', 'belum ada foto', '2025-05-14 01:47:21', '2025-05-14 01:47:21'),
('29f8745e-b7a7-4ee9-ab1f-dcccfbbcabd9', 33091221, 74677255, 'Ir. Cinthia Hidayanto', 'IPA2', 'Pindahan', 'Zonasi', '2022-08-28', 'Tidak Aktif', 'Iya', 'kairav27@perum.ponpes.id', '9392513411093994', '1933024364746695', 'Perempuan', 'Islam', 'Binjai', '2008-08-25', 'Gang Rungkut Industri No. 534, Kota Administrasi Jakarta Pusat, Bengkulu 64005', 99, 17, 'Dusun 18', 'Desa Jalan Cempaka', 'Sulawesi Selatan', 'Binjai', 'Jl. R.E Martadinata', '+62-059-826-2045', '$2y$12$yrMTGMbS1FjJaVcRZBDsJ.OPJe2zXGzAS4Wlv4l6MOqj7l7AwyTv2', 'belum ada foto', '2025-05-14 01:47:22', '2025-05-14 01:47:22'),
('2e98f639-f336-47fd-80ea-b838f6452551', 64477173, 46580800, 'drg. Jaka Fujiati, M.Farm', 'IPS 4', 'Pindahan', 'Zonasi', '2024-04-13', 'Aktif', 'Tidak', 'npurnawati@ud.gov', '2910605410734749', '8186233429446406', 'Laki-Laki', 'Konghucu', 'Kota Administrasi Jakarta Utara', '2010-10-05', 'Jl. Moch. Toha No. 6, Sabang, KU 77014', 29, 52, 'Dusun 16', 'Desa Gg. Kapten Muslihat', 'Papua', 'Purwokerto', 'Gang M.H Thamrin', '+62 (574) 443 1351', '$2y$12$q.f1Yq2hYB8i1DCUC8F56.qxWkZnM8kii8HrTRVEmKwFeHolLSuTq', 'belum ada foto', '2025-05-14 01:49:57', '2025-05-14 01:49:57'),
('351f4d49-500d-4445-920f-a8935b3932b4', 69718159, 86670722, 'drg. Almira Marbun, S.Sos', 'IPA 1', 'Pindahan', 'Zonasi', '2024-09-23', 'Aktif', 'Tidak', 'harjasasihombing@gmail.com', '1526773309494854', '7626930866858176', 'Laki-Laki', 'Katolik', 'Tidore Kepulauan', '2015-08-04', 'Gg. S. Parman No. 2, Pekanbaru, JK 19136', 16, 73, 'Dusun 12', 'Desa Jl. Wonoayu', 'DKI Jakarta', 'Surabaya', 'Gang Laswi', '+62 (346) 247 5107', '$2y$12$XimAazzqqzxgrQdQwfSdWe8YZX.CUZrjTMx1KL8.EV8VW1673Iena', 'belum ada foto', '2025-05-14 01:49:30', '2025-05-14 01:49:30'),
('400b5f2b-79d5-4e85-b14e-4aae0a338080', 20518025, 33423314, 'Balidin Dongoran, S.T.', 'IPA 1', 'Pindahan', 'Zonasi', '2022-10-06', 'Tidak Aktif', 'Iya', 'corneliasuartini@perum.ponpes.id', '2985552297862820', '6307632319421738', 'Laki-Laki', 'Kristen', 'Tual', '2011-02-05', 'Gang Jakarta No. 511, Bengkulu, Nusa Tenggara Timur 94078', 16, 49, 'Dusun 4', 'Desa Gg. Medokan Ayu', 'Papua', 'Tarakan', 'Jl. Kapten Muslihat', '+62-0413-164-7525', '$2y$12$mqSWbIIAYO5ucauKUqVwNO0Gq9AVuTF3IO1RtwJS89m7V5lA81RqO', 'belum ada foto', '2025-05-14 01:47:20', '2025-05-14 01:47:20'),
('50397161-a2ba-4544-ac9a-5081a17ea2ec', 69718159, 86670722, 'drg. Almira Marbun, S.Sos', 'IPA 1', 'Pindahan', 'Zonasi', '2024-09-23', 'Aktif', 'Tidak', 'harjasasihombing@gmail.com', '1526773309494854', '7626930866858176', 'Laki-Laki', 'Katolik', 'Tidore Kepulauan', '2015-08-04', 'Gg. S. Parman No. 2, Pekanbaru, JK 19136', 16, 73, 'Dusun 12', 'Desa Jl. Wonoayu', 'DKI Jakarta', 'Surabaya', 'Gang Laswi', '+62 (346) 247 5107', '$2y$12$7LBN4uaiXfEXnDD6jAlVHeCe5M1lTN1xzIkyqZRa7vPjLoE2CY4ci', 'belum ada foto', '2025-05-14 01:49:37', '2025-05-14 01:49:37'),
('68ed0e8c-5f9b-4a85-864d-962e0edab150', 70495369, 73132025, 'R. Candrakanta Adriansyah', 'IPA 2', 'Pindahan', 'Zonasi', '2023-07-27', 'Tidak Aktif', 'Tidak', 'pradiptakarsana@hotmail.com', '6955408480727885', '9409738396877626', 'Laki-Laki', 'Kristen', 'Binjai', '2009-09-24', 'Jalan Ciumbuleuit No. 249, Palembang, Jambi 46488', 64, 57, 'Dusun 17', 'Desa Jl. Bangka Raya', 'Maluku Utara', 'Bandar Lampung', 'Jl. Tebet Barat Dalam', '+62-49-027-8742', '$2y$12$E1V.vwRZD7ysfoinR6e8MOCKBRXf3wPMe9zsz8UUc.26UR6/9/4P2', 'belum ada foto', '2025-05-14 01:49:57', '2025-05-14 01:49:57'),
('8423027f-8546-46eb-bc43-a51fe26e1d42', 33091221, 74677255, 'Ir. Cinthia Hidayanto', 'IPA2', 'Pindahan', 'Zonasi', '2022-08-28', 'Tidak Aktif', 'Iya', 'kairav27@perum.ponpes.id', '9392513411093994', '1933024364746695', 'Perempuan', 'Islam', 'Binjai', '2008-08-25', 'Gang Rungkut Industri No. 534, Kota Administrasi Jakarta Pusat, Bengkulu 64005', 99, 17, 'Dusun 18', 'Desa Jalan Cempaka', 'Sulawesi Selatan', 'Binjai', 'Jl. R.E Martadinata', '+62-059-826-2045', '$2y$12$NlJqpdppOH/slIrrKez6.uF58N4hhwwB25Pp8Pm6UdaGlBJw3/wWu', 'belum ada foto', '2025-05-14 01:49:55', '2025-05-14 01:49:55'),
('8790d7fe-fec7-4b60-b1ad-bc365b21d6b3', 10308844, 12528608, 'Sutan Lanjar Prasetya', 'IPA 4', 'Pindahan', 'Zonasi', '2023-10-09', 'Tidak Aktif', 'Tidak', 'kalimwinarsih@cv.id', '5260164250947999', '4666471019880349', 'Perempuan', 'Kristen', 'Bengkulu', '2009-08-09', 'Gang Rawamangun No. 0, Banjarmasin, RI 13338', 58, 18, 'Dusun 7', 'Desa Jalan Pelajar Pejuang', 'Sulawesi Tenggara', 'Batu', 'Jalan Cikapayang', '0801326773', '$2y$12$qdOVA4smXmV9T1IUgLAM0Oi5xX/RG4XtuNSB7Z41NYId3km6HE0zW', 'belum ada foto', '2025-05-14 01:49:30', '2025-05-14 01:49:30'),
('92cf6d41-491f-4fc8-a222-3717d24a4124', 95971985, 38803274, 'Aurora Fujiati', 'IPA 4', 'Pindahan', 'Zonasi', '2025-03-10', 'Aktif', 'Iya', 'tari14@hotmail.com', '7006835214370710', '3937995607699477', 'Perempuan', 'Katolik', 'Purwokerto', '2013-03-18', 'Gang Tebet Barat Dalam No. 2, Padang, Aceh 43699', 84, 42, 'Dusun 15', 'Desa Gang Cempaka', 'Kalimantan Tengah', 'Ternate', 'Jl. Peta', '089 513 4332', '$2y$12$6EkHgBG2I3ByPK3.NDii4OO54vnfnZb28HEYGNlYplt9/lMGwIhdq', 'belum ada foto', '2025-05-14 01:49:56', '2025-05-14 01:49:56'),
('a6433e83-7241-4769-ae30-f28b2ca90d65', 10308844, 12528608, 'Sutan Lanjar Prasetya', 'IPA 4', 'Pindahan', 'Zonasi', '2023-10-09', 'Tidak Aktif', 'Tidak', 'kalimwinarsih@cv.id', '5260164250947999', '4666471019880349', 'Perempuan', 'Kristen', 'Bengkulu', '2009-08-09', 'Gang Rawamangun No. 0, Banjarmasin, RI 13338', 58, 18, 'Dusun 7', 'Desa Jalan Pelajar Pejuang', 'Sulawesi Tenggara', 'Batu', 'Jalan Cikapayang', '0801326773', '$2y$12$VfQK8BU6isgDd8TM/2zdsOZ19s17RMvpjFL1Tk.NW..wd..U6WG4a', 'belum ada foto', '2025-05-14 01:49:37', '2025-05-14 01:49:37'),
('a918837d-0481-4eca-8fd4-fb86671d0d23', 51620605, 73146580, 'drg. Siska Lestari', 'IPS 2', 'Pindahan', 'Zonasi', '2022-10-23', 'Aktif', 'Iya', 'ridwan74@perum.co.id', '3911791342237186', '9738644037536178', 'Laki-Laki', 'Konghucu', 'Surabaya', '2013-03-29', 'Jl. M.T Haryono No. 97, Tual, BE 48247', 90, 63, 'Dusun 6', 'Desa Jl. Medokan Ayu', 'Kalimantan Utara', 'Lhokseumawe', 'Gg. Dipatiukur', '+62-0171-274-8467', '$2y$12$rsZfRzZCppvqD.trJV6ilOZC358y6R7X6Q3f2Ynx791EBnaiem54.', 'belum ada foto', '2025-05-14 01:49:57', '2025-05-14 01:49:57'),
('b8139393-50ed-4485-807b-1d3e0782508c', 73745843, 61286951, 'Paulin Nashiruddin, S.Kom', 'IPS 5', 'Pindahan', 'Zonasi', '2022-06-04', 'Aktif', 'Tidak', 'bakijan08@cv.int', '1110478897090451', '3561100054126459', 'Laki-Laki', 'Kristen', 'Palembang', '2014-05-08', 'Gg. Ronggowarsito No. 167, Samarinda, BE 29413', 16, 72, 'Dusun 18', 'Desa Jalan M.T Haryono', 'Papua Barat', 'Palembang', 'Gang Rajawali Timur', '+62-091-334-1232', '$2y$12$wbhr.vzD8U6OW.Wlutqbtu00tZDnQ7jqOlPZzNcMzNosh19vPOHrO', 'belum ada foto', '2025-05-14 01:49:57', '2025-05-14 01:49:57'),
('c187ef60-134e-4983-b5ca-13cd0b37f810', 70455932, 76254643, 'Gabriella Haryanto, S.Farm', 'IPS 2', 'Pindahan', 'Zonasi', '2024-02-25', 'Aktif', 'Iya', 'permataprabawa@yahoo.com', '9491459607160772', '3689664650370428', 'Perempuan', 'Hindu', 'Prabumulih', '2012-12-31', 'Gg. Bangka Raya No. 06, Surakarta, Riau 72980', 51, 76, 'Dusun 9', 'Desa Jl. H.J Maemunah', 'Sulawesi Selatan', 'Pangkalpinang', 'Jl. Pasirkoja', '(053) 755 6464', '$2y$12$BymQMhZXG/u.3Uns67lUo.OwkPn7ZQREPMjtKRtMpB.ES0ZuTZnbm', 'belum ada foto', '2025-05-14 01:49:56', '2025-05-14 01:49:56'),
('c4519854-4f6c-404b-a199-88ee01c98126', 93834312, 20620733, 'Puti Nadine Budiyanto, M.Pd', 'IPS 3', 'Pindahan', 'Zonasi', '2023-05-19', 'Aktif', 'Iya', 'hwinarsih@pd.gov', '6469600504072341', '7736716177560055', 'Laki-Laki', 'Katolik', 'Lhokseumawe', '2008-04-24', 'Gang Suniaraja No. 3, Semarang, Kalimantan Utara 49190', 45, 69, 'Dusun 13', 'Desa Gang Cikutra Timur', 'Sumatera Selatan', 'Balikpapan', 'Gang Dr. Djunjunan', '(057) 262-8498', '$2y$12$4jU6fAUWNsFfoAy/mJnLGeReIV/M9PK7DcBoy.f0M3p.P.YciwS8m', 'belum ada foto', '2025-05-14 01:49:56', '2025-05-14 01:49:56'),
('c7168782-3a35-4e9a-9401-5f676a01bebf', 10308844, 12528608, 'Sutan Lanjar Prasetya', 'IPA 4', 'Pindahan', 'Zonasi', '2023-10-09', 'Tidak Aktif', 'Tidak', 'kalimwinarsih@cv.id', '5260164250947999', '4666471019880349', 'Perempuan', 'Kristen', 'Bengkulu', '2009-08-09', 'Gang Rawamangun No. 0, Banjarmasin, RI 13338', 58, 18, 'Dusun 7', 'Desa Jalan Pelajar Pejuang', 'Sulawesi Tenggara', 'Batu', 'Jalan Cikapayang', '0801326773', '$2y$12$hxvF2tmX6BUW4BEuc8VhY..8CT9NAey531zq.BEvsef/GKOoh.c/G', 'belum ada foto', '2025-05-14 01:49:55', '2025-05-14 01:49:55'),
('c8fad4d3-9166-4658-896b-0b1c63152d71', 37832907, 41315757, 'Fathonah Winarsih', 'IPA 2', 'Pindahan', 'Zonasi', '2025-02-01', 'Aktif', 'Iya', 'balidin30@pd.mil', '9492975332215264', '8893619750123070', 'Laki-Laki', 'Kristen', 'Sungai Penuh', '2011-09-20', 'Jalan Pasirkoja No. 388, Tidore Kepulauan, SN 53287', 12, 97, 'Dusun 8', 'Desa Jl. Jakarta', 'Jawa Timur', 'Serang', 'Gg. Sukabumi', '(0848) 018 4514', '$2y$12$WqRA0wHLzHeoshiDS8My7.ufUJaIYFyOP3jNWmo5L5E.9Dd.CwG4q', 'belum ada foto', '2025-05-14 01:49:36', '2025-05-14 01:49:36'),
('dd1eeadf-ec99-4a47-b7b8-5fd016eff0e6', 20518025, 33423314, 'Balidin Dongoran, S.T.', 'IPA 1', 'Pindahan', 'Zonasi', '2022-10-06', 'Tidak Aktif', 'Iya', 'corneliasuartini@perum.ponpes.id', '2985552297862820', '6307632319421738', 'Laki-Laki', 'Kristen', 'Tual', '2011-02-05', 'Gang Jakarta No. 511, Bengkulu, Nusa Tenggara Timur 94078', 16, 49, 'Dusun 4', 'Desa Gg. Medokan Ayu', 'Papua', 'Tarakan', 'Jl. Kapten Muslihat', '+62-0413-164-7525', '$2y$12$wXggytYJ4WzHCBCGzv/p5.bP7jSOgeLar35LUy7hD0sMTDCVz1dYq', 'belum ada foto', '2025-05-14 01:49:29', '2025-05-14 01:49:29'),
('e8577363-d4da-4f6e-8ca0-324b72953cdc', 37832907, 41315757, 'Fathonah Winarsih', 'IPA 2', 'Pindahan', 'Zonasi', '2025-02-01', 'Aktif', 'Iya', 'balidin30@pd.mil', '9492975332215264', '8893619750123070', 'Laki-Laki', 'Kristen', 'Sungai Penuh', '2011-09-20', 'Jalan Pasirkoja No. 388, Tidore Kepulauan, SN 53287', 12, 97, 'Dusun 8', 'Desa Jl. Jakarta', 'Jawa Timur', 'Serang', 'Gg. Sukabumi', '(0848) 018 4514', '$2y$12$DJ5GArGUv/0fwV2l3CRmYuv.kB30HCgR..pvWG0h6n0.ArQq9gJOG', 'belum ada foto', '2025-05-14 01:49:29', '2025-05-14 01:49:29'),
('e8a40b1c-5f78-4e5f-a29c-883b817fb010', 69718159, 86670722, 'drg. Almira Marbun, S.Sos', 'IPA 1', 'Pindahan', 'Zonasi', '2024-09-23', 'Aktif', 'Tidak', 'harjasasihombing@gmail.com', '1526773309494854', '7626930866858176', 'Laki-Laki', 'Katolik', 'Tidore Kepulauan', '2015-08-04', 'Gg. S. Parman No. 2, Pekanbaru, JK 19136', 16, 73, 'Dusun 12', 'Desa Jl. Wonoayu', 'DKI Jakarta', 'Surabaya', 'Gang Laswi', '+62 (346) 247 5107', '$2y$12$oIq5gnhFZIjBXDRLOgv56.ITq7VI5mLwpTcmXhDVDkAA2yl6KoYvK', 'belum ada foto', '2025-05-14 01:47:21', '2025-05-14 01:47:21'),
('f1c5f585-d618-4504-809b-a61afea846d4', 95209403, 43006365, 'Arsipatra Prasasta', 'IPS 1', 'Pindahan', 'Zonasi', '2024-10-24', 'Tidak Aktif', 'Tidak', 'zlailasari@cv.int', '4829379004534617', '2584246871685383', 'Laki-Laki', 'Konghucu', 'Banjarbaru', '2018-03-16', 'Jalan Rawamangun No. 8, Tomohon, Sulawesi Tengah 87277', 34, 97, 'Dusun 9', 'Desa Gg. M.T Haryono', 'Sumatera Barat', 'Kota Administrasi Jakarta Utara', 'Jalan Peta', '+62-0455-812-2362', '$2y$12$eMkhUbn2J2BZKSw0NSCG1ew50G91v1fHBR3e9pN9UYUJ83pFUOaB.', 'belum ada foto', '2025-05-14 01:49:56', '2025-05-14 01:49:56'),
('f8894f87-7782-4779-babc-cf0be66ddb5d', 33091221, 74677255, 'Ir. Cinthia Hidayanto', 'IPA2', 'Pindahan', 'Zonasi', '2022-08-28', 'Tidak Aktif', 'Iya', 'kairav27@perum.ponpes.id', '9392513411093994', '1933024364746695', 'Perempuan', 'Islam', 'Binjai', '2008-08-25', 'Gang Rungkut Industri No. 534, Kota Administrasi Jakarta Pusat, Bengkulu 64005', 99, 17, 'Dusun 18', 'Desa Jalan Cempaka', 'Sulawesi Selatan', 'Binjai', 'Jl. R.E Martadinata', '+62-059-826-2045', '$2y$12$cYyYpF3DejlI4jykTd4zIe3q0dI3kSLM9hGx5K/CW7XrkY.mHFRt6', 'belum ada foto', '2025-05-14 01:49:30', '2025-05-14 01:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajars`
--

CREATE TABLE `tahun_ajars` (
  `id` char(36) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `tahun_ajar` varchar(50) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sekolah` (`asal_sekolah_id`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
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
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_wali_kelas` (`wali_kelas_id`);

--
-- Indexes for table `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `master_admins`
--
ALTER TABLE `master_admins`
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
-- Indexes for table `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_ajars`
--
ALTER TABLE `tahun_ajars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sekolah_id` (`sekolah_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `sekolahs`
--
ALTER TABLE `sekolahs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `id_sekolah` FOREIGN KEY (`asal_sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk_wali_kelas` FOREIGN KEY (`wali_kelas_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `mapels`
--
ALTER TABLE `mapels`
  ADD CONSTRAINT `fk_guru_id` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tahun_ajars`
--
ALTER TABLE `tahun_ajars`
  ADD CONSTRAINT `sekolah_id` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
