-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2025 at 09:58 AM
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
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `phone`, `sekolah_id`, `password`, `foto_profil`, `created_at`, `updated_at`) VALUES
('84f6445b-cdc4-4d0e-bed4-0ee91888b3ef', 'arfy slowly', 'arfy.slowy@gmail.com', '0892348923', 2, '$2y$12$jTs6u7Bl0dGcWigb4QV1PeAU84YbWCk4/WfHOmLSD3S3HXfLcMGum', '1750229693.jpeg', '2025-06-17 23:54:53', '2025-06-17 23:54:53'),
('f6353f78-354f-4a7a-8eaa-432f77689f60', 'Aditya Prasetyo', 'user.aditprasetyo25@gmail.com', '0895704345664', 3, '$2y$12$vzcS/rdmhXKSs/v45AJxQuwmWqVNUSwJZzQRAWZAg4LyY6VStvUtG', '1750229721.png', '2025-06-17 23:55:21', '2025-06-17 23:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_kelas`
--

CREATE TABLE `anggota_kelas` (
  `id` char(36) NOT NULL,
  `kelas_id` char(36) NOT NULL,
  `siswa_id` char(36) NOT NULL,
  `guru_id` char(36) NOT NULL,
  `mapel_id` char(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `sekolah_id` int(11) NOT NULL,
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
  `jabatan` enum('Kepala Sekolah','Waka Kesiswaan','Waka Kurikulum','Guru','Tata Usaha') NOT NULL,
  `pendidikan_terakhir` enum('Diploma','Sarjana','Megister','Doktor') NOT NULL,
  `tahun_masuk` int(11) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `sekolah_id`, `username`, `nip`, `password`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `status`, `no_telepon`, `email`, `jabatan`, `pendidikan_terakhir`, `tahun_masuk`, `foto_profil`, `created_at`, `updated_at`) VALUES
('be3ae8db-5265-43fd-9209-57bac63b8695', 2, 'Var der Daan', 111111111111, '$2y$12$tWHiNf.fkUmjMO1f9Z8FSuKSnD33ZSyXDdbPu6qEPiPAM/uR1kbPi', 'Laki-Laki', 'Kristen', 'Amsterdam, Netherland', '1990-01-09', 'Jl. PLTD Sukaharja Gg. Al-Ma\'ruf', 'Aktif', 89564343234, 'van.daan@gmail.com', 'Guru', 'Megister', 2022, 'foto-guru-1750381440.jpeg', '2025-06-19 18:04:01', '2025-06-19 18:04:01');

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
  `sekolah_id` int(11) NOT NULL,
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

INSERT INTO `kelas` (`id`, `sekolah_id`, `nama_kelas`, `jurusan`, `tingkat`, `wali_kelas_id`, `created_at`, `updated_at`) VALUES
(5, 2, 'IPA 3', 'IPA', 'XII', 'be3ae8db-5265-43fd-9209-57bac63b8695', '2025-06-19 18:06:17', '2025-06-19 18:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` int(11) NOT NULL,
  `guru_id` char(36) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `kode_mapel` varchar(255) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapels`
--

INSERT INTO `mapels` (`id`, `guru_id`, `sekolah_id`, `kode_mapel`, `nama_mapel`, `deskripsi`, `created_at`, `updated_at`) VALUES
(4, 'be3ae8db-5265-43fd-9209-57bac63b8695', 2, 'DUTCH992', 'Bahasa Belanda', 'BAHASA BELANDA SERU LOH!!', '2025-06-19 18:04:37', '2025-06-19 18:04:37');

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
(2, 'SMAN 2 Ketapang', 30103481, 'A', 'Kurikulum Merdeka', 'TAJUDIN', 'Jl. PLTD Sukaharja Gg. Al-Ma\'ruf', 'cacabilot@gmail.com', '0895704345664', 'Negeri', 'Pemerintah Daerah', 'Aktif', 40, 3113, 1998, 40, 5, 21, 1, 1, 1, 1, 1, 1, 1, 'foto-1750229613.jpg', 'logo-1750229613.png', '2025-06-17 23:53:33', '2025-06-17 23:53:33'),
(3, 'SMAN 3 Ketapang', 30103481, 'A', 'Kurikulum Merdeka', 'Dedy Sadar Setyawan', 'Jl. PLTD Sukaharja Gg. Al-Ma\'ruf', 'cacabilot@gmail.com', '089564343234', 'Negeri', 'Pemerintah Daerah', 'Aktif', 343, 234, 1900, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'foto-1750229667.png', 'logo-1750229667.png', '2025-06-17 23:54:27', '2025-06-17 23:54:27');

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
('hxFY6jBDIzsiK7ygVe9sbNeENIjS7Eek0hnXFkof', NULL, '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRkI1aVRLT0RIbzFyVDJiWjJEZldsbHBnZnI0enl3SGh0ano4eTZTWCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cDovL2xvY2FsaG9zdC9zaWFrYWRfc2lzbWEvYWRtaW4iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMjoiaHR0cDovL2xvY2FsaG9zdC9zaXNtYSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTE6ImxvZ2luX2d1cnVfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7czozNjoiYmUzYWU4ZGItNTI2NS00M2ZkLTkyMDktNTdiYWM2M2I4Njk1Ijt9', 1750384927),
('IxA6lv6jcBI35TGmxshhIIRqNRvJOkcUzQXYOPNV', NULL, '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM2dpY2szeWZtSGZNMlVyQWZ5S3ZkbHVZTXc1VW5UT1dQVlFta1NlaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Qvc2lha2FkX3Npc21hL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1750385448);

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` char(36) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama_siswa` varchar(225) NOT NULL,
  `jenis_pendaftaran` enum('Peserta Didik Baru','Pindahan') NOT NULL,
  `jalur_pendaftaran` enum('Zonasi','Afirmasi','Perpindahan Orang Tua','Prestasi','Mandiri') NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `kebutuhan_khusus` enum('Iya','Tidak') NOT NULL,
  `email` varchar(225) NOT NULL,
  `no_kk` varchar(225) NOT NULL,
  `nik` varchar(225) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `agama` enum('Islam','Katolik','Kristen','Buddha','Hindu','Khonghucu') NOT NULL,
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

INSERT INTO `siswas` (`id`, `sekolah_id`, `nisn`, `nis`, `nama_siswa`, `jenis_pendaftaran`, `jalur_pendaftaran`, `tanggal_masuk`, `status`, `kebutuhan_khusus`, `email`, `no_kk`, `nik`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `rt`, `rw`, `dusun`, `desa_kelurahan`, `provinsi`, `kabupaten`, `kecamatan`, `telepon`, `password`, `foto`, `created_at`, `updated_at`) VALUES
('1713ae0f-24b7-4d07-98be-0eeb0bdd1a0d', 2, '2333432', '6666', 'Riska', 'Pindahan', 'Zonasi', '2020-02-12', 'Aktif', 'Tidak', 'riska@gmail.com', '32432', '23423432432', 'Perempuan', 'Islam', 'Surabaya', '2005-08-16', 'jln rahadi usan', 12, 2, 'Sukaharja', 'sukaharja', 'kalimantan barat', 'ketapang', 'Delta Pawan', '3432432', '$2y$12$kdEz2/Z/2sUpLr.s1AB4je05GV49gnKaYorlXD.kdxvZMhZLffbAy', 'belum ada foto', '2025-06-18 13:32:07', '2025-06-18 06:32:07'),
('1bcc109c-37f8-40c8-bcc5-cac0398bdc4d', 2, '2142142', '5555', 'Aulia', 'Pindahan', 'Zonasi', '2024-01-12', 'Aktif', 'Tidak', 'Aulia@gmail.com', '65758', '67876679', 'Perempuan', 'Islam', 'Ketapang', '2006-07-06', 'jln rahadi usan', 27, 15, 'mayak', 'mayak', 'kalimantan barat', 'ketapang', 'Delta Pawan', '6547658884', '$2y$12$R0vRPZ56lOGyGE0sHid90eSz1MTWxNL0R.GLP6OM9qLskouMj8EO6', 'belum ada foto', '2025-06-17 23:56:55', '2025-06-17 23:56:55'),
('26226e5d-00e1-4602-9cc1-4c36641e9765', 2, '3243243', '2222', 'Izzan', 'Pindahan', 'Zonasi', '2023-02-12', 'Aktif', 'Tidak', 'Izzan@gmail.com', '465475667', '76867978', 'Laki-Laki', 'Islam', 'Ketapang', '2005-02-21', 'jln rahadi usan', 23, 12, 'Payak kumang', 'Payak kumang', 'kalimantan barat', 'ketapang', 'Delta Pawan', '34353657', '$2y$12$xKsqJGg2B4ngWP8rsWGQXOkVjg0zUZlUGxiv7t.bmP97Lzqn3K6Fi', 'belum ada foto', '2025-06-17 23:56:54', '2025-06-17 23:56:54'),
('6858683e-b076-4c01-b3c9-751b0143199a', 2, '3242332', '3333', 'Nadira', 'Pindahan', 'Zonasi', '2024-03-12', 'Aktif', 'Tidak', 'Nadira@gmail.com', '4546547', '6768769', 'Perempuan', 'Islam', 'Ketapang', '2005-02-02', 'jln rahadi usan', 25, 13, 'suka bangun', 'suka bangun', 'kalimantan barat', 'ketapang', 'Delta Pawan', '3465656765', '$2y$12$J/NpYD0ACL0RPlMCRJy4l./6XrRWFmLj3Rsj1PB1wGwh5CIRggHpO', 'belum ada foto', '2025-06-17 23:56:54', '2025-06-17 23:56:54'),
('bf62608b-e559-4b76-8c4e-c94c186a1b8d', 2, '2231342', '4444', 'Kansa', 'Pindahan', 'Zonasi', '2024-02-12', 'Aktif', 'Tidak', 'Kansa@gmail.com', '657568', '67867978', 'Perempuan', 'Islam', 'Ketapang', '2006-02-22', 'jln rahadi usan', 26, 14, 'sunga awan', 'sunga awan', 'kalimantan barat', 'ketapang', 'Delta Pawan', '56547657', '$2y$12$G2xALwMdc4zcB/9qAMTAiOTA7jstsOsFA0zOIXhXac6oZbZpNWDEm', 'belum ada foto', '2025-06-17 23:56:55', '2025-06-17 23:56:55'),
('fb05030b-03ea-4609-a78d-4d31e3c869f0', 2, '3284732', '1111', 'Azril', 'Pindahan', 'Zonasi', '2024-02-12', 'Aktif', 'Tidak', 'azril@gmail.com', '234435', '4546547', 'Laki-Laki', 'Islam', 'Ketapang', '2005-02-23', 'jln rahadi usan', 22, 23, 'sukaharja', 'sukaharja', 'kalimantan barat', 'ketapang', 'Delta Pawan', '87656256327', '$2y$12$edVcrca7DGxhS4n.p41JQ.bXEhMuluJpooqfnJZJLHj9HYM.Ek7l6', 'belum ada foto', '2025-06-17 23:56:54', '2025-06-17 23:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajars`
--

CREATE TABLE `tahun_ajars` (
  `id` char(36) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `tahun_ajar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahun_ajars`
--

INSERT INTO `tahun_ajars` (`id`, `sekolah_id`, `tahun_ajar`, `deskripsi`, `status`, `dokumen`, `created_at`, `updated_at`) VALUES
('487874e2-3001-4e2a-b209-530050e2d53b', 3, '2025/2026', 'DESKRIPSI DARI DATA TAHUN AJAR', 'Aktif', 'tahun-ajar_1750230611.pdf', '2025-06-18 00:10:11', '2025-06-18 00:10:11'),
('6f2fa43a-048a-49fe-8f8a-7e51d6b50e6b', 2, '2025/2026', 'DESKRIPSI DARI DATA TAHUN AJAR', 'Aktif', 'tahun-ajar_1750312029.pdf', '2025-06-19 05:47:09', '2025-06-18 22:47:09');

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
  ADD KEY `foreign_key_sekolah_id` (`sekolah_id`);

--
-- Indexes for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`,`siswa_id`,`guru_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- Indexes for table `tahun_ajars`
--
ALTER TABLE `tahun_ajars`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `foreign_key_sekolah_id` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
