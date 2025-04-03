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


-- Dumping database structure for pra-b3
CREATE DATABASE IF NOT EXISTS `pra-b3` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pra-b3`;

-- Dumping structure for table pra-b3.taken
CREATE TABLE IF NOT EXISTS `taken` (
  `id` int NOT NULL AUTO_INCREMENT,
  `beschrijving` text COLLATE utf8mb4_general_ci NOT NULL,
  `afdeling` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'to-do',
  `title` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pra-b3.taken: ~12 rows (approximately)
INSERT INTO `taken` (`id`, `beschrijving`, `afdeling`, `status`, `title`, `deadline`) VALUES
	(2, 'homepagina maken', 'personeel', NULL, NULL, NULL),
	(3, 'takenllijst maken', 'personeel', NULL, NULL, NULL),
	(4, 'homepagina maken', 'techniek', NULL, NULL, NULL),
	(5, 'takenllijst maken', 'techniek', NULL, NULL, NULL),
	(8, 'css', 'personeel', 'to-do', 'homepagina maken', '2000-02-02'),
	(9, 'van aankomende week', 'personeel', 'to-do', 'taakverdeling maken', '2025-02-05'),
	(10, 'van aankomende week', 'personeel', 'to-do', 'taakverdeling maken', '2025-02-05'),
	(12, 'homepagina backend', 'techniek', 'done', 'backend homepagina', '2025-05-10'),
	(13, 'bier', 'klantenservice', 'doing', 'bier', '2025-10-05'),
	(14, 'bier kopen', 'horeca', 'to-do', 'bier', '2025-03-10'),
	(15, 'wijn kopen', 'inkoop', 'to-do', 'wijn', '2025-03-10'),
	(16, 'water geven', 'groen', 'to-do', 'planten', '2025-03-22');

-- Dumping structure for table pra-b3.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pra-b3.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `username`, `password`) VALUES
	(1, 'admin', 'admin12');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
