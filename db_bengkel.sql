-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_bengkel
CREATE DATABASE IF NOT EXISTS `db_bengkel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_bengkel`;

-- Dumping structure for table db_bengkel.antrians
CREATE TABLE IF NOT EXISTS `antrians` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `tanggal` date DEFAULT NULL,
  `no_antrian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keperluan_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_finish` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.antrians: ~0 rows (approximately)

-- Dumping structure for table db_bengkel.autonumbers
CREATE TABLE IF NOT EXISTS `autonumbers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_digits` int NOT NULL,
  `next_number` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.autonumbers: ~0 rows (approximately)

-- Dumping structure for table db_bengkel.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.categories: ~5 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Toyota', '2023-04-30 06:23:53', '2023-04-30 06:23:53', NULL),
	(2, 'Honda', '2023-04-30 06:24:02', '2023-04-30 06:24:02', NULL),
	(3, 'Hyundai', '2023-04-30 06:24:37', '2023-04-30 06:24:37', NULL),
	(4, 'Suzuki', '2023-04-30 06:24:47', '2023-04-30 06:24:47', NULL),
	(5, 'Nissan', '2023-04-30 06:24:57', '2023-04-30 06:24:57', NULL);

-- Dumping structure for table db_bengkel.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_user_id_foreign` (`user_id`),
  CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.contacts: ~0 rows (approximately)

-- Dumping structure for table db_bengkel.customerservice
CREATE TABLE IF NOT EXISTS `customerservice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_bengkel.customerservice: ~0 rows (approximately)

-- Dumping structure for table db_bengkel.detail_jenis_services
CREATE TABLE IF NOT EXISTS `detail_jenis_services` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int unsigned NOT NULL,
  `jenisService_id` int unsigned DEFAULT NULL,
  `serviceName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_jenis_services_service_id_foreign` (`service_id`),
  KEY `detail_jenis_services_jenisservice_id_foreign` (`jenisService_id`),
  CONSTRAINT `detail_jenis_services_jenisservice_id_foreign` FOREIGN KEY (`jenisService_id`) REFERENCES `jenis_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_jenis_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.detail_jenis_services: ~2 rows (approximately)
INSERT INTO `detail_jenis_services` (`id`, `service_id`, `jenisService_id`, `serviceName`, `price`, `created_at`, `updated_at`) VALUES
	(1, 1, 5, 'Electronic Control Unit (ECU)', 300000, '2023-04-30 06:43:30', '2023-04-30 06:43:30'),
	(2, 2, 5, 'Electronic Control Unit (ECU)', 300000, '2023-04-30 07:06:53', '2023-04-30 07:06:53');

-- Dumping structure for table db_bengkel.detail_services
CREATE TABLE IF NOT EXISTS `detail_services` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int unsigned NOT NULL,
  `sparepart_id` int unsigned DEFAULT NULL,
  `sparepartName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_sparepart` int NOT NULL,
  `price` int NOT NULL,
  `biayaPemasangan` int NOT NULL,
  `total_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_services_service_id_foreign` (`service_id`),
  KEY `detail_services_sparepart_id_foreign` (`sparepart_id`),
  CONSTRAINT `detail_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_services_sparepart_id_foreign` FOREIGN KEY (`sparepart_id`) REFERENCES `spareparts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.detail_services: ~1 rows (approximately)
INSERT INTO `detail_services` (`id`, `service_id`, `sparepart_id`, `sparepartName`, `total_sparepart`, `price`, `biayaPemasangan`, `total_price`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 'Lampu', 1, 150000, 75000, 225000, '2023-04-30 06:43:46', '2023-04-30 06:43:46');

-- Dumping structure for table db_bengkel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table db_bengkel.jenis_services
CREATE TABLE IF NOT EXISTS `jenis_services` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.jenis_services: ~5 rows (approximately)
INSERT INTO `jenis_services` (`id`, `name`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Jok Mobil', 5000000, '2023-04-30 06:28:09', '2023-04-30 06:28:09', NULL),
	(2, 'Rem', 200000, '2023-04-30 06:28:45', '2023-04-30 06:28:45', NULL),
	(3, 'Injeksi Mobil', 150000, '2023-04-30 06:29:04', '2023-04-30 06:33:56', NULL),
	(4, 'Karburator', 200000, '2023-04-30 06:29:23', '2023-04-30 06:33:42', NULL),
	(5, 'Electronic Control Unit (ECU)', 300000, '2023-04-30 06:29:41', '2023-04-30 06:33:22', NULL);

-- Dumping structure for table db_bengkel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.migrations: ~0 rows (approximately)

-- Dumping structure for table db_bengkel.montir
CREATE TABLE IF NOT EXISTS `montir` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_bengkel.montir: ~5 rows (approximately)
INSERT INTO `montir` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'M. Riski', 'Aktif', '2023-04-30 06:23:27', '2023-04-30 06:43:14', NULL),
	(2, 'Dedi Suherna', 'Aktif', '2023-04-30 06:23:43', '2023-04-30 07:04:41', NULL),
	(3, 'Hayabusa', 'Bekerja', '2023-04-30 06:25:27', '2023-04-30 14:19:38', NULL),
	(4, 'Freya Matur', 'Aktif', '2023-04-30 06:26:12', '2023-04-30 06:26:20', NULL),
	(5, 'Fredrin Maskill', 'Aktif', '2023-04-30 06:26:35', '2023-04-30 06:26:35', NULL);

-- Dumping structure for table db_bengkel.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.notifications: ~0 rows (approximately)

-- Dumping structure for table db_bengkel.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.password_resets: ~0 rows (approximately)

-- Dumping structure for table db_bengkel.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int unsigned NOT NULL,
  `namaRek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buktiPayment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int NOT NULL,
  `order_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_service_id_foreign` (`service_id`),
  CONSTRAINT `payments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.payments: ~2 rows (approximately)
