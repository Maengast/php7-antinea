-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 22 avr. 2018 à 21:48
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
-- Base de données :  `babyfoot`
--

-- --------------------------------------------------------

--
-- Structure de la table `matches`
--

DROP TABLE IF EXISTS `matches`;
CREATE TABLE IF NOT EXISTS `matches` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `team1` varchar(11) NOT NULL,
  `score_team1` int(11) NOT NULL,
  `team1_player1` int(11) NOT NULL,
  `team1_player2` int(11) NOT NULL,
  `team2` varchar(11) NOT NULL,
  `score_team2` int(11) NOT NULL,
  `team2_player1` int(11) NOT NULL,
  `team2_player2` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matches`
--

INSERT INTO `matches` (`ID`, `team1`, `score_team1`, `team1_player1`, `team1_player2`, `team2`, `score_team2`, `team2_player1`, `team2_player2`) VALUES
(1, 'Boloss1', 1, 1, 2, 'Boloss2', 0, 3, 4),
(10, 'Hehe', 2, 3, 4, 'Ole', 5, 4, 2),
(9, 'Randonneurs', 4, 6, 1, 'Hello', 2, 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(500) NOT NULL,
  `name` varchar(11) NOT NULL,
  `nb_victory` int(11) NOT NULL,
  `nb_defeat` int(11) NOT NULL,
  `ratio` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `players`
--

INSERT INTO `players` (`ID`, `avatar`, `name`, `nb_victory`, `nb_defeat`, `ratio`) VALUES
(1, 'img/Avatar0.png', 'Bidule', 1, 1, 1),
(2, 'img/Avatar1.png', 'Bidule2', 1, 1, 1),
(3, 'img/Avatar2.png', 'Bidule3', 1, 1, 1),
(4, 'img/Avatar3.png', 'Bidule4', 1, 1, 1),
(6, 'img/Avatar4.png', 'Noemie', 1, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
