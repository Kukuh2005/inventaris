-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2025 pada 08.19
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `depresiasis`
--

CREATE TABLE `depresiasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lama_depresiasi` int(11) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `depresiasis`
--

INSERT INTO `depresiasis` (`id`, `lama_depresiasi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 12, 'elektronik', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(2, 24, 'furnitur', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(3, 36, 'peralatan kantor', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(4, 48, 'alat laboratorium', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(5, 60, 'peralatan kebersihan', '2025-01-16 23:56:19', '2025-01-16 23:56:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributors`
--

CREATE TABLE `distributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_distributor` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `distributors`
--

INSERT INTO `distributors` (`id`, `nama_distributor`, `alamat`, `no_telp`, `email`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Andi Elektronik', 'Jakarta Selatan', '081234567890', 'andi@elektronik.com', 'Spesialis barang elektronik', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(2, 'Bina Office Supplies', 'Surabaya', '081223344556', 'bina@officesupplies.com', 'Penyedia kebutuhan kantor', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(3, 'Citra Furnitur', 'Bandung', '081345678901', 'citra@furniture.com', 'Spesialis furnitur kantor', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(4, 'Delta Komputer', 'Yogyakarta', '081987654321', 'delta@komputer.com', 'Penyedia perangkat IT', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(5, 'Eka Hardware', 'Denpasar', '081456789012', 'eka@hardware.com', 'Peralatan teknik dan mesin', '2025-01-16 23:56:19', '2025-01-16 23:56:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `hitung_depresiasis`
--

CREATE TABLE `hitung_depresiasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengadaan` int(11) NOT NULL,
  `tgl_hitung_depresiasi` date NOT NULL,
  `bulan` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `nilai_barang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hitung_depresiasis`
--

INSERT INTO `hitung_depresiasis` (`id`, `id_pengadaan`, `tgl_hitung_depresiasi`, `bulan`, `durasi`, `nilai_barang`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-02-17', 2, 1, 71003472, '2025-01-17 00:10:09', '2025-01-17 00:10:56'),
(2, 2, '2025-02-17', 2, 1, 11958333, '2025-01-17 00:10:09', '2025-01-17 00:11:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `kategori_assets`
--

CREATE TABLE `kategori_assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kategori_asset` varchar(20) NOT NULL,
  `kategori_asset` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_assets`
--

INSERT INTO `kategori_assets` (`id`, `kode_kategori_asset`, `kategori_asset`, `created_at`, `updated_at`) VALUES
(1, 'KA001', 'Peralatan Kantor', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(2, 'KA002', 'Peralatan Elektronik', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(3, 'KA003', 'Furnitur', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(4, 'KA004', 'Peralatan Laboratorium', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(5, 'KA005', 'Peralatan Kebersihan', '2025-01-16 23:56:19', '2025-01-16 23:56:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasis`
--

CREATE TABLE `lokasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_lokasi` varchar(20) NOT NULL,
  `nama_lokasi` varchar(25) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lokasis`
--

INSERT INTO `lokasis` (`id`, `kode_lokasi`, `nama_lokasi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'LOC001', 'Gudang Utama', 'Lokasi penyimpanan utama', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(2, 'LOC002', 'Ruang IT', 'Penyimpanan perangkat IT', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(3, 'LOC003', 'Kantor Depan', 'Lokasi kantor depan untuk tamu', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(4, 'LOC004', 'Gudang Cabang', 'Lokasi penyimpanan cabang', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(5, 'LOC005', 'Laboratorium', 'Penyimpanan alat laboratorium', '2025-01-16 23:56:19', '2025-01-16 23:56:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_barangs`
--

CREATE TABLE `master_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spesifikasi_teknis` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_barangs`
--

INSERT INTO `master_barangs` (`id`, `kode_barang`, `nama_barang`, `spesifikasi_teknis`, `created_at`, `updated_at`) VALUES
(1, 'BRG001', 'Meja Kantor', 'Kayu Jati, 120x60 cm', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(2, 'BRG002', 'Laptop Dell XPS', 'Core i7, 16GB RAM, SSD 512GB', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(3, 'BRG003', 'Lemari Arsip', 'Besi, 180x90x45 cm', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(4, 'BRG004', 'Printer Canon', 'Laser, Duplex, Wi-Fi', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(5, 'BRG005', 'Mikroskop Olympus', 'Digital, 40x Zoom', '2025-01-16 23:56:19', '2025-01-16 23:56:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merks`
--

CREATE TABLE `merks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merk` varchar(50) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `merks`
--

INSERT INTO `merks` (`id`, `merk`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'Merk untuk elektronik', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(2, 'IKEA', 'Merk untuk furnitur', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(3, 'Logitech', 'Merk untuk perangkat IT', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(4, 'Olympus', 'Merk untuk alat laboratorium', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(5, 'Panasonic', 'Merk untuk elektronik rumah tangga', '2025-01-16 23:56:19', '2025-01-16 23:56:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_02_065624_create_depresiasis_table', 1),
(5, '2025_01_02_065715_create_distributors_table', 1),
(6, '2025_01_02_065815_create_hitung_depresiasis_table', 1),
(7, '2025_01_02_065833_create_kategori_assets_table', 1),
(8, '2025_01_02_065847_create_lokasis_table', 1),
(9, '2025_01_02_065859_create_master_barangs_table', 1),
(10, '2025_01_02_065910_create_merks_table', 1),
(11, '2025_01_02_065928_create_mutasi_lokasis_table', 1),
(12, '2025_01_02_065942_create_opnames_table', 1),
(13, '2025_01_02_065957_create_pengadaans_table', 1),
(14, '2025_01_02_070006_create_satuans_table', 1),
(15, '2025_01_02_070023_create_sub_kategori_assets_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi_lokasis`
--

CREATE TABLE `mutasi_lokasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_pengadaan` int(11) NOT NULL,
  `tgl_mutasi` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `flag_lokasi` varchar(45) NOT NULL,
  `flag_pindah` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mutasi_lokasis`
--

INSERT INTO `mutasi_lokasis` (`id`, `id_lokasi`, `id_pengadaan`, `tgl_mutasi`, `jumlah`, `flag_lokasi`, `flag_pindah`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2025-01-17', 13, 'Ruang IT', 'Selesai', '2025-01-17 00:08:00', '2025-01-17 00:08:00'),
(2, 3, 2, '2025-01-17', 8, 'Di Kantor Depan', 'Proses', '2025-01-17 00:09:10', '2025-01-17 00:09:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `opnames`
--

CREATE TABLE `opnames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengadaan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_opname` date NOT NULL,
  `kondisi` varchar(25) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `opnames`
--

INSERT INTO `opnames` (`id`, `id_pengadaan`, `jumlah`, `tgl_opname`, `kondisi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-01-17', 'Baik', NULL, '2025-01-17 00:12:56', '2025-01-17 00:12:56'),
(2, 2, 3, '2025-01-17', 'Rusak Ringan', 'Hancur', '2025-01-17 00:13:42', '2025-01-17 00:13:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaans`
--

CREATE TABLE `pengadaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_master_barang` int(11) NOT NULL,
  `id_depresiasi` int(11) NOT NULL,
  `id_merk` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `id_sub_kategori_asset` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `kode_pengadaan` varchar(20) NOT NULL,
  `no_invoice` varchar(20) NOT NULL,
  `no_seri_barang` varchar(50) NOT NULL,
  `tahun_produksi` varchar(5) NOT NULL,
  `tgl_pengadaan` date NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `nilai_barang` int(11) NOT NULL,
  `fb` enum('0','1') NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengadaans`
--

INSERT INTO `pengadaans` (`id`, `id_master_barang`, `id_depresiasi`, `id_merk`, `id_satuan`, `id_sub_kategori_asset`, `id_distributor`, `kode_pengadaan`, `no_invoice`, `no_seri_barang`, `tahun_produksi`, `tgl_pengadaan`, `harga_barang`, `jumlah_barang`, `nilai_barang`, `fb`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 5, 1, 2, 1, 'PIVN-2025100001', 'IVN-202501', 'S-45249', '2020', '2025-01-17', 5500000, 13, 71500000, '0', NULL, '2025-01-17 00:00:08', '2025-01-17 00:00:08'),
(2, 1, 2, 2, 3, 1, 3, 'PIVN-2025100002', 'IVN-202502', 'L9320', '2024', '2025-01-17', 1500000, 8, 12000000, '0', NULL, '2025-01-17 00:01:27', '2025-01-17 00:01:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuans`
--

CREATE TABLE `satuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `satuans`
--

INSERT INTO `satuans` (`id`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 'Unit', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(2, 'Pcs', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(3, 'Set', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(4, 'Box', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(5, 'Pack', '2025-01-16 23:56:19', '2025-01-16 23:56:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gCu2H673SELgseRLl6F2u9BCAlAKol8socz8aR13', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM3lVVUR0ZUplY2plcHVHSDdLRE5MUkNmNjV2WWZJUk9pRFBpMEZUdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1737098218);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kategori_assets`
--

CREATE TABLE `sub_kategori_assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori_asset` int(11) NOT NULL,
  `kode_sub_kategori_asset` varchar(20) NOT NULL,
  `sub_kategori_asset` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sub_kategori_assets`
--

INSERT INTO `sub_kategori_assets` (`id`, `id_kategori_asset`, `kode_sub_kategori_asset`, `sub_kategori_asset`, `created_at`, `updated_at`) VALUES
(1, 1, 'SK001', 'Meja dan Kursi', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(2, 2, 'SK002', 'Komputer dan Laptop', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(3, 3, 'SK003', 'Lemari Arsip', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(4, 4, 'SK004', 'Mikroskop', '2025-01-16 23:56:19', '2025-01-16 23:56:19'),
(5, 5, 'SK005', 'Vacuum Cleaner', '2025-01-16 23:56:19', '2025-01-16 23:56:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administratorh@admin.com', NULL, '$2y$12$p//LNdMMvCGSQhkFTz0Xg.JBdcLo07zXio8ThvYCEROUv65xqdUr2', 'admin', NULL, '2025-01-16 23:57:29', '2025-01-16 23:57:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `depresiasis`
--
ALTER TABLE `depresiasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hitung_depresiasis`
--
ALTER TABLE `hitung_depresiasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_assets`
--
ALTER TABLE `kategori_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasis`
--
ALTER TABLE `lokasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_barangs`
--
ALTER TABLE `master_barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `merks`
--
ALTER TABLE `merks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mutasi_lokasis`
--
ALTER TABLE `mutasi_lokasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `opnames`
--
ALTER TABLE `opnames`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengadaans`
--
ALTER TABLE `pengadaans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuans`
--
ALTER TABLE `satuans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `sub_kategori_assets`
--
ALTER TABLE `sub_kategori_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `depresiasis`
--
ALTER TABLE `depresiasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hitung_depresiasis`
--
ALTER TABLE `hitung_depresiasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_assets`
--
ALTER TABLE `kategori_assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `lokasis`
--
ALTER TABLE `lokasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `master_barangs`
--
ALTER TABLE `master_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `merks`
--
ALTER TABLE `merks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `mutasi_lokasis`
--
ALTER TABLE `mutasi_lokasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `opnames`
--
ALTER TABLE `opnames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengadaans`
--
ALTER TABLE `pengadaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `satuans`
--
ALTER TABLE `satuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sub_kategori_assets`
--
ALTER TABLE `sub_kategori_assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
