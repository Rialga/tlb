-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2020 pada 14.18
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemesanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_bakus`
--

CREATE TABLE `bahan_bakus` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_bahan_baku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sisa` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bahan_bakus`
--

INSERT INTO `bahan_bakus` (`id`, `nama_bahan_baku`, `satuan`, `created_at`, `updated_at`, `deleted_at`, `kode`, `sisa`) VALUES
(1, 'Semen', 'Kg', '2020-04-06 09:12:28', '2020-07-20 16:07:33', NULL, 'semen', 1491225),
(2, 'Air', 'Liter', '2020-04-06 09:12:28', '2020-07-20 16:07:33', NULL, 'air', 999999997350),
(3, 'Pasir', 'Kg', '2020-04-06 09:12:28', '2020-07-20 16:07:33', NULL, 'pasir', 494378),
(4, 'Split', 'Kg', '2020-04-06 09:12:28', '2020-07-20 16:07:33', NULL, 'split', 994017),
(5, 'Addictive 1', 'Liter', '2020-04-06 09:12:28', '2020-07-20 16:07:33', NULL, 'addictive', 271),
(6, 'Addictive 2', 'Liter', '2020-04-16 04:35:23', '2020-04-20 02:51:29', NULL, 'addictive_1', 300),
(7, 'Addictive 3', 'Liter', '2020-04-16 04:36:28', '2020-04-20 02:19:02', NULL, 'addictive_3', 300);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku_histories`
--

