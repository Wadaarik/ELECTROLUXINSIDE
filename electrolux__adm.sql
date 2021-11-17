-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 17 nov. 2021 à 16:59
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `electrolux__adm`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_chat` varchar(255) NOT NULL,
  `text_chat` longtext NOT NULL,
  `time_chat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`id`, `user_chat`, `text_chat`, `time_chat`) VALUES
(1, 'johnd@mail.com', 'test test', '2021/11/16 18:21:50'),
(2, 'johnd@mail.com', 'test test test', '2021/11/16 18:22:09'),
(3, 'johnd@mail.com', 'test test test', '2021/11/16 18:22:31'),
(5, 'jeanmarc@captavideo.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dignissim nunc dui, a tempus lorem porta eu. Sed efficitur nisi sit amet ultrices vehicula. Nam sed nisi sed dolor maximus vestibulum. Mauris lorem eros, lacinia at elit sed, faucibus semper lorem. Cras suscipit nunc fermentum felis scelerisque efficitur. Sed porta nec sapien finibus volutpat.', '2021/11/17 12:10:28');

-- --------------------------------------------------------

--
-- Structure de la table `electroluxinside`
--

DROP TABLE IF EXISTS `electroluxinside`;
CREATE TABLE IF NOT EXISTS `electroluxinside` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_usr` varchar(255) NOT NULL,
  `connect_time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `electroluxinside`
--

INSERT INTO `electroluxinside` (`id`, `email`, `ip_usr`, `connect_time`) VALUES
(28, 'johnd@mail.com', '127.0.0.1', '2021/11/17 12:42:12'),
(32, 'nicolasb@captavideo.com', '127.0.0.1', '2021/11/17 17:49:24'),
(27, 'jeanmarc@captavideo.com', '127.0.0.1', '2021/11/17 17:45:38');

-- --------------------------------------------------------

--
-- Structure de la table `electrolux_adm`
--

DROP TABLE IF EXISTS `electrolux_adm`;
CREATE TABLE IF NOT EXISTS `electrolux_adm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_id` varchar(255) NOT NULL,
  `adm_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `electrolux_adm`
--

INSERT INTO `electrolux_adm` (`id`, `adm_id`, `adm_password`) VALUES
(1, 'admID', '$2y$10$dZ6Q4jFlcb0nTIliLz.AwePwXKYga73tvmqARqgf3o0vGJ8fBl1za'),
(3, 'admID2', '$2y$10$4qrCM7tfbicxpLWxoDCKNesLlvreNk1p.nPQKmL2osbcwC4PytdTW');

-- --------------------------------------------------------

--
-- Structure de la table `pwd_g`
--

DROP TABLE IF EXISTS `pwd_g`;
CREATE TABLE IF NOT EXISTS `pwd_g` (
  `id` int(11) NOT NULL,
  `pwd_name` varchar(255) NOT NULL,
  `pwd_adm` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pwd_g`
--

INSERT INTO `pwd_g` (`id`, `pwd_name`, `pwd_adm`) VALUES
(1, 'Mot de passe global', '$2y$10$XeFJvD/VXbPyUiKJsw59uOOeELSOyFfPKWoj/.ZpM5shXhCSykln.'),
(2, 'Mot de passe de secours', '$2y$10$4EN9inSe3GW.TqzNJhau..ekLvx5pBKQC1TEATsjHi7ehgx4ASYB2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
