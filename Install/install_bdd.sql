-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.4.13-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour reun_eat
CREATE DATABASE IF NOT EXISTS `reun_eat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `reun_eat`;

-- Listage de la structure de la table reun_eat. t_commentaire
CREATE TABLE IF NOT EXISTS `t_commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(255) DEFAULT NULL,
  `note` int(5) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `fk_resto` int(11) DEFAULT NULL,
  `fk_plat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table reun_eat.t_commentaire : 0 rows
/*!40000 ALTER TABLE `t_commentaire` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_commentaire` ENABLE KEYS */;

-- Listage de la structure de la table reun_eat. t_plat
CREATE TABLE IF NOT EXISTS `t_plat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_plat` varchar(50) DEFAULT NULL,
  `photo_plat` varchar(255) DEFAULT NULL,
  `ingredient_plat` varchar(255) DEFAULT NULL,
  `description_plat` varchar(255) DEFAULT NULL,
  `fk_restau` int(11) DEFAULT NULL,
  `fk_com` int(11) DEFAULT NULL,
  `fk_note` int(11) DEFAULT NULL,
  `fk_cuisine` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table reun_eat.t_plat : 0 rows
/*!40000 ALTER TABLE `t_plat` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_plat` ENABLE KEYS */;

-- Listage de la structure de la table reun_eat. t_restaurant
CREATE TABLE IF NOT EXISTS `t_restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `photo_resto` varchar(255) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `fk_com` int(11) DEFAULT NULL,
  `fk_note` int(11) DEFAULT NULL,
  `fk_cuisine` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table reun_eat.t_restaurant : 0 rows
/*!40000 ALTER TABLE `t_restaurant` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_restaurant` ENABLE KEYS */;

-- Listage de la structure de la table reun_eat. t_user
CREATE TABLE IF NOT EXISTS `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table reun_eat.t_user : 0 rows
/*!40000 ALTER TABLE `t_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