CREATE TABLE `bahan_baku_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `bahan_baku_id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `pengadaan_id` int(10) UNSIGNED DEFAULT NULL,
  `produksi_id` int(10) UNSIGNED DEFAULT NULL,
  `opname_id` int(10) UNSIGNED DEFAULT NULL,
  `volume` double NOT NULL,
  `total_sisa` double NOT NULL,
  `waktu` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bahan_baku_histories`
--

INSERT INTO `bahan_baku_histories` (`id`, `bahan_baku_id`, `type`, `pengadaan_id`, `produksi_id`, `opname_id`, `volume`, `total_sisa`, `waktu`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 2, 1, NULL, NULL, 20000, 20978, '2020-04-12 14:54:46', '2020-04-12 07:55:08', '2020-04-12 07:55:08', NULL),
(2, 3, 2, 2, NULL, NULL, 480000, 500978, '2020-04-12 14:58:15', '2020-04-12 07:58:56', '2020-04-12 07:58:56', NULL),
(3, 4, 2, 3, NULL, NULL, 1000000, 1000327, '2020-04-12 15:05:06', '2020-04-12 08:05:13', '2020-04-12 08:05:13', NULL),
(4, 1, 2, 4, NULL, NULL, 500000, 500275, '2020-04-12 15:05:58', '2020-04-12 08:06:02', '2020-04-12 08:06:02', NULL),
(5, 2, 2, 5, NULL, NULL, 1e20, 1e20, '2020-04-12 15:07:21', '2020-04-12 08:07:26', '2020-04-12 08:07:26', NULL),
(6, 1, 0, NULL, 1, NULL, 4000, 496275, '2020-04-12 15:13:25', '2020-04-12 08:13:30', '2020-04-12 08:13:30', NULL),
(7, 2, 0, NULL, 1, NULL, 2000, 1e20, '2020-04-12 15:13:25', '2020-04-12 08:13:30', '2020-04-12 08:13:30', NULL),
(8, 3, 0, NULL, 1, NULL, 3000, 497978, '2020-04-12 15:13:25', '2020-04-12 08:13:30', '2020-04-12 08:13:30', NULL),
(9, 4, 0, NULL, 1, NULL, 2800, 997527, '2020-04-12 15:13:25', '2020-04-12 08:13:30', '2020-04-12 08:13:30', NULL),
(10, 5, 0, NULL, 1, NULL, 20, 277, '2020-04-12 15:13:25', '2020-04-12 08:13:31', '2020-04-12 08:13:31', NULL),
(11, 1, 0, NULL, 2, NULL, 1000, 495275, '2020-04-12 15:15:23', '2020-04-12 08:15:31', '2020-04-12 08:17:27', '2020-04-12 08:17:27'),
(12, 2, 0, NULL, 2, NULL, 500, 1e20, '2020-04-12 15:15:23', '2020-04-12 08:15:31', '2020-04-12 08:17:27', '2020-04-12 08:17:27'),
(13, 3, 0, NULL, 2, NULL, 750, 497228, '2020-04-12 15:15:23', '2020-04-12 08:15:31', '2020-04-12 08:17:27', '2020-04-12 08:17:27'),
(14, 4, 0, NULL, 2, NULL, 700, 996827, '2020-04-12 15:15:23', '2020-04-12 08:15:31', '2020-04-12 08:17:27', '2020-04-12 08:17:27'),
(15, 5, 0, NULL, 2, NULL, 5, 272, '2020-04-12 15:15:23', '2020-04-12 08:15:31', '2020-04-12 08:17:27', '2020-04-12 08:17:27'),
(16, 1, 0, NULL, 2, NULL, 1000, 495275, '2020-04-12 15:15:23', '2020-04-12 08:17:28', '2020-04-12 08:17:28', NULL),
(17, 2, 0, NULL, 2, NULL, 500, 1e20, '2020-04-12 15:15:23', '2020-04-12 08:17:28', '2020-04-12 08:17:28', NULL),
(18, 3, 0, NULL, 2, NULL, 750, 497228, '2020-04-12 15:15:23', '2020-04-12 08:17:28', '2020-04-12 08:17:28', NULL),
(19, 4, 0, NULL, 2, NULL, 700, 996827, '2020-04-12 15:15:23', '2020-04-12 08:17:28', '2020-04-12 08:17:28', NULL),
(20, 5, 0, NULL, 2, NULL, 5, 272, '2020-04-12 15:15:23', '2020-04-12 08:17:28', '2020-04-12 08:17:28', NULL),
(21, 1, 1, NULL, NULL, 1, 1000, 494275, '2020-04-12 15:22:10', '2020-04-12 08:22:13', '2020-04-12 08:22:13', NULL),
(22, 1, 0, NULL, 3, NULL, 1400, 1492875, '2020-04-19 14:34:54', '2020-04-19 07:35:10', '2020-04-19 07:36:44', '2020-04-19 07:36:44'),
(23, 2, 0, NULL, 3, NULL, 1400, 999999998600, '2020-04-19 14:34:54', '2020-04-19 07:35:10', '2020-04-19 07:36:44', '2020-04-19 07:36:44'),
(24, 3, 0, NULL, 3, NULL, 1400, 495828, '2020-04-19 14:34:54', '2020-04-19 07:35:10', '2020-04-19 07:36:44', '2020-04-19 07:36:44'),
(25, 4, 0, NULL, 3, NULL, 1400, 995427, '2020-04-19 14:34:54', '2020-04-19 07:35:10', '2020-04-19 07:36:44', '2020-04-19 07:36:44'),
(26, 5, 0, NULL, 3, NULL, 140, 360, '2020-04-19 14:34:54', '2020-04-19 07:35:10', '2020-04-19 07:36:44', '2020-04-19 07:36:44'),
(27, 6, 0, NULL, 3, NULL, 0, 200, '2020-04-19 14:34:54', '2020-04-19 07:35:10', '2020-04-19 07:36:44', '2020-04-19 07:36:44'),
(28, 7, 0, NULL, 3, NULL, 0, 300, '2020-04-19 14:34:54', '2020-04-19 07:35:11', '2020-04-19 07:36:44', '2020-04-19 07:36:44'),
(29, 1, 0, NULL, 3, NULL, 1250, 1493025, '2020-04-19 14:34:54', '2020-04-19 07:36:44', '2020-04-19 07:36:44', NULL),
(30, 2, 0, NULL, 3, NULL, 1250, 999999998750, '2020-04-19 14:34:54', '2020-04-19 07:36:44', '2020-04-19 07:36:44', NULL),
(31, 3, 0, NULL, 3, NULL, 1250, 495978, '2020-04-19 14:34:54', '2020-04-19 07:36:44', '2020-04-19 07:36:44', NULL),
(32, 4, 0, NULL, 3, NULL, 1250, 995577, '2020-04-19 14:34:54', '2020-04-19 07:36:45', '2020-04-19 07:36:45', NULL),
(33, 5, 0, NULL, 3, NULL, 125, 375, '2020-04-19 14:34:54', '2020-04-19 07:36:45', '2020-04-19 07:36:45', NULL),
(34, 6, 0, NULL, 3, NULL, 0, 200, '2020-04-19 14:34:54', '2020-04-19 07:36:45', '2020-04-19 07:36:45', NULL),
(35, 7, 0, NULL, 3, NULL, 0, 300, '2020-04-19 14:34:54', '2020-04-19 07:36:45', '2020-04-19 07:36:45', NULL),
(36, 1, 0, NULL, 4, NULL, 1000, 1492025, '2020-06-25 17:29:36', '2020-06-25 10:29:51', '2020-06-25 10:29:51', NULL),
(37, 2, 0, NULL, 4, NULL, 1000, 999999997750, '2020-06-25 17:29:36', '2020-06-25 10:29:51', '2020-06-25 10:29:51', NULL),
(38, 3, 0, NULL, 4, NULL, 1000, 494978, '2020-06-25 17:29:36', '2020-06-25 10:29:51', '2020-06-25 10:29:51', NULL),
(39, 4, 0, NULL, 4, NULL, 1000, 994577, '2020-06-25 17:29:36', '2020-06-25 10:29:51', '2020-06-25 10:29:51', NULL),
(40, 5, 0, NULL, 4, NULL, 100, 275, '2020-06-25 17:29:36', '2020-06-25 10:29:51', '2020-06-25 10:29:51', NULL),
(41, 6, 0, NULL, 4, NULL, 0, 300, '2020-06-25 17:29:36', '2020-06-25 10:29:51', '2020-06-25 10:29:51', NULL),
(42, 7, 0, NULL, 4, NULL, 0, 300, '2020-06-25 17:29:36', '2020-06-25 10:29:51', '2020-06-25 10:29:51', NULL),
(43, 1, 0, NULL, 5, NULL, 200, 1491825, '2020-07-20 11:04:52', '2020-07-20 16:05:07', '2020-07-20 16:05:07', NULL),
(44, 2, 0, NULL, 5, NULL, 100, 999999997650, '2020-07-20 11:04:52', '2020-07-20 16:05:07', '2020-07-20 16:05:07', NULL),
(45, 3, 0, NULL, 5, NULL, 150, 494828, '2020-07-20 11:04:52', '2020-07-20 16:05:07', '2020-07-20 16:05:07', NULL),
(46, 4, 0, NULL, 5, NULL, 140, 994437, '2020-07-20 11:04:52', '2020-07-20 16:05:07', '2020-07-20 16:05:07', NULL),
(47, 5, 0, NULL, 5, NULL, 1, 274, '2020-07-20 11:04:52', '2020-07-20 16:05:07', '2020-07-20 16:05:07', NULL),
(48, 1, 0, NULL, 6, NULL, 200, 1491625, '2020-07-20 17:05:27', '2020-07-20 16:05:49', '2020-07-20 16:05:49', NULL),
(49, 2, 0, NULL, 6, NULL, 100, 999999997550, '2020-07-20 17:05:27', '2020-07-20 16:05:49', '2020-07-20 16:05:49', NULL),
(50, 3, 0, NULL, 6, NULL, 150, 494678, '2020-07-20 17:05:27', '2020-07-20 16:05:49', '2020-07-20 16:05:49', NULL),
(51, 4, 0, NULL, 6, NULL, 140, 994297, '2020-07-20 17:05:27', '2020-07-20 16:05:49', '2020-07-20 16:05:49', NULL),
(52, 5, 0, NULL, 6, NULL, 1, 273, '2020-07-20 17:05:27', '2020-07-20 16:05:49', '2020-07-20 16:05:49', NULL),
(53, 1, 0, NULL, 7, NULL, 200, 1491425, '2020-07-20 23:06:13', '2020-07-20 16:06:47', '2020-07-20 16:06:47', NULL),
(54, 2, 0, NULL, 7, NULL, 100, 999999997450, '2020-07-20 23:06:13', '2020-07-20 16:06:48', '2020-07-20 16:06:48', NULL),
(55, 3, 0, NULL, 7, NULL, 150, 494528, '2020-07-20 23:06:13', '2020-07-20 16:06:48', '2020-07-20 16:06:48', NULL),
(56, 4, 0, NULL, 7, NULL, 140, 994157, '2020-07-20 23:06:13', '2020-07-20 16:06:48', '2020-07-20 16:06:48', NULL),
(57, 5, 0, NULL, 7, NULL, 1, 272, '2020-07-20 23:06:13', '2020-07-20 16:06:48', '2020-07-20 16:06:48', NULL),
(58, 1, 0, NULL, 8, NULL, 200, 1491225, '2020-07-20 05:07:18', '2020-07-20 16:07:33', '2020-07-20 16:07:33', NULL),
(59, 2, 0, NULL, 8, NULL, 100, 999999997350, '2020-07-20 05:07:18', '2020-07-20 16:07:33', '2020-07-20 16:07:33', NULL),
(60, 3, 0, NULL, 8, NULL, 150, 494378, '2020-07-20 05:07:18', '2020-07-20 16:07:33', '2020-07-20 16:07:33', NULL),
(61, 4, 0, NULL, 8, NULL, 140, 994017, '2020-07-20 05:07:18', '2020-07-20 16:07:33', '2020-07-20 16:07:33', NULL),
(62, 5, 0, NULL, 8, NULL, 1, 271, '2020-07-20 05:07:18', '2020-07-20 16:07:33', '2020-07-20 16:07:33', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `kode_jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatans`
--

INSERT INTO `jabatans` (`id`, `nama_jabatan`, `keterangan`, `created_at`, `updated_at`, `deleted_at`, `kode_jabatan`) VALUES
(1, 'Admin', NULL, '2020-04-06 09:12:26', '2020-04-06 09:12:26', NULL, 'admin'),
(2, 'Marketing', NULL, '2020-04-06 09:12:26', '2020-04-06 09:12:26', NULL, 'marketing'),
(3, 'Produksi', NULL, '2020-04-06 09:12:27', '2020-04-06 09:12:27', NULL, 'produksi'),
(4, 'Logistik', NULL, '2020-04-06 09:12:27', '2020-04-06 09:12:27', NULL, 'logistik'),
(5, 'Manager Produksi', NULL, '2020-04-06 09:12:27', '2020-04-06 09:12:27', NULL, 'manager_produksi'),
(6, 'Dirut', NULL, '2020-04-06 09:12:27', '2020-04-06 09:12:27', NULL, 'dirut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraans`
--

