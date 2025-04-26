-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 23 avr. 2024 à 08:08
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `insea1a`
--

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

DROP TABLE IF EXISTS `fournisseurs`;
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `id_fournisseur` int NOT NULL AUTO_INCREMENT,
  `reason_soc` varchar(50) NOT NULL,
  `responsable` varchar(30) NOT NULL,
  `tel` varchar(10) NOT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id_fournisseur`, `reason_soc`, `responsable`, `tel`) VALUES
(1, '', 'AHMED', ''),
(2, '', 'Hicham', ''),
(3, '', 'omari', ''),
(5, 'quelque chose', 'omar', '0678563412'),
(6, 'quelque chose', 'bilal', '0798453216'),
(8, 'quelque chose', 'zakaria', '0654254976');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id_produit` int NOT NULL AUTO_INCREMENT,
  `prod_code` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prod_designation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prod_prix_a` decimal(10,0) NOT NULL,
  `prod_marge` int NOT NULL,
  `prod_quantite_st` int NOT NULL,
  `prod_seuil` int NOT NULL,
  `id_fournisseur` int NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `fk1` (`id_fournisseur`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id_produit`, `prod_code`, `prod_designation`, `prod_prix_a`, `prod_marge`, `prod_quantite_st`, `prod_seuil`, `id_fournisseur`) VALUES
(4, 'T5', 'coca', 45, 76, 7, 0, 1),
(5, 'T5', '89', 45, 76, 7, 0, 1),
(6, 'A45', 'COCA', 345, 76, 9, 9, 2),
(7, 'R56', 'FANTA', 56, 455, 4, 9, 1),
(8, 'R56', 'FANTA', 56, 455, 4, 9, 1),
(9, 'R56', 'FANTA', 56, 455, 4, 9, 1),
(10, 'R56', 'FANTA', 56, 455, 4, 9, 1),
(11, 'R56', 'bimo', 56, 455, 4, 9, 1),
(12, 'R56', 'omar', 56, 455, 4, 9, 1),
(13, 'R56', 'fakia', 56, 455, 4, 9, 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
