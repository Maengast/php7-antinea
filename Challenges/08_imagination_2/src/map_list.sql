-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 28 mars 2018 à 19:50
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `challenges_sql`
--

-- --------------------------------------------------------

--
-- Structure de la table `map_list`
--

DROP TABLE IF EXISTS `map_list`;
CREATE TABLE IF NOT EXISTS `map_list` (
  `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `map_number` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `nb_shrub` int(11) NOT NULL,
  `nb_enemy` int(11) NOT NULL,
  `enemy_type` varchar(11) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `map_list`
--

INSERT INTO `map_list` (`ID`, `map_number`, `width`, `height`, `nb_shrub`, `nb_enemy`, `enemy_type`) VALUES
(1, 1, 10, 10, 2, 2, 'gobelin'),
(2, 2, 20, 20, 4, 4, 'gobelin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