INSERT INTO `payments` (`id`, `service_id`, `namaRek`, `bank`, `pembayaran`, `buktiPayment`, `total`, `order_date`, `created_at`, `updated_at`) VALUES
	(1, 1, 'admin', '-', 'Pembayaran ditempat', NULL, 525000, '2023-04-30', '2023-04-30 06:44:28', '2023-04-30 06:44:28'),
	(2, 2, 'admin', '-', 'Pembayaran ditempat', NULL, 300000, '2023-04-30', '2023-04-30 07:08:27', '2023-04-30 07:08:27');

-- Dumping structure for table db_bengkel.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
	(0, 'Pelanggan', NULL, NULL),
	(1, 'Admin', NULL, NULL),
	(2, 'Pemilik', NULL, NULL);

-- Dumping structure for table db_bengkel.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_antrian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_stnk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_plat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_date` date NOT NULL,
  `complaint` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu diproses',
  `status_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priceService` int DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_sp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_queue_unique` (`queue`),
  KEY `services_user_id_foreign` (`user_id`),
  CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.services: ~3 rows (approximately)
INSERT INTO `services` (`id`, `user_id`, `queue`, `no_antrian`, `tanggal`, `montir`, `name_stnk`, `number_plat`, `nama_mobil`, `jenis_mobil`, `service_date`, `complaint`, `status`, `status_service`, `priceService`, `total_price`, `keterangan`, `address_sp`, `photo`, `maps`, `created_at`, `updated_at`, `deleted_at`, `expired_at`) VALUES
	(1, 2, NULL, 'A 1', '2023-04-30', 'M. Riski', 'Nasrullah', 'AG 1 NU', 'Supra', 'Toyota', '2023-04-30', 'Kelistrikan mobil bermasalah', 'Pembayaran diverifikasi', 'booking service', 300000, 525000, NULL, NULL, NULL, NULL, '2023-04-30 13:42:27', '2023-04-30 06:44:28', NULL, '2023-05-01 13:42:27'),
	(2, 2, NULL, 'B 1', '2023-04-30', 'Dedi Suherna', 'Nasrullah', 'AG 133 NU', 'Brio', 'Honda', '2023-04-30', 'Kelistrikan mobil bermasalah', 'Pembayaran diverifikasi', 'service panggilan', 300000, 300000, NULL, 'Jalan veteran no1', NULL, '-7.3007104 ,112.7284736', '2023-04-30 14:03:48', '2023-04-30 07:08:27', NULL, '2023-05-01 14:03:48'),
	(3, 4, NULL, 'A 2', '2023-04-30', 'Hayabusa', 'Verlnad Hura', 'AG 988 VH', 'Brio', 'Honda', '2023-04-30', 'jok mobil rusak', 'Menunggu diproses', 'booking service', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-30 14:19:38', '2023-04-30 14:19:38', NULL, '2023-05-01 14:19:38');

-- Dumping structure for table db_bengkel.spareparts
CREATE TABLE IF NOT EXISTS `spareparts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int unsigned NOT NULL,
  `nameS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `biayaPemasangan` int NOT NULL,
  `stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `spareparts_category_id_foreign` (`category_id`),
  CONSTRAINT `spareparts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.spareparts: ~5 rows (approximately)
INSERT INTO `spareparts` (`id`, `category_id`, `nameS`, `price`, `biayaPemasangan`, `stock`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Filter Oli', 200000, 100000, 10, '2023-04-30 06:31:00', '2023-04-30 06:31:00'),
	(2, 1, 'Lampu', 150000, 75000, 4, '2023-04-30 06:31:34', '2023-04-30 06:43:58'),
	(3, 3, 'Audio', 300000, 150000, 3, '2023-04-30 06:31:52', '2023-04-30 06:31:52'),
	(4, 1, 'Pintu', 300000, 100000, 2, '2023-04-30 06:32:07', '2023-04-30 06:32:07'),
	(5, 1, 'Jok Mobil', 300000, 150000, 12, '2023-04-30 06:32:30', '2023-04-30 06:32:30');

-- Dumping structure for table db_bengkel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint unsigned DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_bengkel.users: ~4 rows (approximately)
INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `email_verified_at`, `is_admin`, `password`, `address`, `phoneNumber`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'admin', 1, 'admin@gmail.com', NULL, 0, '$2y$10$a3H5cNmYrmOi1lqU9HVp7uTUji.7CtZhWUNzqDnl76MmaDZzKxdBG', NULL, NULL, NULL, '2023-04-30 06:17:53', '2023-04-30 06:17:53', NULL),
	(2, 'Nasrullah', 0, 'nasrullah@gmail.com', NULL, 0, '$2y$10$I.cfUBtu4/MCD9HAYKQdLuog3kzMIC.HqP4ThRd8rx5B.a28cUqSO', 'Kandat Purwoasri', '08321123321', NULL, '2023-04-30 06:35:11', '2023-04-30 06:35:11', NULL),
	(3, 'pemilik', 2, 'pemilik@gmail.com', NULL, 0, '$2y$10$hP4BY9ydR2.kZ8eH40r5oOh5jbHS5dxaryJNhijXnxGezCbzh/a5W', NULL, NULL, NULL, '2023-04-30 07:13:24', '2023-04-30 07:13:24', NULL),
	(4, 'Verlnad Hura', 0, 'verlnad@gmail.com', NULL, 0, '$2y$10$1Eg5OQQAWNUHpbqxhMyswOztU9tbKN0h0XB70c6uFV4zqJ8q0VS7S', 'Jl. Patimura no.9', '082133213212', NULL, '2023-04-30 07:18:26', '2023-04-30 07:18:26', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