CREATE TABLE `kendaraans` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_kendaraan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_polisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masa_pajak` date NOT NULL,
  `masa_stnk` date NOT NULL,
  `masa_kir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kendaraans`
--

INSERT INTO `kendaraans` (`id`, `jenis_kendaraan`, `no_polisi`, `masa_pajak`, `masa_stnk`, `masa_kir`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mixer Truck', 'BA 1234 XX', '2022-09-01', '2021-09-01', '2020-12-01', NULL, NULL, NULL),
(2, 'Truck', 'B 1234 XX', '2022-02-01', '2022-02-01', '2021-01-01', '2020-04-10 03:52:12', '2020-04-10 03:52:12', NULL),
(3, 'Mixer', 'BA222Aww', '2021-07-29', '2021-09-09', '2021-08-16', '2020-07-28 16:35:33', '2020-07-29 08:39:52', NULL),
(4, 'Mixer XXX', '11231', '2023-07-31', '2021-07-10', '2022-07-25', '2020-07-28 17:08:56', '2020-07-29 07:18:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan_details`
--

CREATE TABLE `kendaraan_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `kendaraan_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kendaraan_details`
--

INSERT INTO `kendaraan_details` (`id`, `kendaraan_id`, `status`, `waktu`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2020-04-10 10:48:19', NULL, '2020-04-10 03:48:26', '2020-04-10 03:48:26', NULL),
(2, 2, 2, '2020-04-10 10:52:43', NULL, '2020-04-10 03:52:45', '2020-04-10 03:52:45', NULL),
(3, 2, 1, '2020-04-12 14:03:28', NULL, '2020-04-12 07:04:02', '2020-04-12 07:04:02', NULL),
(4, 2, 2, '2020-04-05 14:07:41', 'ganti gearbok', '2020-04-12 07:08:19', '2020-04-12 07:08:19', NULL),
(5, 2, 1, '2020-04-07 14:08:29', 'keluar bengkel', '2020-04-12 07:08:47', '2020-04-12 07:08:47', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komposisi_mutu`
--

