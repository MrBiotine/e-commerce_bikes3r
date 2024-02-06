-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
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


-- Listage de la structure de la base pour e-commerce_bikes3r
CREATE DATABASE IF NOT EXISTS `e-commerce_bikes3r` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `e-commerce_bikes3r`;

-- Listage de la structure de table e-commerce_bikes3r. bike
CREATE TABLE IF NOT EXISTS `bike` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `color_id` int DEFAULT NULL,
  `size_id` int DEFAULT NULL,
  `image_id` int DEFAULT NULL,
  `reference_bike` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_bike` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_bike` longtext COLLATE utf8mb4_unicode_ci,
  `price_bike` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4CBC378012469DE2` (`category_id`),
  KEY `IDX_4CBC37807ADA1FB5` (`color_id`),
  KEY `IDX_4CBC3780498DA827` (`size_id`),
  KEY `IDX_4CBC37803DA5256D` (`image_id`),
  CONSTRAINT `FK_4CBC378012469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `FK_4CBC37803DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  CONSTRAINT `FK_4CBC3780498DA827` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`),
  CONSTRAINT `FK_4CBC37807ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.bike : ~12 rows (environ)
INSERT INTO `bike` (`id`, `category_id`, `color_id`, `size_id`, `image_id`, `reference_bike`, `name_bike`, `description_bike`, `price_bike`) VALUES
	(1, 2, NULL, 6, 1, 'singlespeed acier riser', 'Beach Bump', 'SingleSpeed acier', 399.90),
	(2, 2, NULL, 6, 2, 'singlespeed acier riser2', 'Nebula One', 'SingleSpeed acier', 399.90),
	(3, 2, NULL, 6, 3, 'singlespeed acier riser3', 'Tahoe', 'SingleSpeed acier', 399.90),
	(4, 1, NULL, 6, 4, 'singlespeed alu riser1', 'Track Black', 'SingleSpeed alu', 429.00),
	(5, 1, NULL, 6, 5, 'singlespeed alu riser2', 'Track White', 'SingleSpeed alu', 429.00),
	(6, 2, NULL, 5, 6, 'singlespeed acier horn', 'Army Green - M', 'singlespeed acier, taille M, guidon corne', 590.95),
	(7, 1, NULL, 5, 11, 'singlespeed alu drop', 'Atk Brut - M', 'singlespeed alu taille M, guidon course', 889.00),
	(8, 1, NULL, 5, 14, 'singlespeed alu drop', 'Mataro White - M', 'singlespeed alu, taille M, guidon course', 849.95),
	(9, 1, NULL, 6, 15, 'singlespeed alu drop', 'Midnight Blue - M', 'singlespeed alu, taille M, guidon drop', 849.95),
	(10, 2, NULL, 5, 7, 'velo-singlespeed-acier_horn-line-rigby.jpg', 'Line Rigby', 'Single speed acier, guidon corne', 450.50),
	(11, 2, NULL, 5, 8, 'velo-singlespeed-acier_horn-line-wulf.jpg', 'Line Wulf', 'Single speed acier, guidon corne', 450.50),
	(12, 2, NULL, 5, 9, 'velo-singlespeed-acier_horn-line-matte-black.jpg', 'Line MatterBlack', 'Single speed acier, guidon corne', 450.50),
	(13, 1, NULL, 8, 16, 'singlespeed alu drop', 'Schindelhauer - Big', 'singlespeed alu - guidon course', 652.95);

-- Listage de la structure de table e-commerce_bikes3r. category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.category : ~3 rows (environ)
INSERT INTO `category` (`id`, `name_category`) VALUES
	(1, 'Aluminium'),
	(2, 'Acier'),
	(3, 'Bambou');

-- Listage de la structure de table e-commerce_bikes3r. color
CREATE TABLE IF NOT EXISTS `color` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.color : ~0 rows (environ)

-- Listage de la structure de table e-commerce_bikes3r. doctrine_migration_versions
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.doctrine_migration_versions : ~0 rows (environ)
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20231031151541', '2024-02-01 19:35:34', 6101);

-- Listage de la structure de table e-commerce_bikes3r. image
CREATE TABLE IF NOT EXISTS `image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `frame` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_wheel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cockpit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chainset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rear_wheel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.image : ~18 rows (environ)
INSERT INTO `image` (`id`, `frame`, `front_wheel`, `cockpit`, `chainset`, `rear_wheel`) VALUES
	(1, 'velo-singlespeed-acier_riser-beach-bum.jpg', NULL, NULL, NULL, NULL),
	(2, 'velo-singlespeed-acier_riser-nebula-1.jpg', NULL, NULL, NULL, NULL),
	(3, 'velo-singlespeed-acier_riser-tahoe.jpg', NULL, NULL, NULL, NULL),
	(4, 'velo-singlespeed-alu_riser-track-black.jpg', NULL, NULL, NULL, NULL),
	(5, 'velo-singlespeed-alu_riser-track-white.jpg', NULL, NULL, NULL, NULL),
	(6, 'velo-singlespeed-acier_horn-army-green.jpg', NULL, NULL, NULL, NULL),
	(7, 'velo-singlespeed-acier_horn-line-rigby.jpg', NULL, NULL, NULL, NULL),
	(8, 'velo-singlespeed-acier_horn-line-wulf.jpg', NULL, NULL, NULL, NULL),
	(9, 'velo-singlespeed-acier_horn-matte-black.jpg', NULL, NULL, NULL, NULL),
	(10, 'velo-singlespeed-acier_horn-line-sokol.jpg', NULL, NULL, NULL, NULL),
	(11, 'velo-singlespeed-alu_drop-atk-brut.jpg', NULL, NULL, NULL, NULL),
	(12, 'velo-singlespeed-alu_drop-cool-smoke.jpg', NULL, NULL, NULL, NULL),
	(13, 'velo-singlespeed-alu_drop-desert-sand.jpg', NULL, NULL, NULL, NULL),
	(14, 'velo-singlespeed-alu_drop-mataro-white.jpg', NULL, NULL, NULL, NULL),
	(15, 'velo-singlespeed-alu_drop-midnight-blue.jpg', NULL, NULL, NULL, NULL),
	(16, 'velo-singlespeed-alu_drop-schindelhauer-hektor.jpg', NULL, NULL, NULL, NULL),
	(17, 'velo-singlespeed-alu_drop-darkside-mannheim-track-10.jpg', NULL, NULL, NULL, NULL),
	(18, 'velo-singlespeed-alu_drop-la-piovra-atk-brut.jpg', NULL, NULL, NULL, NULL);

