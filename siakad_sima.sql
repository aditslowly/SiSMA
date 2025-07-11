-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 11, 2025 at 09:51 AM
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
('f6353f78-354f-4a7a-8eaa-432f77689f60', 'Aditya Prasetyo', 'user.aditprasetyo25@gmail.com', '0895704345664', 3, '$2y$12$E2XCJxQKA/2DUjaO4TtA7uzd8lKCUcha0piu2mC9l6KTYCRjDhdae', '1750229721.png', '2025-06-26 02:20:01', '2025-06-25 19:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_kelas`
--

CREATE TABLE `anggota_kelas` (
  `id` char(36) NOT NULL,
  `pivot_kelas_id` char(36) NOT NULL,
  `siswa_id` char(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota_kelas`
--

INSERT INTO `anggota_kelas` (`id`, `pivot_kelas_id`, `siswa_id`, `created_at`, `updated_at`) VALUES
('71edecc5-64ae-47e7-9c08-637254742f73', '85ed2406-8269-4b10-ba3d-769a56947f44', '9cb1de00-157d-4a40-a795-3c421293159f', '2025-07-11 00:32:16', '2025-07-11 00:32:16'),
('d7c96fc0-06c0-48bc-a129-4fe2efd5700d', '85ed2406-8269-4b10-ba3d-769a56947f44', 'c467f664-508a-419a-8476-883afd57b0f7', '2025-07-11 00:32:16', '2025-07-11 00:32:16');

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
('4d8738c5-8203-4cec-adbc-4977a5c9eda6', 3, 'Aditslowly', 2349082394829, '$2y$12$x5LeoOjYvHnAH6Aw8pbKkOD7R.oDF71HA4Vmcns/5Neunwpk2L.Em', 'Laki-Laki', 'Islam', 'Ketapang, Kalimantan Barat', '2000-06-08', 'INDONESIAN', 'Aktif', 2384920388, 'aditslowly.23@gmail.com', 'Kepala Sekolah', 'Megister', 2025, 'foto-guru-1750905819.jpg', '2025-06-25 19:43:39', '2025-06-25 19:43:39'),
('68de9c3f-60be-4165-bafc-b3fcd414ee5d', 2, 'Kim Jong Un', 1232423423, '$2y$12$ZNTUeqVsDXJ0SKDVF06Aeurbkt19li0Px7YMJMwNiIGe444WIQ.s2', 'Laki-Laki', 'Buddha', 'PyongYang', '1987-07-22', 'JL. NGAWI BARAT NO. 12', 'Aktif', 82349929384, 'kim@gmail.com', 'Guru', 'Sarjana', 2022, 'foto-guru-1751599197.JPG', '2025-07-03 20:19:58', '2025-07-03 20:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `guru_mapel`
--

CREATE TABLE `guru_mapel` (
  `id` char(36) NOT NULL,
  `guru_id` char(36) NOT NULL,
  `mapel_id` char(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru_mapel`
--

INSERT INTO `guru_mapel` (`id`, `guru_id`, `mapel_id`, `created_at`, `updated_at`) VALUES
('9b34d658-7668-4066-887b-4d5ae9b339ea', '68de9c3f-60be-4165-bafc-b3fcd414ee5d', '8841a881-a65e-4bf3-94f4-f2a38ec8474c', '2025-07-05 05:43:24', '2025-07-05 05:43:24');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `sekolah_id`, `nama_kelas`, `jurusan`, `tingkat`, `created_at`, `updated_at`) VALUES
(29, 2, 'IPS 1', 'IPS', 'X', '2025-07-11 00:32:16', '2025-07-11 00:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` char(36) NOT NULL,
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

INSERT INTO `mapels` (`id`, `sekolah_id`, `kode_mapel`, `nama_mapel`, `deskripsi`, `created_at`, `updated_at`) VALUES
('8841a881-a65e-4bf3-94f4-f2a38ec8474c', 2, 'IND', 'BAHASA INDONESIA', 'BAHASA INDONESIA MENYENANGKAN LOH', '2025-07-05 05:43:24', '2025-07-05 05:43:24');

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
-- Table structure for table `pivots_gurus`
--

CREATE TABLE `pivots_gurus` (
  `id` char(36) NOT NULL,
  `tahun_ajar_id` char(36) NOT NULL,
  `guru_id` char(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pivots_gurus`
--

INSERT INTO `pivots_gurus` (`id`, `tahun_ajar_id`, `guru_id`, `created_at`, `updated_at`) VALUES
('26cf92d1-c3a6-4cc0-ad10-068c96d9645d', 'ad9e4062-3cfe-4ffc-89ee-9a4d802566bd', '68de9c3f-60be-4165-bafc-b3fcd414ee5d', '2025-07-03 20:19:58', '2025-07-03 20:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `pivots_kelas`
--

CREATE TABLE `pivots_kelas` (
  `id` char(36) NOT NULL,
  `pivot_guru_id` char(36) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pivots_kelas`
--

INSERT INTO `pivots_kelas` (`id`, `pivot_guru_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
('85ed2406-8269-4b10-ba3d-769a56947f44', '26cf92d1-c3a6-4cc0-ad10-068c96d9645d', 29, '2025-07-11 00:32:16', '2025-07-11 00:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `pivots_mapel`
--

CREATE TABLE `pivots_mapel` (
  `id` char(36) NOT NULL,
  `pivot_kelas_id` char(36) NOT NULL,
  `mapel_id` char(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pivots_mapel`
--

INSERT INTO `pivots_mapel` (`id`, `pivot_kelas_id`, `mapel_id`, `created_at`, `updated_at`) VALUES
('5fbb2829-75e2-4f73-90f3-79c95e7b6ab9', '85ed2406-8269-4b10-ba3d-769a56947f44', '8841a881-a65e-4bf3-94f4-f2a38ec8474c', '2025-07-11 00:32:16', '2025-07-11 00:32:16');

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
('jkdUpZREpTm76eBl7SenJEQ7Od8YIcD03cKPtDeS', '84f6445b-cdc4-4d0e-bed4-0ee91888b3ef', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Safari/605.1.15', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOFVOU3pFMXoxY0VDY3JaY0Z3WjhMUmhSQU9QWWtBR1VsMENWRUdFdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3Qvc2lha2FkX3Npc21hL2FkbWluL2tlbGFzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7czozNjoiODRmNjQ0NWItY2RjNC00ZDBlLWJlZDQtMGVlOTE4ODhiM2VmIjt9', 1752219136);

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
('9cb1de00-157d-4a40-a795-3c421293159f', 2, '112478283', '0016', 'Kim Il Sung', 'Pindahan', 'Zonasi', '2025-07-04', 'Aktif', 'Tidak', 'kim.sung@gmail.com', '6218378732497', '6218283787723', 'Laki-Laki', 'Buddha', 'PyongYang', '2003-08-06', 'JL. NGAWI BARAT NO. 12', 25, 1, 'NGAWI', 'NGAWI', 'JAWA TIMUR', 'NGAWI', 'NGAWI', '01111232', '$2y$12$MfW2E3rtyk5RcI03AYDgSuEZfutOHxzrq4d3GaSO8pjvz/0iT2LMe', 'belum ada foto', '2025-07-11 00:31:37', '2025-07-11 00:31:37'),
('c467f664-508a-419a-8476-883afd57b0f7', 2, '1122334455', '1111', 'Sambo', 'Pindahan', 'Zonasi', '2025-07-04', 'Aktif', 'Tidak', 'sambo@gmail.com', '2342349872398', '23483939', 'Laki-Laki', 'Islam', 'Jakarta', '2001-09-08', 'NGAWI BARAT', 22, 2, 'NGAWI', 'NGAWI', 'JAWA TIMUR', 'NGAWI', 'NGAWI', '09238437', '$2y$12$hHlIkCjMXw/WhYYuj2bsjeffWLcmTVSFpEZqHx2eK9AcCw59yPEAS', 'belum ada foto', '2025-07-11 00:31:38', '2025-07-11 00:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajars`
--

CREATE TABLE `tahun_ajars` (
  `id` char(36) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `tahun_ajar` varchar(255) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahun_ajars`
--

INSERT INTO `tahun_ajars` (`id`, `sekolah_id`, `tahun_ajar`, `semester`, `deskripsi`, `status`, `dokumen`, `created_at`, `updated_at`) VALUES
('ad9e4062-3cfe-4ffc-89ee-9a4d802566bd', 2, '2025', 'Genap', 'TAHUN AJAR', 'Aktif', '/Applications/XAMPP/xamppfiles/temp/phpowVsBX', '2025-07-03 20:14:49', '2025-07-03 20:14:49'),
('b9c9b6e3-4749-41a6-b211-11e3c50eb03e', 2, '2025', 'Ganjil', 'TAHUN AJAR BARU', 'Nonaktif', '/Applications/XAMPP/xamppfiles/temp/phpDPY0pq', '2025-07-04 03:14:49', '2025-07-03 20:14:49');

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
  ADD KEY `foreign_siswa_id` (`siswa_id`),
  ADD KEY `foreign_key_pivot_kelas_id` (`pivot_kelas_id`);

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
-- Indexes for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_guru_id` (`guru_id`),
  ADD KEY `foreign_key_mapel` (`mapel_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pivots_gurus`
--
ALTER TABLE `pivots_gurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key_guru_id` (`guru_id`),
  ADD KEY `foreign_tahun_ajar_id` (`tahun_ajar_id`);

--
-- Indexes for table `pivots_kelas`
--
ALTER TABLE `pivots_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key_kelas_id` (`kelas_id`),
  ADD KEY `foreign_key_pivot_guru_id` (`pivot_guru_id`);

--
-- Indexes for table `pivots_mapel`
--
ALTER TABLE `pivots_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key_pivots_kelas_id` (`pivot_kelas_id`),
  ADD KEY `foreign_key_mapel_id` (`mapel_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
-- Constraints for table `anggota_kelas`
--
ALTER TABLE `anggota_kelas`
  ADD CONSTRAINT `foreign_key_pivot_kelas_id` FOREIGN KEY (`pivot_kelas_id`) REFERENCES `pivots_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_siswa_id` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD CONSTRAINT `foreign_guru_id` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_key_mapel` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pivots_gurus`
--
ALTER TABLE `pivots_gurus`
  ADD CONSTRAINT `foreign_key_guru_id` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_tahun_ajar_id` FOREIGN KEY (`tahun_ajar_id`) REFERENCES `tahun_ajars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pivots_kelas`
--
ALTER TABLE `pivots_kelas`
  ADD CONSTRAINT `foreign_key_kelas_id` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_key_pivot_guru_id` FOREIGN KEY (`pivot_guru_id`) REFERENCES `pivots_gurus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pivots_mapel`
--
ALTER TABLE `pivots_mapel`
  ADD CONSTRAINT `foreign_key_mapel_id` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_key_pivots_kelas_id` FOREIGN KEY (`pivot_kelas_id`) REFERENCES `pivots_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
