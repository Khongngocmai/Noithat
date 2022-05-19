-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 05:58 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tre`
--

-- --------------------------------------------------------

--
-- Table structure for table `anh`
--

CREATE TABLE `anh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anh`
--

INSERT INTO `anh` (`id`, `url`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(1, 'storage/images/categories/noithat.jpg', 1, 'App\\Models\\Category', '2022-03-07 20:10:53', '2022-03-07 20:10:53'),
(3, 'storage/images/categories/dt10-300x300.jpeg', 2, 'App\\Models\\Category', '2022-03-08 05:36:55', '2022-03-08 05:36:55'),
(4, 'storage/images/categories/binhphong.jpg', 3, 'App\\Models\\Category', '2022-03-08 06:12:23', '2022-03-08 06:12:23'),
(5, 'storage/images/categories/gio.jpg', 4, 'App\\Models\\Category', '2022-03-08 06:16:16', '2022-03-08 06:16:16'),
(7, 'storage/images/products/2ea771556843921dcb52-1-600x600.jpg', 3, 'App\\Models\\Product', '2022-03-08 06:37:53', '2022-03-08 06:37:53'),
(8, 'storage/images/products/8b5ced7ceb6a1134487b-1-600x600.jpg', 4, 'App\\Models\\Product', '2022-03-08 06:40:05', '2022-03-08 06:40:05'),
(9, 'storage/images/products/0be529da2fccd5928cdd-2-600x600.jpg', 5, 'App\\Models\\Product', '2022-03-08 06:44:14', '2022-03-08 06:44:14'),
(10, 'storage/images/products/0a19a621815c399a1b25516796c2e590-1-600x600.jpg', 6, 'App\\Models\\Product', '2022-03-08 06:46:40', '2022-03-08 06:46:40'),
(12, 'storage/images/products/dt10-300x300.jpeg', 7, 'App\\Models\\Product', '2022-03-18 00:18:07', '2022-03-18 00:18:07'),
(13, 'storage/images/products/ban-ghe-tre-phng-khach.jpg', 1, 'App\\Models\\Product', '2022-03-18 00:43:29', '2022-03-18 00:43:29'),
(14, 'storage/images/products/noithat.jpg', 1, 'App\\Models\\Product', '2022-03-18 00:43:29', '2022-03-18 00:43:29'),
(15, 'storage/images/products/dt10-300x300.jpeg', 2, 'App\\Models\\Product', '2022-03-18 00:50:04', '2022-03-18 00:50:04'),
(16, 'storage/images/products/2ea771556843921dcb52-1-600x600.jpg', 2, 'App\\Models\\Product', '2022-03-18 00:50:04', '2022-03-18 00:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_donhang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sp` bigint(20) UNSIGNED NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `id_donhang`, `id_sp`, `soluong`, `dongia`, `created_at`, `updated_at`) VALUES
(5, 'order_536318', 2, 1, 140000, '2022-03-08 07:35:41', '2022-03-08 07:35:41'),
(6, 'order_536318', 3, 1, 100000, '2022-03-08 07:35:42', '2022-03-08 07:35:42'),
(7, 'order_536318', 4, 1, 1000000, '2022-03-08 07:35:42', '2022-03-08 07:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_nguoidung` bigint(20) UNSIGNED NOT NULL,
  `id_sp` bigint(20) UNSIGNED NOT NULL,
  `sosao` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`id`, `id_nguoidung`, `id_sp`, `sosao`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, '2022-03-08 00:22:58', '2022-03-08 00:22:58'),
