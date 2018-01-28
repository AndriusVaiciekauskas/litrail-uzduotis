-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for gelezinkeliai
CREATE DATABASE IF NOT EXISTS `gelezinkeliai` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `gelezinkeliai`;

-- Dumping structure for table gelezinkeliai.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gelezinkeliai.migrations: 6 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_01_18_051204_create_roles_table', 1),
	(4, '2018_01_18_114620_create_services_table', 1),
	(5, '2018_01_18_153135_create_systems_table', 1),
	(6, '2018_01_18_161925_add_system_id_column_to_services_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table gelezinkeliai.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gelezinkeliai.password_resets: 0 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table gelezinkeliai.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gelezinkeliai.roles: 3 rows
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', '2018-01-18 18:10:12', '2018-01-18 18:10:12'),
	(2, 'Moderator', '2018-01-18 18:10:19', '2018-01-18 18:10:19'),
	(3, 'User', '2018-01-18 18:10:24', '2018-01-18 18:10:24');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table gelezinkeliai.services
CREATE TABLE IF NOT EXISTS `services` (
  `service_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `system_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`service_id`),
  KEY `services_system_id_foreign` (`system_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gelezinkeliai.services: 10 rows
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` (`service_id`, `service_name`, `description`, `parent_id`, `created_at`, `updated_at`, `system_id`) VALUES
	(1, 'Parent', 'parent system', 0, '2018-01-18 20:18:05', '2018-01-18 20:18:06', 0),
	(2, 'Service A', 'Donec in mi magna. Praesent auctor feugiat ante, sed varius justo tristique vitae. Proin eget mauris condimentum, blandit lectus vel, faucibus.', 1, '2018-01-18 18:18:56', '2018-01-18 18:33:37', 1),
	(3, 'Service B', 'Donec ac aliquet elit, et laoreet dui. Pellentesque justo justo, varius id tincidunt pretium, sodales vel diam. Nulla massa tortor, varius ultrices feugiat et, volutpat a ex. Pellentesque semper ultrices nunc, a sagittis augue tempor id.', 1, '2018-01-18 18:20:18', '2018-01-18 18:20:18', 2),
	(5, 'Service A1', 'Integer vitae est sagittis, rutrum odio eu, tempor sapien.', 2, '2018-01-18 18:21:12', '2018-01-18 18:21:12', 1),
	(6, 'Service A2', 'Nam viverra risus nisl, a ultricies metus malesuada at. Suspendisse viverra quam quam, eget consectetur urna consequat accumsan. Ut viverra eros sit amet risus eleifend, sed gravida augue dapibus.', 2, '2018-01-18 18:22:16', '2018-01-18 18:22:16', 1),
	(7, 'Service B1', 'In placerat dignissim odio, vel feugiat ante ullamcorper iaculis. Phasellus hendrerit ligula nec consectetur porta.', 3, '2018-01-18 18:22:42', '2018-01-18 18:22:42', 2),
	(9, 'Service B2', 'Nam viverra risus nisl, a ultricies metus malesuada at. Suspendisse viverra quam quam, eget consectetur urna consequat accumsan. Ut viverra eros sit amet risus eleifend, sed gravida augue dapibus.', 3, '2018-01-18 18:36:31', '2018-01-18 18:36:31', 2);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;

-- Dumping structure for table gelezinkeliai.systems
CREATE TABLE IF NOT EXISTS `systems` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gelezinkeliai.systems: 2 rows
/*!40000 ALTER TABLE `systems` DISABLE KEYS */;
INSERT INTO `systems` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'System 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus fringilla velit non lorem feugiat consequat. Nulla enim felis, mattis sed cursus non, porttitor vitae ipsum. Suspendisse malesuada justo a felis faucibus, in tempus enim blandit. Mauris ex ligula, vulputate vel sodales non, porta eget tellus. Nunc tristique, diam et pharetra pretium, metus elit commodo purus, vel congue ipsum nisl sit amet nisi. Fusce porta iaculis sapien in sagittis. Nunc vitae dui rhoncus, bibendum massa quis, tempus libero.', '2018-01-18 18:11:23', '2018-01-18 18:45:44'),
	(2, 'System 2', 'Vivamus fermentum felis orci, sit amet maximus odio dignissim quis. Nulla facilisi. Sed consequat, tellus in cursus faucibus, odio metus accumsan velit, eget bibendum justo felis at erat. Pellentesque condimentum massa nec ex ultricies commodo.', '2018-01-18 18:16:50', '2018-01-18 18:17:06'),
	(3, 'System 3', 'Nam viverra risus nisl, a ultricies metus malesuada at. Suspendisse viverra quam quam, eget consectetur urna consequat accumsan. Ut viverra eros sit amet risus eleifend, sed gravida augue dapibus.', '2018-01-18 18:26:39', '2018-01-18 18:26:39');
/*!40000 ALTER TABLE `systems` ENABLE KEYS */;

-- Dumping structure for table gelezinkeliai.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL DEFAULT '3',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gelezinkeliai.users: 2 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Andrius', 'a.vaiciekauskas@gmail.com', '$2y$10$o4TGafm99DNuZXb1vHjCu.sgrHg2M49Qicm83aGbbIcNiZ4EH/dj.', 1, 'tMPnY8m9y5e1B7d51ZNGlY9c0U8qpxbomUjFCsDwY2eWrHpXAVBygjpl9abA', '2018-01-18 18:08:40', '2018-01-18 18:08:40'),
	(2, 'John Doe', 'john@example.com', '$2y$10$gChvv0qis18MEkxVX6mzNeV0HHijRYqmVz9ly3p7z8vovI9FqF54C', 2, 'RTCbhBL9AKq2X2xc9aontKYQYC2X5RRteeFcUlJyPC1ZvNCzbmq4y1Ye5cHZ', '2018-01-18 18:09:02', '2018-01-18 18:09:02'),
	(3, 'Jane Doe', 'jane@example.com', '$2y$10$BSy9EyFssUkCrV6CbkGjQOToQy6o632azOFkzWSM08aIwxB3iiOvy', 3, '8zq4zTiMObaNWPwcqqfWgeZdnmGSVBSaD4gt6r12hF6n6WJ1QSNUpgPbquju', '2018-01-18 18:09:22', '2018-01-18 18:09:22');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
