-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 06:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 'Honda', '2023-03-05 08:17:13', '2023-03-05 08:17:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `reply` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customerservice`
--

CREATE TABLE `customerservice` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_jenis_services`
--

CREATE TABLE `detail_jenis_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `jenisService_id` int(10) UNSIGNED DEFAULT NULL,
  `serviceName` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_services`
--

CREATE TABLE `detail_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `sparepart_id` int(10) UNSIGNED DEFAULT NULL,
  `sparepartName` varchar(255) NOT NULL,
  `total_sparepart` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `biayaPemasangan` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `jenis_services`
--

CREATE TABLE `jenis_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_services`
--

INSERT INTO `jenis_services` (`id`, `name`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 'Speedometer', 200000, '2023-03-05 08:17:40', '2023-03-05 08:17:40', NULL),
(17, 'Tune Up', 1000000, '2023-03-05 08:18:54', '2023-03-05 08:18:54', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_03_021537_create_contacts_table', 1),
(5, '2021_05_08_084557_create_categories_table', 1),
(6, '2021_05_08_090941_create_spareparts_table', 1),
(7, '2021_05_08_093733_create_jenis_services_table', 1),
(8, '2021_05_08_094236_create_services_table', 1),
(9, '2021_05_08_094351_create_detail_services_table', 1),
(10, '2021_05_08_094601_create_payments_table', 1),
(11, '2021_06_08_082810_create_detail_jenis_services_table', 1),
(12, '2021_11_20_100000_create_autonumber_table', 2),
(13, '2022_06_08_151428_create_notifications_table', 3),
(14, '2022_06_10_112318_create_roles_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `montir`
--

CREATE TABLE `montir` (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `montir`
--

INSERT INTO `montir` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 'Junaedi', 'Aktif', '2023-03-05 08:16:52', '2023-03-05 08:16:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('delta@gmail.com', '$2y$10$uaeOpzS7oL9cNK.kOrEsNOLnYymoxnwMFTb4/yrCqsJ9PFEza.ckq', '2022-06-07 18:47:21'),
('iqbal@gmail.com', '$2y$10$pJ20JUVv98SpZpyh9.an/.eIiZecu6gop5m4YPzAcFzQiuDp/onSq', '2022-06-07 18:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `namaRek` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `buktiPayment` varchar(255) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(0, 'pelanggan', '2022-06-09 04:48:06', '2022-06-09 04:48:06'),
(1, 'admin', '2022-06-09 04:48:06', '2022-06-09 04:48:06'),
(2, 'pemilik', '2022-06-09 04:49:34', '2022-06-09 04:49:34'),
(3, 'non-aktif', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `queue` varchar(255) DEFAULT NULL,
  `no_antrian` varchar(255) NOT NULL,
  `tanggal` varchar(225) NOT NULL,
  `montir` varchar(255) DEFAULT NULL,
  `name_stnk` varchar(255) NOT NULL,
  `number_plat` varchar(255) NOT NULL,
  `nama_mobil` varchar(255) NOT NULL,
  `jenis_mobil` varchar(255) NOT NULL,
  `service_date` date NOT NULL,
  `complaint` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Menunggu diproses',
  `priceService` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicespanggilan`
--

CREATE TABLE `servicespanggilan` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `queue` varchar(255) DEFAULT NULL,
  `no_antrian` varchar(255) NOT NULL,
  `tanggal` varchar(225) NOT NULL,
  `montir` varchar(255) DEFAULT NULL,
  `name_stnk` varchar(255) NOT NULL,
  `number_plat` varchar(255) NOT NULL,
  `nama_mobil` varchar(255) NOT NULL,
  `jenis_mobil` varchar(255) NOT NULL,
  `service_date` date NOT NULL,
  `complaint` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Menunggu diproses',
  `priceService` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `maps` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spareparts`
--

CREATE TABLE `spareparts` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `nameS` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `biayaPemasangan` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spareparts`
--

INSERT INTO `spareparts` (`id`, `category_id`, `nameS`, `price`, `biayaPemasangan`, `stock`, `created_at`, `updated_at`) VALUES
(25, 19, 'Busi', 50000, 20000, 100, '2023-03-05 08:28:50', '2023-03-05 08:28:50'),
(26, 19, 'Filter', 200000, 50000, 100, '2023-03-05 08:35:12', '2023-03-05 08:35:12'),
(27, 19, 'Air Radiator', 300000, 100000, 100, '2023-03-05 08:36:15', '2023-03-05 08:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `email_verified_at`, `is_admin`, `password`, `address`, `phoneNumber`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 1, 'admin@gmail.com', NULL, 1, '$2y$10$1wK1nlmZ0uqfRSNiv5oCG.c81IOVe1RBkJqQGvMYtAOwGOINcHvPG', 'Jl. Bence Gang 1, Pakunden, Pesantren, Kota Kediri, Jawa Timur 64132, Indonesia', '081335204498', NULL, '2022-03-09 02:42:13', '2022-07-05 05:33:03', NULL),
(2, 'Owner', 0, 'owner@gmail.com', NULL, 0, '$2y$10$IWidmzETcJ1rjpNCeRh0Ye9YB1ymQwSrYO9tQNKRnNrEWTKnxDtdG', 'Sidomulyo Sumberbendo Wates Kab Kediri', '085335226022', NULL, '2022-03-09 08:07:39', '2022-07-05 16:52:19', NULL),
(3, 'Iqbal', 0, 'iqbal@gmail.com', NULL, 0, '$2y$10$sbWK./Ou0A3DV8Cukd9svO.eOz1ephbVqK9NzULd1ubiEffR/odgy', 'Pagu Gurah', '089776889123', NULL, '2022-05-27 21:02:49', '2022-07-03 18:42:58', NULL),
(41, 'faisal', 0, 'faisal@gmail.com', NULL, 0, '$2y$10$Ph8ArhH9Lq6UhYwVBUX9LuPPV07mLDG97DeaM7NCxol5HAvmJ1v4q', NULL, NULL, NULL, '2023-03-05 08:12:09', '2023-03-05 08:12:09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `customerservice`
--
ALTER TABLE `customerservice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_jenis_services`
--
ALTER TABLE `detail_jenis_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_jenis_services_service_id_foreign` (`service_id`),
  ADD KEY `detail_jenis_services_jenisservice_id_foreign` (`jenisService_id`);

--
-- Indexes for table `detail_services`
--
ALTER TABLE `detail_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_services_service_id_foreign` (`service_id`),
  ADD KEY `detail_services_sparepart_id_foreign` (`sparepart_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_services`
--
ALTER TABLE `jenis_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `montir`
--
ALTER TABLE `montir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_service_id_foreign` (`service_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_queue_unique` (`queue`),
  ADD KEY `services_user_id_foreign` (`user_id`);

--
-- Indexes for table `servicespanggilan`
--
ALTER TABLE `servicespanggilan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_queue_unique` (`queue`),
  ADD KEY `services_user_id_foreign` (`user_id`);

--
-- Indexes for table `spareparts`
--
ALTER TABLE `spareparts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spareparts_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customerservice`
--
ALTER TABLE `customerservice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_jenis_services`
--
ALTER TABLE `detail_jenis_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `detail_services`
--
ALTER TABLE `detail_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_services`
--
ALTER TABLE `jenis_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `montir`
--
ALTER TABLE `montir`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `servicespanggilan`
--
ALTER TABLE `servicespanggilan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `spareparts`
--
ALTER TABLE `spareparts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_jenis_services`
--
ALTER TABLE `detail_jenis_services`
  ADD CONSTRAINT `detail_jenis_services_jenisservice_id_foreign` FOREIGN KEY (`jenisService_id`) REFERENCES `jenis_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_jenis_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `servicespanggilan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_services`
--
ALTER TABLE `detail_services`
  ADD CONSTRAINT `detail_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `servicespanggilan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_services_sparepart_id_foreign` FOREIGN KEY (`sparepart_id`) REFERENCES `spareparts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `servicespanggilan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `servicespanggilan`
--
ALTER TABLE `servicespanggilan`
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spareparts`
--
ALTER TABLE `spareparts`
  ADD CONSTRAINT `spareparts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