(2, 1, 1, 3, '2022-03-08 00:25:11', '2022-03-08 00:25:11'),
(3, 1, 1, 3, '2022-03-08 00:26:57', '2022-03-08 00:26:57'),
(4, 1, 1, 5, '2022-03-08 00:27:19', '2022-03-08 00:27:19'),
(5, 1, 1, 2, '2022-03-08 00:27:48', '2022-03-08 00:27:48'),
(6, 1, 6, 3, '2022-03-08 07:18:24', '2022-03-08 07:18:24'),
(7, 1, 4, 4, '2022-03-08 07:19:40', '2022-03-08 07:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `dmsp`
--

CREATE TABLE `dmsp` (
  `id_dmsp` bigint(20) UNSIGNED NOT NULL,
  `ten_dmsp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrang` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dmsp`
--

INSERT INTO `dmsp` (`id_dmsp`, `ten_dmsp`, `tinhtrang`, `created_at`, `updated_at`) VALUES
(1, 'Nội thất', 1, '2022-03-07 20:10:53', '2022-03-08 06:24:38'),
(2, 'Đèn tre', 1, '2022-03-08 05:36:55', '2022-03-08 05:36:55'),
(3, 'Bình phong', 1, '2022-03-08 06:12:23', '2022-03-08 06:12:23'),
(4, 'Giỏ', 1, '2022-03-08 06:16:16', '2022-03-08 06:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id_donhang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_nguoidung` bigint(20) UNSIGNED NOT NULL,
  `id_khuyenmai` bigint(20) UNSIGNED DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id_donhang`, `id_nguoidung`, `id_khuyenmai`, `diachi`, `thanhtien`, `tinhtrang`, `created_at`, `updated_at`) VALUES
('order_536318', 1, NULL, 'Hà Nội', 1240000, 2, '2022-03-08 07:35:27', '2022-03-08 07:44:53');

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
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id_khuyenmai` bigint(20) UNSIGNED NOT NULL,
  `makhuyenmai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giatien` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`id_khuyenmai`, `makhuyenmai`, `giatien`, `soluong`, `created_at`, `updated_at`) VALUES
(1, 'welcome', 10000, 100, '2022-03-27 11:47:48', '2022-03-27 11:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_qtv` bigint(20) DEFAULT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrang` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`id`, `id_qtv`, `noidung`, `created_at`, `updated_at`, `hoten`, `email`, `tinhtrang`) VALUES
(1, NULL, '<p>mong muốn hợp tác làm ăn</p>', '2022-03-29 20:36:33', '2022-03-29 20:55:17', 'Nguyễn Hữu Luân', 'cucbong0@gmail.com', 1);

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
(1, '2014_10_12_000000_create_nguoidung_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_03_063851_create_quantrivien_table', 1),
(6, '2022_03_03_065001_create_dmsp_table', 1),
(7, '2022_03_03_065010_create_ncc_table', 1),
(8, '2022_03_03_065025_create_sanpham_table', 1),
(9, '2022_03_03_065037_create_anh_table', 1),
(10, '2022_03_03_065121_create_danhgia_table', 1),
(11, '2022_03_03_065131_create_lienhe_table', 1),
(12, '2022_03_03_065152_create_khuyenmai_table', 1),
(13, '2022_03_03_065201_create_donhang_table', 1),
(14, '2022_03_03_065211_create_chitietdonhang_table', 1),
(15, '2022_03_30_022800_add_hoten_column_to_lienhe_table', 2),
(16, '2022_03_30_022812_add_email_column_to_lienhe_table', 2),
(17, '2022_03_30_032431_add_tinhtrang_column_to_lienhe_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ncc`
--

CREATE TABLE `ncc` (
  `id_ncc` bigint(20) UNSIGNED NOT NULL,
  `ten_ncc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ncc`
--

INSERT INTO `ncc` (`id_ncc`, `ten_ncc`, `diachi`, `sdt`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Xưởng nội thất Tre Việt Nam', 'TP.HCM', '0123456789', 'trevietnam@gmail.com', '2022-03-07 20:11:51', '2022-03-07 20:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_nguoidung` bigint(20) UNSIGNED NOT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `matkhau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id_nguoidung`, `hoten`, `email`, `email_verified_at`, `matkhau`, `sdt`, `gioitinh`, `tinhtrang`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test Name', 'test@gmail.com', NULL, '$2y$10$6muv38i5WmbV6INIJ731qeslu4CsZj/clIlQuqbUEri9oY.X/x29O', '0971719313', 1, 1, '0KLf0OG9FkNpUuMO73yhaNm5wd14C5JFAijdTxUp5PzKQXP0upjwi8YohzKv', '2022-03-08 00:19:58', '2022-03-29 19:04:25');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quantrivien`
--

CREATE TABLE `quantrivien` (
  `id_qtv` bigint(20) UNSIGNED NOT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `matkhau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quyen` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quantrivien`
--

INSERT INTO `quantrivien` (`id_qtv`, `hoten`, `email`, `email_verified_at`, `matkhau`, `quyen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2022-03-07 19:33:04', '$2y$10$MjEFZHhN5xF/xO0foaglY.x0zgoK6VJOOjPUyB7Yq1TRE4wqal8q6', 0, 'hE8X0MvCBH8h3E3vidnzzErm0lreNdseTXcJNWCIVpa0Cusp5034hGhWUvbx', '2022-03-07 19:33:04', '2022-03-07 19:33:04'),
(2, 'Nguyễn Văn A', 'nva@gmail.com', NULL, '$2y$10$6KBjKGaYZMoe.UOYtlulN.lgDRsyeWVyZeVd.Ckwn2NiaHpufPNPe', 1, 'YxxuRYzQPfpo0bsrSkwqXLSgUZOlBCFcGORlcvvWbx5OwDK2goPEGQWoSMXq', '2022-03-08 07:06:24', '2022-03-08 07:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` bigint(20) UNSIGNED NOT NULL,
  `id_dmsp` bigint(20) UNSIGNED NOT NULL,
  `id_ncc` bigint(20) UNSIGNED NOT NULL,
  `loai_sp` int(11) NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giatien` int(11) NOT NULL DEFAULT 0,
  `giakhuyenmai` int(11) NOT NULL DEFAULT 0,
  `thoigianbatdau` date DEFAULT NULL,
  `thoigianketthuc` date DEFAULT NULL,
  `soluong` int(11) NOT NULL DEFAULT 0,
  `soluongban` int(11) NOT NULL DEFAULT 0,
  `tinhtrang` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `id_dmsp`, `id_ncc`, `loai_sp`, `ten_sp`, `mota`, `giatien`, `giakhuyenmai`, `thoigianbatdau`, `thoigianketthuc`, `soluong`, `soluongban`, `tinhtrang`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 'Bàn ghế tre', NULL, 1000000, 0, NULL, NULL, 100, 0, 1, '2022-03-07 20:23:08', '2022-03-08 06:35:25'),
(2, 2, 1, 0, 'ĐÈN MÂY TRE ĐÀ NẴNG', NULL, 140000, 0, NULL, NULL, 99, 1, 1, '2022-03-08 06:36:36', '2022-03-08 07:35:42'),
(3, 2, 1, 0, 'Đèn tre', NULL, 100000, 0, NULL, NULL, 99, 1, 1, '2022-03-08 06:37:53', '2022-03-08 07:35:42'),
(4, 3, 1, 0, 'Bình phong tre', NULL, 1000000, 0, NULL, NULL, 199, 1, 1, '2022-03-08 06:40:05', '2022-03-08 07:35:42'),
(5, 3, 1, 1, 'Bình phong tre tại Đà Nẵng', '<p>Bình phong tre chất lượng cao xuất xứ 100% tre tự nhiên</p>', 0, 250000, '2022-03-08', '2022-03-10', 200, 0, 1, '2022-03-08 06:44:14', '2022-03-08 06:44:14'),
(6, 4, 1, 1, 'Giỏ tre', NULL, 0, 100000, '2022-03-08', '2022-03-22', 1000, 0, 1, '2022-03-08 06:46:40', '2022-03-08 06:46:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anh`
--
ALTER TABLE `anh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietdonhang_id_donhang_index` (`id_donhang`),
  ADD KEY `chitietdonhang_id_sp_index` (`id_sp`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhgia_id_nguoidung_index` (`id_nguoidung`),
  ADD KEY `danhgia_id_sp_index` (`id_sp`);

--
-- Indexes for table `dmsp`
--
ALTER TABLE `dmsp`
  ADD PRIMARY KEY (`id_dmsp`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`),
  ADD KEY `donhang_id_nguoidung_index` (`id_nguoidung`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id_khuyenmai`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncc`
--
ALTER TABLE `ncc`
  ADD PRIMARY KEY (`id_ncc`),
  ADD UNIQUE KEY `ncc_email_unique` (`email`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id_nguoidung`),
  ADD UNIQUE KEY `nguoidung_email_unique` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `quantrivien`
--
ALTER TABLE `quantrivien`
  ADD PRIMARY KEY (`id_qtv`),
  ADD UNIQUE KEY `quantrivien_email_unique` (`email`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `sanpham_id_dmsp_index` (`id_dmsp`),
  ADD KEY `sanpham_id_ncc_index` (`id_ncc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anh`
--
ALTER TABLE `anh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dmsp`
--
ALTER TABLE `dmsp`
  MODIFY `id_dmsp` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id_khuyenmai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ncc`
--
ALTER TABLE `ncc`
  MODIFY `id_ncc` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id_nguoidung` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quantrivien`
--
ALTER TABLE `quantrivien`
  MODIFY `id_qtv` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_id_donhang_foreign` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id_donhang`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietdonhang_id_sp_foreign` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE;

--
-- Constraints for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_id_nguoidung_foreign` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id_nguoidung`) ON DELETE CASCADE,
  ADD CONSTRAINT `danhgia_id_sp_foreign` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_id_nguoidung_foreign` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id_nguoidung`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_id_dmsp_foreign` FOREIGN KEY (`id_dmsp`) REFERENCES `dmsp` (`id_dmsp`),
  ADD CONSTRAINT `sanpham_id_ncc_foreign` FOREIGN KEY (`id_ncc`) REFERENCES `ncc` (`id_ncc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
