-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 20 déc. 2019 à 19:43
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cram`
--
CREATE DATABASE IF NOT EXISTS `cram` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cram`;

-- --------------------------------------------------------

--
-- Structure de la table `commercial`
--

DROP TABLE IF EXISTS `commercial`;
CREATE TABLE IF NOT EXISTS `commercial` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `num_serie` int(11) NOT NULL,
  `poste` varchar(255) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `num_serie` (`num_serie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `correspondant`
--

DROP TABLE IF EXISTS `correspondant`;
CREATE TABLE IF NOT EXISTS `correspondant` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `etat` enum('actif','passif') DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `departement` varchar(11) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_serie` int(11) NOT NULL,
  `departement` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `departement_ibfk_1` (`num_serie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `groupe_mot_cle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_event`, `nom`, `groupe_mot_cle`) VALUES
(1, 'EFFONDREMENT', 'PARTICULIER'),
(2, 'EXPLO HAB', 'PARTICULIER'),
(3, 'EXPLOSION CHAUDIERE', 'PARTICULIER'),
(4, 'EXPLOSION SILO', 'INDUSTRIEL'),
(5, 'FEU ', 'AUTRE'),
(6, 'FEU APPART', 'PARTICULIER'),
(7, 'FEU ATELIER', 'INDUSTRIEL'),
(8, 'FEU BAR', 'INDUSTRIEL'),
(9, 'FEU BAT AGRI', 'PARTICULIER'),
(10, 'FEU BATIMENT', 'AUTRE'),
(11, 'FEU BLANCHISSERIE', 'INDUSTRIEL'),
(12, 'FEU BOULANGERIE', 'INDUSTRIEL'),
(13, 'FEU BUREAU', 'INDUSTRIEL'),
(14, 'FEU CABINE DE PEINTURE', 'INDUSTRIEL'),
(15, 'FEU CANTINE', 'INDUSTRIEL'),
(16, 'FEU CENTRE COMMERCIAUX', 'INDUSTRIEL'),
(17, 'FEU CHATEAU', 'INDUSTRIEL'),
(18, 'FEU CLINIQUE', 'INDUSTRIEL'),
(19, 'FEU COLLEGE', 'AUTRE'),
(20, 'FEU DE DEPOT', 'INDUSTRIEL'),
(21, 'FEU DEPENDANCE', 'PARTICULIER'),
(22, 'FEU DISCOTHEQUE', 'INDUSTRIEL'),
(23, 'FEU ECOLE', 'AUTRE'),
(24, 'FEU ECOLE', 'PARTICULIER'),
(25, 'FEU ENREPRISE', 'INDUSTRIEL'),
(26, 'FEU ENTREPOT', 'INDUSTRIEL'),
(27, 'FEU FORET', 'AUTRE'),
(28, 'FEU FOYER RURAL', 'PARTICULIER'),
(29, 'FEU FROMAGERIE', 'INDUSTRIEL'),
(30, 'FEU GARAGE', 'PARTICULIER'),
(31, 'FEU GARAGE AUTOMOBILE', 'INDUSTRIEL'),
(32, 'FEU GRANGE', 'PARTICULIER'),
(33, 'FEU HAB', 'PARTICULIER'),
(34, 'FEU HOTEL', 'INDUSTRIEL'),
(35, 'FEU IMMEUBLE', 'PARTICULIER'),
(36, 'FEU LABORATOIRE', 'INDUSTRIEL'),
(37, 'FEU MAGASIN', 'INDUSTRIEL'),
(38, 'FEU MAIRIE', 'AUTRE'),
(39, 'FEU MAISON DE RETRAITE', 'INDUSTRIEL'),
(40, 'FEU MENUISERIE', 'INDUSTRIEL'),
(41, 'FEU PARKING SOUTERRAIN', 'PARTICULIER'),
(42, 'FEU PEAGE', 'INDUSTRIEL'),
(43, 'FEU PRODUIT CHIMIQUE', 'INDUSTRIEL'),
(44, 'FEU RESTAURANT', 'INDUSTRIEL'),
(45, 'FEU SALLE DE SPORT', 'INDUSTRIEL'),
(46, 'FEU SALLE DES FETES', 'INDUSTRIEL'),
(47, 'FEU SCIERIE', 'INDUSTRIEL'),
(48, 'FEU SILO', 'PARTICULIER'),
(49, 'FEU TERRASSE', 'PARTICULIER'),
(50, 'FEU TOITURE', 'PARTICULIER'),
(51, 'FEU USINE', 'INDUSTRIEL'),
(52, 'INNONDATION MAGASIN', 'INDUSTRIEL');

-- --------------------------------------------------------

--
-- Structure de la table `facture_client`
--

DROP TABLE IF EXISTS `facture_client`;
CREATE TABLE IF NOT EXISTS `facture_client` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `num_serie` int(11) NOT NULL,
  `montant` decimal(10,3) NOT NULL,
  `date_facture` datetime NOT NULL,
  `nbr_Signalement` double NOT NULL DEFAULT '0',
  `paye` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `retrocession` float DEFAULT NULL,
  PRIMARY KEY (`num`),
  KEY `num_serie` (`num_serie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `facture_correspondant`
--

DROP TABLE IF EXISTS `facture_correspondant`;
CREATE TABLE IF NOT EXISTS `facture_correspondant` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL,
  `montant` decimal(10,3) DEFAULT NULL,
  `date_facture` datetime DEFAULT NULL,
  `paye` tinyint(1) DEFAULT NULL,
  `nbr_Signalement` float DEFAULT '0',
  `p_Signalement` float DEFAULT '0',
  `bonus` float DEFAULT NULL,
  `begin_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`num`),
  KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

DROP TABLE IF EXISTS `information`;
CREATE TABLE IF NOT EXISTS `information` (
  `n_sequence` varchar(255) NOT NULL,
  `date_facture` datetime DEFAULT NULL,
  `adresse` text,
  `code_postal` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `commentaire` text,
  `code` int(11) DEFAULT '10201',
  `id_event` int(11) DEFAULT '1',
  `valid` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`n_sequence`),
  KEY `code` (`code`),
  KEY `id_event` (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `moyen`
--

DROP TABLE IF EXISTS `moyen`;
CREATE TABLE IF NOT EXISTS `moyen` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `chiffre` varchar(255) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

DROP TABLE IF EXISTS `prestataire`;
CREATE TABLE IF NOT EXISTS `prestataire` (
  `num_serie` int(11) NOT NULL AUTO_INCREMENT,
  `raison_sociale` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `abonnement` int(11) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `etat` varchar(255) DEFAULT NULL,
  `commentaire` text,
  `type_facture` varchar(255) DEFAULT NULL,
  `code_moyen` int(11) DEFAULT NULL,
  `honoraire` float DEFAULT NULL,
  `nbr_signalement_payee` int(11) NOT NULL DEFAULT '0',
  `ville` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`num_serie`),
  KEY `id_moyen` (`code_moyen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `relation_information_correspondant`
--

DROP TABLE IF EXISTS `relation_information_correspondant`;
CREATE TABLE IF NOT EXISTS `relation_information_correspondant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_sequence` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `paye` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `n_sequence` (`n_sequence`),
  KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `relation_information_groupe_prestataire`
--

DROP TABLE IF EXISTS `relation_information_groupe_prestataire`;
CREATE TABLE IF NOT EXISTS `relation_information_groupe_prestataire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_sequence` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `relation_information_prestataire`
--

DROP TABLE IF EXISTS `relation_information_prestataire`;
CREATE TABLE IF NOT EXISTS `relation_information_prestataire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_sequence` varchar(255) NOT NULL,
  `num_serie` int(11) NOT NULL,
  `payee` tinyint(1) DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `n_sequence` (`n_sequence`),
  KEY `num_serie` (`num_serie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'cram', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commercial`
--
ALTER TABLE `commercial`
  ADD CONSTRAINT `commercial_ibfk_1` FOREIGN KEY (`num_serie`) REFERENCES `prestataire` (`num_serie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `departement`
--
ALTER TABLE `departement`
  ADD CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`num_serie`) REFERENCES `prestataire` (`num_serie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `facture_client`
--
ALTER TABLE `facture_client`
  ADD CONSTRAINT `facture_client_ibfk_1` FOREIGN KEY (`num_serie`) REFERENCES `prestataire` (`num_serie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `facture_correspondant`
--
ALTER TABLE `facture_correspondant`
  ADD CONSTRAINT `facture_correspondant_ibfk_1` FOREIGN KEY (`code`) REFERENCES `correspondant` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_ibfk_1` FOREIGN KEY (`code`) REFERENCES `moyen` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `information_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `evenement` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD CONSTRAINT `prestataire_ibfk_1` FOREIGN KEY (`code_moyen`) REFERENCES `moyen` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `relation_information_correspondant`
--
ALTER TABLE `relation_information_correspondant`
  ADD CONSTRAINT `relation_information_correspondant_ibfk_1` FOREIGN KEY (`n_sequence`) REFERENCES `information` (`n_sequence`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_information_correspondant_ibfk_2` FOREIGN KEY (`code`) REFERENCES `correspondant` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `relation_information_prestataire`
--
ALTER TABLE `relation_information_prestataire`
  ADD CONSTRAINT `relation_information_prestataire_ibfk_1` FOREIGN KEY (`n_sequence`) REFERENCES `information` (`n_sequence`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation_information_prestataire_ibfk_2` FOREIGN KEY (`num_serie`) REFERENCES `prestataire` (`num_serie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
