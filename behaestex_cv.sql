-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 18 Agu 2024 pada 15.32
-- Versi server: 5.7.33
-- Versi PHP: 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `behaestex_cv`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about_me`
--

CREATE TABLE `about_me` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_detail_id` int(11) NOT NULL,
  `tentang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `about_me`
--

INSERT INTO `about_me` (`id`, `user_detail_id`, `tentang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Web Developer dengan pengalaman lebih dari satu tahun. Selama bekerja saya telah membuat 3 jenis website, yaitu website manajemen konten, website pembelian sparepart, dan website untuk Human Resource Information System (HRIS). Saat ini sedang mencari Backend Developer, Frontend Developer, dan DevOps', '2024-08-17 23:32:52', '2024-08-17 21:33:20', NULL),
(2, 2, 'Web Developer dengan pengalaman lebih dari satu tahun. Selama bekerja saya telah membuat 3 jenis website, yaitu website manajemen konten, website pembelian sparepart, dan website untuk Human Resource Information System (HRIS). Saat ini sedang mencari Backend Developer, Frontend Developer', '2024-08-17 23:32:52', '2024-08-18 07:05:42', NULL),
(3, 5, 'keterangan belum diisi', '2024-08-18 07:42:40', '2024-08-18 07:42:40', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cv_hr`
--

CREATE TABLE `cv_hr` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_detail_id` int(11) NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cv_hr`
--

INSERT INTO `cv_hr` (`id`, `user_detail_id`, `cv`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'cv/TLtbKUepmooSwyUbBl10VQbH0NiaoxgwKBIOvxHR.pdf', '2024-08-18 06:15:01', '2024-08-18 06:15:01', NULL),
(2, 2, 'cv/dl3GVoUotT9weGnUwG9p4c2sCu2hEQp4XXXlcz5C.pdf', '2024-08-18 07:28:50', '2024-08-18 07:28:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `karir`
--

CREATE TABLE `karir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_detail_id` int(11) NOT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karir`
--

INSERT INTO `karir` (`id`, `user_detail_id`, `posisi`, `perusahaan`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Web Dev', 'PT. Abu', '2023-08-10', '2024-08-16', '- Membuat website pembelian suku cadang untuk divisi jual beli suku cadang\n- Membuat Entity Relationship Diagram dalam pembuatan website sehingga dapat mempercepat proses maintenance\n- Membuat website sistem informasi sumber daya manusia untuk manajemen rekanan perusahaan\n- Rekapitulasi data pekerjaan dari excel ke website lebih cepat, satu hari sebelum deadline.\n- Memperbarui flow coding untuk manipulasi database sehingga dapat meningkatkan efisiensi dan efektifitas kerja website.', '2024-08-17 23:48:34', '2024-08-17 23:48:43', NULL),
(2, 1, 'Web Programmer', 'PT Ramah Tamah', '2024-08-08', '2026-07-18', '- Membuat website pembelian suku cadang untuk divisi jual beli suku cadang\n- Membuat Entity Relationship Diagram dalam pembuatan website sehingga dapat mempercepat proses maintenance\n- Membuat website sistem informasi sumber daya manusia untuk manajemen rekanan perusahaan\n- Rekapitulasi data pekerjaan dari excel ke website lebih cepat, satu hari sebelum deadline.\n- Memperbarui flow coding untuk manipulasi database sehingga dapat meningkatkan efisiensi dan efektifitas kerja website.', '2024-08-17 17:35:13', '2024-08-17 19:02:13', NULL),
(4, 2, 'Web Programmer', 'PT SAT SET', '2024-08-28', '2025-02-12', 'Tes', '2024-08-18 07:26:42', '2024-08-18 07:26:42', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keahlian`
--

CREATE TABLE `keahlian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_detail_id` int(11) NOT NULL,
  `keahlian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keahlian`
--

INSERT INTO `keahlian` (`id`, `user_detail_id`, `keahlian`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 'Kerja Sama', '2024-08-18 04:24:13', '2024-08-18 04:24:13', NULL),
(8, 1, 'Negosiasi', '2024-08-18 04:25:02', '2024-08-18 04:25:02', NULL),
(9, 2, 'Negosiasi', '2024-08-18 07:27:48', '2024-08-18 07:27:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_08_17_063723_add_roles_to_users', 2),
(7, '2024_08_17_215944_create_user_detail_table', 3),
(8, '2024_08_17_220258_create_about_me_table', 3),
(9, '2024_08_17_220411_create_karir_table', 3),
(10, '2024_08_17_220420_create_pendidikan_table', 4),
(11, '2024_08_17_220714_create_keahlian_table', 4),
(12, '2024_08_17_221236_add_foto_to_user_detail_table', 5),
(13, '2024_08_18_100653_create_set_keahlian_table', 6),
(14, '2024_08_18_125746_create_c_v_h_r_s_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_detail_id` int(11) NOT NULL,
  `tingkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institusi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `user_detail_id`, `tingkat`, `institusi`, `tanggal_mulai`, `tanggal_selesai`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'SMK', 'MAN Surabaya', '2024-02-20', '2025-05-09', '- Mempelajari bahasa pemrograman : PHP, MySQL, Javascript, C++, Python.\n- Mata kuliah yang disukai: Database workshops, and signal and image processing.\n- Membuat LMS dengan wordpress\n- Riset Paper: Prediction of Ball Position in Three-Dimensional Space Using Artificial Neural Networks on ERSOW Robot', '2024-08-18 04:39:17', '2024-08-18 00:07:07', NULL),
(2, 1, 'SMP', 'SMP Surabaya', '2024-08-02', '2025-05-09', '- Mempelajari bahasa pemrograman : PHP, MySQL, Javascript, C++, Python.\r\n- Mata kuliah yang disukai: Database workshops, and signal and image processing.\r\n- Membuat LMS dengan wordpress\r\n- Riset Paper: Prediction of Ball Position in Three-Dimensional Space Using Artificial Neural Networks on ERSOW Robot\r\n', '2024-08-18 04:39:17', '2024-08-18 04:39:17', NULL),
(4, 2, 'A', 'S', '2024-08-15', '2024-08-07', 'Tes', '2024-08-18 07:27:12', '2024-08-18 07:27:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_keahlian`
--

CREATE TABLE `set_keahlian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `set_keahlian`
--

INSERT INTO `set_keahlian` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Application Developer', '2024-08-18 03:13:38', '2024-08-18 03:13:38', NULL),
(2, 'Kerja Sama', '2024-08-18 03:13:38', '2024-08-18 03:13:38', NULL),
(3, 'Komunikasi', '2024-08-18 03:13:38', '2024-08-18 03:13:38', NULL),
(4, 'Negosiasi', '2024-08-18 03:13:38', '2024-08-18 03:13:38', NULL),
(5, 'Full Stack Developer', '2024-08-18 03:13:38', '2024-08-18 03:13:38', NULL),
(6, 'Sopir', '2024-08-18 03:13:38', '2024-08-18 03:13:38', NULL),
(7, 'Berpikir Kritis', '2024-08-18 03:13:38', '2024-08-18 03:13:38', NULL),
(8, 'Kerja Sama', '2024-08-18 03:13:38', '2024-08-18 03:13:38', NULL),
(9, 'Application Developer', '2024-08-18 03:13:38', '2024-08-18 03:13:38', NULL),
(10, 'Berpikir Kritis', '2024-08-18 03:13:38', '2024-08-18 03:13:38', NULL),
(11, 'Web Developer', '2024-08-18 03:13:38', '2024-08-18 03:13:38', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'employee',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `roles`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'HR', 'admin@mail.com', NULL, '$2y$12$QsOJD2HtfRaYEUUSiKa7o.M7lyCorezNjNBxs0lIUHo28YX9t3WOK', NULL, '2024-08-16 23:34:05', '2024-08-16 23:34:05'),
(2, 'Wiratama Ashidiqi Nasrulloh', 'employee', 'wiratama.jobs@gmail.com', NULL, '$2y$12$QsOJD2HtfRaYEUUSiKa7o.M7lyCorezNjNBxs0lIUHo28YX9t3WOK', NULL, '2024-08-16 23:34:05', '2024-08-16 23:34:05'),
(4, 'tes', 'employee', 'tes@gmail.com', NULL, '$2y$12$qP0Td7qXUtcfpXB4yX3LA.aBUjXsUI.tpJUc.IPJhni6ceVWQ88oC', NULL, '2024-08-18 06:32:07', '2024-08-18 06:32:07'),
(7, 'hr', 'HR', 'hr@mail.com', NULL, '$2y$12$sjnKl9GRCVGkyNCei4lDhulz1Y9uTF7O2SFnEfojGWADTnMYs4AR2', NULL, '2024-08-18 07:42:40', '2024-08-18 07:42:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_detail`
--

CREATE TABLE `user_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_id`, `name`, `foto`, `posisi`, `email`, `no_hp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Wiratama', 'foto/hVBtkPKlJfaStKucyqXJh8s9wgKrRN4629JwemF6.jpg', 'Web Programmer', 'wiratama.jobs@gmail.com', '085156192786', '2024-08-17 22:11:07', '2024-08-17 21:36:36', NULL),
(2, 4, 'tes', 'foto/qyEmmLQ8GquwprbWjvPcil1vVE3X68QkWRwDZ4Se.jpg', 'Web Programmer', 'tes@gmail.com', '1241541425', '2024-08-18 06:32:07', '2024-08-18 07:30:05', NULL),
(5, 7, 'hr', NULL, NULL, 'hr@mail.com', NULL, '2024-08-18 07:42:40', '2024-08-18 07:42:40', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cv_hr`
--
ALTER TABLE `cv_hr`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `karir`
--
ALTER TABLE `karir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `set_keahlian`
--
ALTER TABLE `set_keahlian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `cv_hr`
--
ALTER TABLE `cv_hr`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karir`
--
ALTER TABLE `karir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `set_keahlian`
--
ALTER TABLE `set_keahlian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
