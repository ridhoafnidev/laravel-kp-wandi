-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2018 pada 13.57
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_kp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_lokasis`
--

CREATE TABLE `jenis_lokasis` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_lokasis`
--

INSERT INTO `jenis_lokasis` (`id`, `jenis_lokasi`, `created_at`, `updated_at`) VALUES
(10, 'Protokol A', '2018-07-19 10:52:13', '2018-07-19 10:52:13'),
(11, 'Protokol B', '2018-07-24 04:24:49', '2018-07-24 04:24:49');

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
(2, '2018_07_16_104236_create_pelanggans_table', 2),
(4, '2018_07_18_112757_create_jenis_lokasis_table', 4),
(6, '2018_07_18_134333_create_n_s_r__produks_table', 5),
(7, '2018_07_19_011102_create_nsr_non_produks_table', 6),
(8, '2018_07_16_133253_create_reklames_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nsr_non_produks`
--

CREATE TABLE `nsr_non_produks` (
  `id` int(10) UNSIGNED NOT NULL,
  `lokasi_id` int(10) UNSIGNED NOT NULL,
  `ukuran` int(11) NOT NULL,
  `jangka_waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketinggian` int(11) NOT NULL,
  `nsr` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `n_s_r__produks`
--

CREATE TABLE `n_s_r__produks` (
  `id` int(10) UNSIGNED NOT NULL,
  `lokasi_id` int(10) UNSIGNED NOT NULL,
  `ukuran` int(11) NOT NULL,
  `jangka_waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketinggian` int(11) NOT NULL,
  `nsr` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('wandy@gmail.com', '$2y$10$CDRXoPZHxuDHLINznWG5XuPatcB2hx0PiVKhZfVg3ppoUwXalapVG', '2018-07-16 22:17:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklames`
--

CREATE TABLE `reklames` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `lokasi_id` int(10) UNSIGNED NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Produk','Non Produk') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lebar` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `jangka_waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nsr` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reklames`
--

INSERT INTO `reklames` (`id`, `user_id`, `lokasi_id`, `alamat`, `jenis`, `lebar`, `panjang`, `qty`, `jangka_waktu`, `nsr`, `created_at`, `updated_at`) VALUES
(2, 3, 10, 'sssssss', 'Non Produk', 1, 3, 3, '2', 125000, '2018-07-24 01:52:48', '2018-07-24 01:52:48'),
(3, 3, 10, 'sdsds', 'Produk', 4, 4, 6, '4', 30000, '2018-07-24 03:46:10', '2018-07-24 03:46:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','author') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'author',
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` int(30) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `alamat`, `npwp`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wandy', 'wandy@gmail.com', 'admin', '', NULL, '$2y$10$QaMwe6k2w4cxNZfkjek6ouw0kog9L.3/nnYQST43Cws4q4Cj85Opu', 'C4QKor9U94bxh2phC63g1jHwtYjXXTi7qEMwg2DKmgZlZg2uTIO5hlU79rCy', '2018-07-16 22:12:10', '2018-07-18 02:29:27'),
(2, 'Ridho', 'ridho@gmail.com', 'author', '', NULL, '$2y$10$USAMTI54Wwc1f/.EIS1uHuh8IpqXu2IWP.322RDxEVDCvU3tHr64y', 'vj7XLveViBGgjSUj86gsqAi2BBHizAM4ckooR9SBAOPGxeZOtr5m3Onzybup', '2018-07-17 06:17:14', '2018-07-17 06:27:18'),
(3, 'Arini', 'arini@gmail.com', 'author', '', NULL, '$2y$10$FH6ZWLOjwZuLHleIC/IX5u.4uM3sX/TKPrvZlgYSqSNEH5Z4vwRiy', NULL, '2018-07-17 06:33:31', '2018-07-17 06:33:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_lokasis`
--
ALTER TABLE `jenis_lokasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nsr_non_produks`
--
ALTER TABLE `nsr_non_produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nsr_non_produks_lokasi_id_foreign` (`lokasi_id`);

--
-- Indeks untuk tabel `n_s_r__produks`
--
ALTER TABLE `n_s_r__produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_s_r__produks_lokasi_id_foreign` (`lokasi_id`);

--
-- Indeks untuk tabel `reklames`
--
ALTER TABLE `reklames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reklames_user_id_foreign` (`user_id`),
  ADD KEY `reklames_lokasi_id_foreign` (`lokasi_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_lokasis`
--
ALTER TABLE `jenis_lokasis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `nsr_non_produks`
--
ALTER TABLE `nsr_non_produks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `n_s_r__produks`
--
ALTER TABLE `n_s_r__produks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reklames`
--
ALTER TABLE `reklames`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nsr_non_produks`
--
ALTER TABLE `nsr_non_produks`
  ADD CONSTRAINT `nsr_non_produks_lokasi_id_foreign` FOREIGN KEY (`lokasi_id`) REFERENCES `jenis_lokasis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `n_s_r__produks`
--
ALTER TABLE `n_s_r__produks`
  ADD CONSTRAINT `n_s_r__produks_lokasi_id_foreign` FOREIGN KEY (`lokasi_id`) REFERENCES `jenis_lokasis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reklames`
--
ALTER TABLE `reklames`
  ADD CONSTRAINT `reklames_lokasi_id_foreign` FOREIGN KEY (`lokasi_id`) REFERENCES `jenis_lokasis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reklames_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
