-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 20 juil. 2022 à 01:37
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
-- Base de données : `gestion_stagiaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidats`
--

DROP TABLE IF EXISTS `candidats`;
CREATE TABLE IF NOT EXISTS `candidats` (
  `id_candidat` int(4) NOT NULL AUTO_INCREMENT,
  `email_candidat` varchar(50) NOT NULL,
  `cv_candidat` varchar(15) NOT NULL,
  `lm_candidat` varchar(15) NOT NULL,
  PRIMARY KEY (`id_candidat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `types` varchar(15) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

DROP TABLE IF EXISTS `rendezvous`;
CREATE TABLE IF NOT EXISTS `rendezvous` (
  `num_rdv` int(4) NOT NULL AUTO_INCREMENT,
  `id_candidat` int(4) NOT NULL,
  `id_stagiaire` int(4) NOT NULL,
  `date_rdv` date NOT NULL,
  `heure_rdv` time NOT NULL,
  PRIMARY KEY (`num_rdv`),
  KEY `contrainterdvcandidat` (`id_candidat`),
  KEY `contrainterdvstagiaires` (`id_stagiaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `stagiaires`
--

DROP TABLE IF EXISTS `stagiaires`;
CREATE TABLE IF NOT EXISTS `stagiaires` (
  `id_stagiaire` int(4) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(4) NOT NULL,
  `nom_stagiaire` varchar(50) NOT NULL,
  `prenom_stagiaire` varchar(30) NOT NULL,
  `email_stagiaire` varchar(50) NOT NULL,
  `mdp_stagiaire` varchar(50) NOT NULL,
  `photo` varchar(15) NOT NULL,
  PRIMARY KEY (`id_stagiaire`),
  KEY `contraintstagiaire` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

DROP TABLE IF EXISTS `taches`;
CREATE TABLE IF NOT EXISTS `taches` (
  `num_tache` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `titre_tache` varchar(20) NOT NULL,
  `description_tache` text NOT NULL,
  `dure_tache` time NOT NULL,
  PRIMARY KEY (`num_tache`),
  KEY `foreignkey` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD CONSTRAINT `contrainterdvcandidat` FOREIGN KEY (`id_candidat`) REFERENCES `candidats` (`id_candidat`),
  ADD CONSTRAINT `contrainterdvstagiaires` FOREIGN KEY (`id_stagiaire`) REFERENCES `stagiaires` (`id_stagiaire`);

--
-- Contraintes pour la table `stagiaires`
--
ALTER TABLE `stagiaires`
  ADD CONSTRAINT `contraintstagiaire` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`);

--
-- Contraintes pour la table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `foreignkey` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
