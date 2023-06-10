-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 07:54 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_baiturrahim_travel`
--

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jamaah`
--

CREATE TABLE `jamaah` (
  `ID_Jamaah` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIK` bigint(20) DEFAULT NULL,
  `Nama_Jamaah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tempat_Lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tanggal_Lahir` date DEFAULT NULL,
  `Jenis_Kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nomor_Telepon` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Asal_Kota` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Golongan_Darah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Pendidikan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Foto_Jamaah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Bukti_Dokumentasi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tanggal_Daftar` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keberangkatan`
--

CREATE TABLE `keberangkatan` (
  `ID_Keberangkatan` int(10) UNSIGNED NOT NULL,
  `Kode_Keberangkatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Jamaah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Paket_Umrah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal_Keberangkatan` date NOT NULL,
  `Titik_Kumpul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(21, '2023_05_24_012911_create_paket_umrah_table', 1),
(22, '2023_05_24_093120_create_jamaah_table', 1),
(23, '2023_05_28_150505_create_keberangkatan_table', 1),
(24, '2023_06_04_013222_create_users_roles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paket_umrah`
--

CREATE TABLE `paket_umrah` (
  `ID_Paket_Umrah` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_Paket_Umrah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Harga_Paket_Umrah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID_User` int(10) UNSIGNED NOT NULL,
  `ID_Jamaah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_User_Roles` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_User`, `ID_Jamaah`, `Username`, `Password`, `ID_User_Roles`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'travel', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `ID_User_Roles` int(10) UNSIGNED NOT NULL,
  `Role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`ID_User_Roles`, `Role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Jamaah', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jamaah`
--
ALTER TABLE `jamaah`
  ADD PRIMARY KEY (`ID_Jamaah`);

--
-- Indexes for table `keberangkatan`
--
ALTER TABLE `keberangkatan`
  ADD PRIMARY KEY (`ID_Keberangkatan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_umrah`
--
ALTER TABLE `paket_umrah`
  ADD PRIMARY KEY (`ID_Paket_Umrah`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_User`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`ID_User_Roles`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keberangkatan`
--
ALTER TABLE `keberangkatan`
  MODIFY `ID_Keberangkatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `ID_User_Roles` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