CREATE TABLE `komposisi_mutu` (
  `id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `bahan_baku_id` int(10) UNSIGNED NOT NULL,
  `volume` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `komposisi_mutu`
--

INSERT INTO `komposisi_mutu` (`id`, `produk_id`, `bahan_baku_id`, `volume`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 200, '2020-04-12 07:39:12', '2020-04-12 07:39:12', NULL),
(2, 1, 2, 100, '2020-04-12 07:39:12', '2020-04-12 07:39:12', NULL),
(3, 1, 3, 150, '2020-04-12 07:39:12', '2020-04-12 07:39:12', NULL),
(4, 1, 4, 140, '2020-04-12 07:39:12', '2020-04-12 07:39:12', NULL),
(5, 1, 5, 1, '2020-04-12 07:39:12', '2020-04-12 07:39:12', NULL),
(6, 2, 1, 300, '2020-04-12 07:40:09', '2020-04-12 07:40:09', NULL),
(7, 2, 2, 150, '2020-04-12 07:40:09', '2020-04-12 07:40:09', NULL),
(8, 2, 3, 150, '2020-04-12 07:40:09', '2020-04-12 07:40:09', NULL),
(9, 2, 4, 150, '2020-04-12 07:40:09', '2020-04-12 07:40:09', NULL),
(10, 2, 5, 1.5, '2020-04-12 07:40:09', '2020-04-12 07:40:09', NULL),
(11, 3, 1, 100, '2020-04-19 07:21:40', '2020-04-19 07:21:40', NULL),
(12, 3, 2, 100, '2020-04-19 07:21:40', '2020-04-19 07:21:40', NULL),
(13, 3, 3, 100, '2020-04-19 07:21:40', '2020-04-19 07:21:40', NULL),
(14, 3, 4, 100, '2020-04-19 07:21:40', '2020-04-19 07:21:40', NULL),
(15, 3, 5, 10, '2020-04-19 07:21:40', '2020-04-19 07:21:40', NULL),
(16, 3, 6, 0, '2020-04-19 07:21:40', '2020-04-19 07:21:40', NULL),
(17, 3, 7, 0, '2020-04-19 07:21:40', '2020-04-19 07:21:40', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `opnames`
--

CREATE TABLE `opnames` (
  `id` int(10) UNSIGNED NOT NULL,
  `bahan_baku_id` int(10) UNSIGNED NOT NULL,
  `volume_opname` double NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pemakaian` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `opnames`
--

INSERT INTO `opnames` (`id`, `bahan_baku_id`, `volume_opname`, `keterangan`, `tanggal_pemakaian`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1000, 'bantuan masjid', '2020-04-12 15:22:10', '2020-04-12 08:22:13', '2020-04-18 08:23:44', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanans`
--

CREATE TABLE `pemesanans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomor_dokumen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pemesanan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mutu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_pesanan` double NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `tanggal_kirim_dari` datetime NOT NULL,
  `tanggal_kirim_sampai` datetime DEFAULT NULL,
  `lokasi_proyek` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pesanan` int(11) NOT NULL,
  `cp_pesanan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemesanans`
--

INSERT INTO `pemesanans` (`id`, `nomor_dokumen`, `nama_pemesanan`, `mutu`, `volume_pesanan`, `tanggal_pesanan`, `tanggal_kirim_dari`, `tanggal_kirim_sampai`, `lokasi_proyek`, `jenis_pesanan`, `cp_pesanan`, `user_id`, `keterangan`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '001', 'om Al', 'k-250', 21, '2020-04-05 14:14:00', '2020-04-12 14:14:07', '2020-04-12 14:32:41', 'padang', 0, '0809', 1, 'telpon dahulu', 0, '2020-04-12 07:27:34', '2020-04-12 07:32:47', NULL),
(2, '002', 'PT ABC', 'k-300', 300, '2020-04-01 14:28:33', '2020-04-01 14:29:16', '2020-04-30 14:29:26', 'limau manis', 1, '080907', 1, 'konfirmasi', 0, '2020-04-12 07:29:54', '2020-04-12 07:29:54', NULL),
(3, '0987', 'aCAK', 'k-250', 13.6, '2020-04-12 14:29:54', '2020-04-12 14:30:02', '2020-04-19 14:30:07', 'iNDARUNG', 0, 'ERU', 3, NULL, 0, '2020-04-19 07:30:21', '2020-04-19 07:30:21', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_bahan_bakus`
--

CREATE TABLE `pemesanan_bahan_bakus` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahan_baku_id` int(10) UNSIGNED NOT NULL,
  `volume_pemesanan` double NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemesanan_bahan_bakus`
--

INSERT INTO `pemesanan_bahan_bakus` (`id`, `nama_supplier`, `cp_supplier`, `bahan_baku_id`, `volume_pemesanan`, `tanggal_pemesanan`, `keterangan`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'abc', '0809', 1, 500000, '2020-04-12 14:43:48', 'masuk setiap hari', 1, '2020-04-12 07:52:00', '2020-04-12 07:52:00', NULL),
(2, 'novan', '0809', 3, 500000, '2020-04-12 14:52:55', '3 DT per hari, material dari CV. DDS', 1, '2020-04-12 07:53:32', '2020-04-12 07:53:32', NULL),
(3, 'stone crusher', '080907', 4, 1000000, '2020-04-12 15:00:14', NULL, 1, '2020-04-12 08:00:40', '2020-04-12 08:00:40', NULL),
(4, 'aqqe', '131', 2, 1e28, '2020-04-12 15:06:51', NULL, 1, '2020-04-12 08:06:55', '2020-04-12 08:06:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaans`
--

CREATE TABLE `pengadaans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomor_dokumen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penerima` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengirim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahan_baku_id` int(10) UNSIGNED NOT NULL,
  `berat` double NOT NULL,
  `pemesanan_bahan_baku_id` int(10) UNSIGNED NOT NULL,
  `supir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengadaan` datetime NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengadaans`
--

INSERT INTO `pengadaans` (`id`, `nomor_dokumen`, `nama_penerima`, `nama_pengirim`, `bahan_baku_id`, `berat`, `pemesanan_bahan_baku_id`, `supir`, `tanggal_pengadaan`, `user_id`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '011', 'atul', 'as', 3, 20000, 2, 'ba12345bg', '2020-04-12 14:54:46', 1, NULL, '2020-04-12 07:55:07', '2020-04-12 07:55:07', NULL),
(2, '012', 'anto', 'hut', 3, 480000, 2, 'ba1254sd', '2020-04-12 14:58:15', 1, NULL, '2020-04-12 07:58:56', '2020-04-12 07:58:56', NULL),
(3, '121321', 'as', 'ad', 4, 1000000, 3, 'bababa', '2020-04-12 15:05:06', 1, NULL, '2020-04-12 08:05:13', '2020-04-12 08:05:13', NULL),
(4, '1213', 'as', 'ad', 1, 500000, 1, 'asadfd', '2020-04-12 15:05:58', 1, NULL, '2020-04-12 08:06:01', '2020-04-12 08:06:01', NULL),
(5, '2324', 'ewdwe', 'ad', 2, 1e20, 4, 'baqwr', '2020-04-12 15:07:21', 1, NULL, '2020-04-12 08:07:26', '2020-04-12 08:07:26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` int(10) UNSIGNED NOT NULL,
  `mutu_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `mutu_produk`, `satuan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'K250', 'kg/m3', '2020-04-06 09:12:28', '2020-04-06 09:12:28', NULL),
(2, 'K350', 'kg/m3', '2020-04-06 09:12:28', '2020-04-06 09:12:28', NULL),
(3, 'K300', 'kg/m3', '2020-04-19 07:21:39', '2020-06-25 10:28:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksis`
--

CREATE TABLE `produksis` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomor_dokumen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengirim` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penerima` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemesanan_id` int(10) UNSIGNED NOT NULL,
  `volume` double NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `waktu_produksi` datetime NOT NULL,
  `shift` int(11) DEFAULT NULL,
  `supir_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `kendaraan_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produksis`
--

INSERT INTO `produksis` (`id`, `nomor_dokumen`, `nama_pengirim`, `nama_penerima`, `pemesanan_id`, `volume`, `produk_id`, `waktu_produksi`, `shift`, `supir_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `kendaraan_id`) VALUES
(1, '123', 'asdf', 'al', 1, 20, 1, '2020-04-12 15:13:25', 2, 1, 1, '2020-04-12 08:13:29', '2020-04-12 08:13:29', NULL, 1),
(2, '314', 'afd', 'asd', 1, 5, 1, '2020-04-12 15:15:23', 2, 1, 1, '2020-04-12 08:15:31', '2020-04-12 08:15:31', NULL, 1),
(3, '123456', 'Siapa', 'Udin', 3, 12.5, 3, '2020-04-19 14:34:54', 2, 1, 4, '2020-04-19 07:35:10', '2020-04-19 07:36:45', NULL, 1),
(4, '12345', 'Jon', 'heri', 2, 10, 3, '2020-06-25 17:29:36', 2, 2, 1, '2020-06-25 10:29:51', '2020-06-25 10:29:51', NULL, 1),
(5, 'cobashift1', 'saya', 'dia', 3, 1, 1, '2020-07-20 11:04:52', 1, 1, 1, '2020-07-20 16:05:07', '2020-07-20 16:05:07', NULL, 1),
(6, 'cobashift 2', 'sayalagi', 'dia', 3, 1, 1, '2020-07-20 17:05:27', 2, 1, 1, '2020-07-20 16:05:48', '2020-07-20 16:05:49', NULL, 1),
(7, 'cobashift3', 'saya', 'dia', 3, 1, 1, '2020-07-20 23:06:13', 3, 1, 1, '2020-07-20 16:06:47', '2020-07-20 16:06:48', NULL, 1),
(8, 'cobashift4', 'saya', 'dia', 3, 1, 1, '2020-07-20 05:07:18', 4, 1, 1, '2020-07-20 16:07:32', '2020-07-20 16:07:33', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supirs`
--

CREATE TABLE `supirs` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_supir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_sim` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_sim` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supirs`
--

INSERT INTO `supirs` (`id`, `no_supir`, `nama_supir`, `no_sim`, `expired_sim`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SPR4', 'Lenny Even', '9712309172037', '2021-07-29', NULL, '2020-07-29 08:39:07', NULL),
(2, 'SPR5', 'Weston Ballard', '4723482793847', '2020-08-25', NULL, NULL, NULL),
(3, 'SPR14', 'Wilburn Ohearn', '89734823749167', '2021-06-18', NULL, NULL, NULL),
(4, 'SPR7', 'Booker Brochu', '123971237189', '2027-07-23', NULL, NULL, NULL),
(5, 'SPR11', 'Jeffery Fleenor', '37498739187', '2020-10-17', NULL, NULL, NULL),
(6, 'SPR20', 'Asa Velazco', '7187263817', '2022-04-12', NULL, NULL, NULL),
(7, 'SPR1', 'Wilfredo Hubler', '341892731987', '2025-02-10', NULL, NULL, NULL),
(8, 'SPR15', 'Lonnie Axtell', '1263981273', '2023-07-01', NULL, NULL, NULL),
(9, 'SPR20', 'Theodore Abdulla', '3412738719783', '2022-07-29', NULL, '2020-07-29 08:38:46', NULL),
(10, 'SPR13', 'Brooks Oler', '18237198232', '2021-07-02', NULL, NULL, NULL),
(11, 'SPR8', 'Burhan', '131723718923', '2020-08-08', '2020-07-27 08:20:58', '2020-07-27 08:20:58', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jabatan_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `jabatan_id`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$jvmqnbllhjk/vRaD1pSSZunbtl0S7u1j3EPyvqIpP3khRXOn0mpPO', '3zVfRIn64MS1SJqxb1I8L9V3ycJ1E3Ixpqw8W7wKvXYiQwNio9XeciVnDZdr', '2020-04-06 09:12:27', '2020-04-06 09:12:27', 1),
(2, 'Logistik', 'logistik@admin.com', '$2y$10$jvmqnbllhjk/vRaD1pSSZunbtl0S7u1j3EPyvqIpP3khRXOn0mpPO', 'TYrOOW4H9OH4S6RE4VNolSjXtAG3I1oviv8jYf980eXD16fin0wzRtcBGJDg', '2020-04-06 09:12:27', '2020-04-06 09:12:27', 4),
(3, 'Marketing', 'marketing@admin.com', '$2y$10$jvmqnbllhjk/vRaD1pSSZunbtl0S7u1j3EPyvqIpP3khRXOn0mpPO', 'rIqJ2inoJpSYgi2ArHewfNLCt0qoPEr4Lhsdfx8Yl1KJYu6gOs1hbkJDbY4d', '2020-04-06 09:12:27', '2020-04-06 09:12:27', 2),
(4, 'Produksi', 'produksi@admin.com', '$2y$10$jvmqnbllhjk/vRaD1pSSZunbtl0S7u1j3EPyvqIpP3khRXOn0mpPO', 'bFwAb0v0l0bxD9E6cbUToBmphwvw6NBbLkhSzBl1eyeNcE8Gcz6iCU7ymuI0', '2020-04-06 09:12:28', '2020-04-06 09:12:28', 3),
(5, 'Manager Produksi', 'mapro@admin.com', '$2y$10$jvmqnbllhjk/vRaD1pSSZunbtl0S7u1j3EPyvqIpP3khRXOn0mpPO', 'yo7ayEwg2GfHkHzNPgebw3FdwS1iZTxjCndUuHF9gjTfgJCBnAySwEbf3IPz', '2020-04-06 09:12:28', '2020-04-06 09:12:28', 5),
(6, 'Dirut', 'dirut@admin.com', '$2y$10$jXvmlMb5lvIfq./ypKeSYeyYA1..zBai7PR3lQ31Dhoaym88eG11e', '4yDJ7xCJ7YxaLt9XSHx2MoIgeYAiYcbbrFobX8Nn9QtcaBQU0MNoeOcSwq9b', '2020-07-27 13:11:00', '2020-07-27 13:11:00', 6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_bakus`
--
ALTER TABLE `bahan_bakus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bahan_baku_histories`
--
ALTER TABLE `bahan_baku_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bahan_baku_histories_bahan_baku_id_foreign` (`bahan_baku_id`),
  ADD KEY `bahan_baku_histories_pengadaan_id_foreign` (`pengadaan_id`),
  ADD KEY `bahan_baku_histories_produksi_id_foreign` (`produksi_id`),
  ADD KEY `bahan_baku_histories_opname_id_foreign` (`opname_id`);

--
-- Indeks untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendaraans`
--
ALTER TABLE `kendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendaraan_details`
--
ALTER TABLE `kendaraan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komposisi_mutu`
--
ALTER TABLE `komposisi_mutu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `komposisi_mutu_produk_id_bahan_baku_id_unique` (`produk_id`,`bahan_baku_id`),
  ADD KEY `komposisi_mutu_bahan_baku_id_foreign` (`bahan_baku_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `opnames`
--
ALTER TABLE `opnames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opnames_bahan_baku_id_foreign` (`bahan_baku_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pemesanans_nomor_dokumen_unique` (`nomor_dokumen`),
  ADD KEY `pemesanans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `pemesanan_bahan_bakus`
--
ALTER TABLE `pemesanan_bahan_bakus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanan_bahan_bakus_user_id_foreign` (`user_id`),
  ADD KEY `pemesanan_bahan_bakus_bahan_baku_id_foreign` (`bahan_baku_id`);

--
-- Indeks untuk tabel `pengadaans`
--
ALTER TABLE `pengadaans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengadaans_nomor_dokumen_unique` (`nomor_dokumen`),
  ADD KEY `pengadaans_bahan_baku_id_foreign` (`bahan_baku_id`),
  ADD KEY `pengadaans_user_id_foreign` (`user_id`),
  ADD KEY `pengadaans_pemesanan_bahan_baku_id_foreign` (`pemesanan_bahan_baku_id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produksis`
--
ALTER TABLE `produksis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `produksis_nomor_dokumen_unique` (`nomor_dokumen`),
  ADD KEY `produksis_pemesanan_id_foreign` (`pemesanan_id`),
  ADD KEY `produksis_supir_id_foreign` (`supir_id`),
  ADD KEY `produksis_user_id_foreign` (`user_id`),
  ADD KEY `produksis_kendaraan_id_foreign` (`kendaraan_id`),
  ADD KEY `produksis_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `supirs`
--
ALTER TABLE `supirs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_jabatan_id_foreign` (`jabatan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan_bakus`
--
ALTER TABLE `bahan_bakus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `bahan_baku_histories`
--
ALTER TABLE `bahan_baku_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kendaraan_details`
--
ALTER TABLE `kendaraan_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `komposisi_mutu`
--
ALTER TABLE `komposisi_mutu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `opnames`
--
ALTER TABLE `opnames`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemesanans`
--
ALTER TABLE `pemesanans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_bahan_bakus`
--
ALTER TABLE `pemesanan_bahan_bakus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengadaans`
--
ALTER TABLE `pengadaans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produksis`
--
ALTER TABLE `produksis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `supirs`
--
ALTER TABLE `supirs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bahan_baku_histories`
--
ALTER TABLE `bahan_baku_histories`
  ADD CONSTRAINT `bahan_baku_histories_bahan_baku_id_foreign` FOREIGN KEY (`bahan_baku_id`) REFERENCES `bahan_bakus` (`id`),
  ADD CONSTRAINT `bahan_baku_histories_opname_id_foreign` FOREIGN KEY (`opname_id`) REFERENCES `opnames` (`id`),
  ADD CONSTRAINT `bahan_baku_histories_pengadaan_id_foreign` FOREIGN KEY (`pengadaan_id`) REFERENCES `pengadaans` (`id`),
  ADD CONSTRAINT `bahan_baku_histories_produksi_id_foreign` FOREIGN KEY (`produksi_id`) REFERENCES `produksis` (`id`);

--
-- Ketidakleluasaan untuk tabel `komposisi_mutu`
--
ALTER TABLE `komposisi_mutu`
  ADD CONSTRAINT `komposisi_mutu_bahan_baku_id_foreign` FOREIGN KEY (`bahan_baku_id`) REFERENCES `bahan_bakus` (`id`),
  ADD CONSTRAINT `komposisi_mutu_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`);

--
-- Ketidakleluasaan untuk tabel `opnames`
--
ALTER TABLE `opnames`
  ADD CONSTRAINT `opnames_bahan_baku_id_foreign` FOREIGN KEY (`bahan_baku_id`) REFERENCES `bahan_bakus` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD CONSTRAINT `pemesanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan_bahan_bakus`
--
ALTER TABLE `pemesanan_bahan_bakus`
  ADD CONSTRAINT `pemesanan_bahan_bakus_bahan_baku_id_foreign` FOREIGN KEY (`bahan_baku_id`) REFERENCES `bahan_bakus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_bahan_bakus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengadaans`
--
ALTER TABLE `pengadaans`
  ADD CONSTRAINT `pengadaans_bahan_baku_id_foreign` FOREIGN KEY (`bahan_baku_id`) REFERENCES `bahan_bakus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengadaans_pemesanan_bahan_baku_id_foreign` FOREIGN KEY (`pemesanan_bahan_baku_id`) REFERENCES `pemesanan_bahan_bakus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengadaans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produksis`
--
ALTER TABLE `produksis`
  ADD CONSTRAINT `produksis_kendaraan_id_foreign` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produksis_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produksis_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produksis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produksis_supir_id_foreign` FOREIGN KEY (`supir_id`) REFERENCES `supirs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