-- Listage de la structure de table e-commerce_bikes3r. messenger_messages
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.messenger_messages : ~0 rows (environ)

-- Listage de la structure de table e-commerce_bikes3r. order_bike
CREATE TABLE IF NOT EXISTS `order_bike` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bike_id` int DEFAULT NULL,
  `order_customer_id` int NOT NULL,
  `quantity_order` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_14D0D97D5A4816F` (`bike_id`),
  KEY `IDX_14D0D978827BC75` (`order_customer_id`),
  CONSTRAINT `FK_14D0D978827BC75` FOREIGN KEY (`order_customer_id`) REFERENCES `order_customer` (`id`),
  CONSTRAINT `FK_14D0D97D5A4816F` FOREIGN KEY (`bike_id`) REFERENCES `bike` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.order_bike : ~8 rows (environ)
INSERT INTO `order_bike` (`id`, `bike_id`, `order_customer_id`, `quantity_order`) VALUES
	(1, 12, 1, 1),
	(2, 6, 1, 1),
	(3, 12, 2, 1),
	(4, 6, 2, 2),
	(5, 10, 2, 1),
	(6, 12, 3, 5),
	(7, 3, 4, 1),
	(8, 2, 4, 2);

-- Listage de la structure de table e-commerce_bikes3r. order_customer
CREATE TABLE IF NOT EXISTS `order_customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `number_order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `date_order` date NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_60C16CB84E601050` (`number_order`),
  KEY `IDX_60C16CB8A76ED395` (`user_id`),
  CONSTRAINT `FK_60C16CB8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.order_customer : ~4 rows (environ)
INSERT INTO `order_customer` (`id`, `number_order`, `user_id`, `date_order`, `first_name`, `last_name`, `address`, `postcode`, `city`) VALUES
	(1, '65c0b7cd56faa', 2, '2024-02-05', NULL, NULL, NULL, NULL, NULL),
	(2, '65c0c066a4370', 1, '2024-02-05', NULL, NULL, NULL, NULL, NULL),
	(3, '65c0c4716e5a0', 1, '2024-02-05', NULL, NULL, NULL, NULL, NULL),
	(4, '65c16c7bd7726', 1, '2024-02-05', NULL, NULL, NULL, NULL, NULL);

-- Listage de la structure de table e-commerce_bikes3r. receipt
CREATE TABLE IF NOT EXISTS `receipt` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_customer_id` int NOT NULL,
  `number_receipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_receipt` date NOT NULL,
  `totalttc` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5399B6458827BC75` (`order_customer_id`),
  CONSTRAINT `FK_5399B6458827BC75` FOREIGN KEY (`order_customer_id`) REFERENCES `order_customer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.receipt : ~0 rows (environ)

-- Listage de la structure de table e-commerce_bikes3r. size
CREATE TABLE IF NOT EXISTS `size` (
  `id` int NOT NULL AUTO_INCREMENT,
  `value_size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.size : ~8 rows (environ)
INSERT INTO `size` (`id`, `value_size`) VALUES
	(1, '46 cm'),
	(2, '48 cm'),
	(3, '50 cm'),
	(4, '52 cm'),
	(5, '54 cm'),
	(6, '56 cm'),
	(7, '58 cm'),
	(8, '60 cm');

-- Listage de la structure de table e-commerce_bikes3r. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.user : ~4 rows (environ)
INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`) VALUES
	(1, 'dupontnemour@lafrance.fr', '[]', '$2y$13$ygcKaSvdUN7os4ISB9T.9ei7ARiUnt/jlW.pTKMNlq3vYs2jpYo4i', 1),
	(2, 'admin@gestion-bikes3r.com', '["ROLE_ADMIN"]', '$2y$13$NFjuou/2JhxqtqiQgpWMvefqxO.i7mfcfZ28TC2ltRnJxPcqcsM6O', 1),
	(3, 'customer1@iwantconsumer.com', '[]', '$2y$13$r0KVLmOQI7l9Oyl1TaRvJOdZQmmbkmxyJ0S2ot6lCol90M0jawfjS', 0),
	(5, 'gille.dufaux@aixenprovence.fr', '[]', '$2y$13$sX5dmElHZDsxotHBwR1tBO0tHBVZUOJsi1dY1XCoTkdCbHKLEg.re', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
