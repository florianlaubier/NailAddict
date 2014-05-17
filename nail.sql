-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 17 Mai 2014 à 20:11
-- Version du serveur: 5.5.29
-- Version de PHP: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `nail`
--

-- --------------------------------------------------------

--
-- Structure de la table `Collection`
--

CREATE TABLE `Collection` (
  `id_user` int(11) NOT NULL,
  `id_vernis` int(11) NOT NULL,
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Localisation`
--

CREATE TABLE `Localisation` (
  `id_localisation` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  PRIMARY KEY (`id_localisation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Localisation`
--

INSERT INTO `Localisation` (`id_localisation`, `ville`, `pays`) VALUES
(1, 'Bordeaux', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `Magasin`
--

CREATE TABLE `Magasin` (
  `id_magasin` int(11) NOT NULL AUTO_INCREMENT,
  `nom_magasin` varchar(100) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `id_localisation_magasin` int(11) NOT NULL,
  PRIMARY KEY (`id_magasin`),
  UNIQUE KEY `id_localisation_magasin` (`id_localisation_magasin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Media`
--

CREATE TABLE `Media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `lien_media` varchar(200) NOT NULL,
  `type` enum('video','photo') DEFAULT NULL,
  `description_media` varchar(300) NOT NULL,
  PRIMARY KEY (`id_media`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Prix`
--

CREATE TABLE `Prix` (
  `id_prix` int(11) NOT NULL AUTO_INCREMENT,
  `valeur` float NOT NULL,
  `devise` enum('€','$') NOT NULL DEFAULT '€',
  PRIMARY KEY (`id_prix`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `lien_photo` varchar(200) DEFAULT NULL,
  `description_user` varchar(300) DEFAULT NULL,
  `id_localisation_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_localisation_user` (`id_localisation_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id_user`, `nom`, `prenom`, `pseudo`, `date_naissance`, `lien_photo`, `description_user`, `id_localisation_user`) VALUES
(1, 'RENAUDIE', 'Mathéa', 'Mathou', '1993-04-29', 'https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/t1.0-9/1545992_697240656993559_659707393_n.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Vernis`
--

CREATE TABLE `Vernis` (
  `id_vernis` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(50) NOT NULL,
  `texture` varchar(50) NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `avis` varchar(300) NOT NULL,
  `id_prix_vernis` int(11) NOT NULL,
  `id_magasin_vernis` int(11) NOT NULL,
  PRIMARY KEY (`id_vernis`),
  UNIQUE KEY `id_prix_vernis` (`id_prix_vernis`),
  UNIQUE KEY `id_magasin_vernis` (`id_magasin_vernis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Collection`
--
ALTER TABLE `Collection`
  ADD CONSTRAINT `contrainte_utilisateur_vernis` FOREIGN KEY (`id_user`) REFERENCES `Utilisateur` (`id_user`);

--
-- Contraintes pour la table `Magasin`
--
ALTER TABLE `Magasin`
  ADD CONSTRAINT `contrainte_magasin_localisation` FOREIGN KEY (`id_localisation_magasin`) REFERENCES `Localisation` (`id_localisation`);

--
-- Contraintes pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD CONSTRAINT `contrainte_utilisateur_localisation` FOREIGN KEY (`id_localisation_user`) REFERENCES `Localisation` (`id_localisation`);

--
-- Contraintes pour la table `Vernis`
--
ALTER TABLE `Vernis`
  ADD CONSTRAINT `contrainte_magasin_vernis` FOREIGN KEY (`id_magasin_vernis`) REFERENCES `Magasin` (`id_magasin`),
  ADD CONSTRAINT `contrainte_vernis_prix` FOREIGN KEY (`id_prix_vernis`) REFERENCES `Prix` (`id_prix`);
