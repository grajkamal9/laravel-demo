-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.1.0 - MySQL Community Server - GPL
-- Server OS:                    Linux
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for laravel_docker
CREATE DATABASE IF NOT EXISTS `laravel_docker` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel_docker`;

-- Dumping structure for table laravel_docker.Customer
CREATE TABLE IF NOT EXISTS `Customer` (
  `CustomerId` int NOT NULL AUTO_INCREMENT,
  `ContactNo` text,
  `FirstName` longtext,
  `LastName` longtext,
  `Street` longtext,
  `Pincode` longtext,
  `State` longtext,
  `Email` longtext,
  PRIMARY KEY (`CustomerId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laravel_docker.Customer: ~7 rows (approximately)
INSERT INTO `Customer` (`CustomerId`, `ContactNo`, `FirstName`, `LastName`, `Street`, `Pincode`, `State`, `Email`) VALUES
	(1, '1234567890', 'Karl', 'Hans', 'Main Street 123', '12345', 'Bavaria', 'karl.hans@email.com'),
	(2, '9876543210', 'Anna', 'Schmidt', 'Park Avenue 456', '54321', 'Berlin', 'anna.schmidt@email.com'),
	(3, '5555555555', 'Thomas', 'Müller', 'Forest Road 789', '67890', 'Bavaria', 'thomas.muller@email.com'),
	(4, '1234567891', 'John', 'Doe', 'Oak Street 456', '56789', 'Bavaria', 'john.doe@email.com'),
	(5, '9876543211', 'Emily', 'Smith', 'Willow Avenue 789', '98765', 'Berlin', 'emily.smith@email.com'),
	(6, '5555555556', 'Sophia', 'Miller', 'Maple Road 123', '45678', 'Bavaria', 'sophia.miller@email.com'),
	(7, '1234567890', 'first name', 'last name', 'lake view', '1234565', 'Bavaria', 'test@test.com');

