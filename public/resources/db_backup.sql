-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour e-commerce_bikes3r
CREATE DATABASE IF NOT EXISTS `e-commerce_bikes3r` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `e-commerce_bikes3r`;

-- Listage de la structure de la table e-commerce_bikes3r. bike
CREATE TABLE IF NOT EXISTS `bike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `reference_bike` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_bike` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_bike` longtext COLLATE utf8mb4_unicode_ci,
  `price_bike` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4CBC378012469DE2` (`category_id`),
  KEY `IDX_4CBC37807ADA1FB5` (`color_id`),
  KEY `IDX_4CBC3780498DA827` (`size_id`),
  KEY `IDX_4CBC37803DA5256D` (`image_id`),
  CONSTRAINT `FK_4CBC378012469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `FK_4CBC37803DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  CONSTRAINT `FK_4CBC3780498DA827` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`),
  CONSTRAINT `FK_4CBC37807ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.bike : ~0 rows (environ)
/*!40000 ALTER TABLE `bike` DISABLE KEYS */;
/*!40000 ALTER TABLE `bike` ENABLE KEYS */;

-- Listage de la structure de la table e-commerce_bikes3r. category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.category : ~2 rows (environ)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name_category`) VALUES
	(1, 'Aluminium'),
	(2, 'Acier'),
	(3, 'Bambou');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Listage de la structure de la table e-commerce_bikes3r. color
CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.color : ~0 rows (environ)
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
/*!40000 ALTER TABLE `color` ENABLE KEYS */;

-- Listage de la structure de la table e-commerce_bikes3r. doctrine_migration_versions
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.doctrine_migration_versions : ~0 rows (environ)
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20231031151541', '2024-01-03 09:25:07', 546);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;

-- Listage de la structure de la table e-commerce_bikes3r. image
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frame` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_wheel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cockpit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chainset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rear_wheel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.image : ~0 rows (environ)
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
/*!40000 ALTER TABLE `image` ENABLE KEYS */;

-- Listage de la structure de la table e-commerce_bikes3r. messenger_messages
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;

-- Listage de la structure de la table e-commerce_bikes3r. order_bike
CREATE TABLE IF NOT EXISTS `order_bike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bike_id` int(11) DEFAULT NULL,
  `order_customer_id` int(11) NOT NULL,
  `quantity_order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_14D0D97D5A4816F` (`bike_id`),
  KEY `IDX_14D0D978827BC75` (`order_customer_id`),
  CONSTRAINT `FK_14D0D978827BC75` FOREIGN KEY (`order_customer_id`) REFERENCES `order_customer` (`id`),
  CONSTRAINT `FK_14D0D97D5A4816F` FOREIGN KEY (`bike_id`) REFERENCES `bike` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.order_bike : ~0 rows (environ)
/*!40000 ALTER TABLE `order_bike` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_bike` ENABLE KEYS */;

-- Listage de la structure de la table e-commerce_bikes3r. order_customer
CREATE TABLE IF NOT EXISTS `order_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_order` date NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.order_customer : ~0 rows (environ)
/*!40000 ALTER TABLE `order_customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_customer` ENABLE KEYS */;

-- Listage de la structure de la table e-commerce_bikes3r. receipt
CREATE TABLE IF NOT EXISTS `receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_customer_id` int(11) NOT NULL,
  `number_receipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_receipt` date NOT NULL,
  `totalttc` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5399B6458827BC75` (`order_customer_id`),
  CONSTRAINT `FK_5399B6458827BC75` FOREIGN KEY (`order_customer_id`) REFERENCES `order_customer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.receipt : ~0 rows (environ)
/*!40000 ALTER TABLE `receipt` DISABLE KEYS */;
/*!40000 ALTER TABLE `receipt` ENABLE KEYS */;

-- Listage de la structure de la table e-commerce_bikes3r. size
CREATE TABLE IF NOT EXISTS `size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value_size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.size : ~8 rows (environ)
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` (`id`, `value_size`) VALUES
	(1, '46 cm'),
	(2, '48 cm'),
	(3, '50 cm'),
	(4, '52 cm'),
	(5, '54 cm'),
	(6, '56 cm'),
	(7, '58 cm'),
	(8, '60 cm');
/*!40000 ALTER TABLE `size` ENABLE KEYS */;

-- Listage de la structure de la table e-commerce_bikes3r. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table e-commerce_bikes3r.user : ~2 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`) VALUES
	(1, 'dupontnemour@lafrance.fr', '[]', '$2y$13$ygcKaSvdUN7os4ISB9T.9ei7ARiUnt/jlW.pTKMNlq3vYs2jpYo4i', 1),
	(2, 'admin@gestion-bikes3r.com', '["ROLE_ADMIN"]', '$2y$13$NFjuou/2JhxqtqiQgpWMvefqxO.i7mfcfZ28TC2ltRnJxPcqcsM6O', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