-- Dumping structure for table laravel_docker.CustomerLoanProperty
CREATE TABLE IF NOT EXISTS `CustomerLoanProperty` (
  `CustomerId` int NOT NULL,
  `PropertyId` int NOT NULL,
  `LoanId` int NOT NULL,
  PRIMARY KEY (`CustomerId`,`PropertyId`,`LoanId`),
  KEY `PropertyId` (`PropertyId`),
  KEY `LoanId` (`LoanId`),
  CONSTRAINT `customerloanproperty_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `Customer` (`CustomerId`),
  CONSTRAINT `customerloanproperty_ibfk_2` FOREIGN KEY (`PropertyId`) REFERENCES `Property` (`PropertyId`),
  CONSTRAINT `customerloanproperty_ibfk_3` FOREIGN KEY (`LoanId`) REFERENCES `Loan` (`LoanId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laravel_docker.CustomerLoanProperty: ~4 rows (approximately)
INSERT INTO `CustomerLoanProperty` (`CustomerId`, `PropertyId`, `LoanId`) VALUES
	(1, 1, 1),
	(1, 1, 2),
	(1, 2, 3),
	(2, 3, 4);

-- Dumping structure for table laravel_docker.failed_jobs
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

-- Dumping data for table laravel_docker.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table laravel_docker.Loan
CREATE TABLE IF NOT EXISTS `Loan` (
  `LoanId` int NOT NULL,
  `CustomerId` int NOT NULL,
  `Bank` longtext NOT NULL,
  `LoanAmount` double DEFAULT NULL,
  `IntrestRate` double DEFAULT NULL,
  `IntrestBanking` int DEFAULT NULL,
  `RepaymentAmount` double DEFAULT NULL,
  `InstallmentAmount` double DEFAULT NULL,
  `LoanStartDate` longtext,
  `LoanEndDate` longtext,
  PRIMARY KEY (`LoanId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laravel_docker.Loan: ~7 rows (approximately)
INSERT INTO `Loan` (`LoanId`, `CustomerId`, `Bank`, `LoanAmount`, `IntrestRate`, `IntrestBanking`, `RepaymentAmount`, `InstallmentAmount`, `LoanStartDate`, `LoanEndDate`) VALUES
	(1, 1, 'Bank of Munich', 10000, 5, 1, 1200, 300, '2023-01-15', '2024-01-15'),
	(2, 1, 'Berlin Bank', 8000, 4.5, 0, 1000, 250, '2023-02-20', '2024-02-20'),
	(3, 1, 'Hamburg Bank', 15000, 6, 1, 1800, 450, '2023-03-25', '2024-03-25'),
	(4, 2, 'Bank of Munich', 12000, 5.5, 0, 1400, 350, '2023-02-10', '2024-02-10'),
	(5, 4, 'Bank of Munich', 50000, 1.1, 0, 6600, 550, '2020-01-01', '2024-12-01'),
	(6, 5, 'Berlin Bank', 75000, 2.1, 0, 8250, 550, '2020-01-01', '2029-12-01'),
	(7, 6, 'Hamburg Bank', 100000, 3.1, 0, 10000, 550, '2020-01-01', '2034-12-01');

-- Dumping structure for table laravel_docker.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_docker.migrations: ~9 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(10, '2014_10_12_000000_create_users_table', 1),
	(11, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(12, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
	(13, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
	(14, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
	(15, '2016_06_01_000004_create_oauth_clients_table', 1),
	(16, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
	(17, '2019_08_19_000000_create_failed_jobs_table', 1),
	(18, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- Dumping structure for table laravel_docker.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_docker.oauth_access_tokens: ~0 rows (approximately)

-- Dumping structure for table laravel_docker.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_docker.oauth_auth_codes: ~0 rows (approximately)

-- Dumping structure for table laravel_docker.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_docker.oauth_clients: ~2 rows (approximately)
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	('9a1b9551-1b54-4976-b678-70e4448fddf3', NULL, 'Laravel Personal Access Client', 'NMtrmuYbM7LDdfcMxB2cNFe1HHCzj5FI8DPcrjd7', NULL, 'http://localhost', 1, 0, 0, '2023-09-11 11:43:19', '2023-09-11 11:43:19'),
	('9a1b9551-971e-45c5-911e-5b7ff6e074ec', NULL, 'Laravel Password Grant Client', 'AmWoZA2b9JaDYDaJFYA9M7wTk7TXbaeVdzbx2ZUF', 'users', 'http://localhost', 0, 1, 0, '2023-09-11 11:43:19', '2023-09-11 11:43:19');

-- Dumping structure for table laravel_docker.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_docker.oauth_personal_access_clients: ~1 rows (approximately)
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, '9a1b9551-1b54-4976-b678-70e4448fddf3', '2023-09-11 11:43:19', '2023-09-11 11:43:19');

-- Dumping structure for table laravel_docker.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_docker.oauth_refresh_tokens: ~0 rows (approximately)

-- Dumping structure for table laravel_docker.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_docker.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table laravel_docker.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_docker.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table laravel_docker.Property
CREATE TABLE IF NOT EXISTS `Property` (
  `PropertyId` int NOT NULL,
  `CustomerId` int NOT NULL,
  `Street` longtext,
  `Pincode` longtext,
  `State` longtext,
  `PropertySize` longtext,
  `Cost` double DEFAULT NULL,
  PRIMARY KEY (`PropertyId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table laravel_docker.Property: ~4 rows (approximately)
INSERT INTO `Property` (`PropertyId`, `CustomerId`, `Street`, `Pincode`, `State`, `PropertySize`, `Cost`) VALUES
	(1, 1, 'Garden View 1', '12345', 'Bavaria', '120 sqm', 300000),
	(2, 1, 'Mountain Side 23', '12345', 'Bavaria', '180 sqm', 450000),
	(3, 2, 'City Center 45', '54321', 'Berlin', '90 sqm', 250000),
	(4, 3, 'Lakefront 67', '67890', 'Bavaria', '200 sqm', 600000);

-- Dumping structure for table laravel_docker.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel_docker.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'test', 'test@test.com', NULL, '$2y$10$Jg7UfxppAPZbmkOAuLGwFupGpSzEJFHdBO6Ute7CLpXQtVLZs5NgW', NULL, '2023-09-12 05:07:36', '2023-09-12 05:07:36');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
