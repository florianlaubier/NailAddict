-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 19 Mai 2014 à 23:42
-- Version du serveur :  5.6.16
-- Version de PHP :  5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `nail`
--

-- --------------------------------------------------------

--
-- Structure de la table `collection`
--

CREATE TABLE IF NOT EXISTS `collection` (
  `id_user` int(11) NOT NULL,
  `id_vernis` int(11) NOT NULL,
  KEY `id_user` (`id_user`),
  KEY `id_vernis` (`id_vernis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `collection`
--

INSERT INTO `collection` (`id_user`, `id_vernis`) VALUES
(2, 2),
(2, 3),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

CREATE TABLE IF NOT EXISTS `localisation` (
  `id_localisation` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  PRIMARY KEY (`id_localisation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `localisation`
--

INSERT INTO `localisation` (`id_localisation`, `ville`, `pays`) VALUES
(1, 'Bordeaux', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

CREATE TABLE IF NOT EXISTS `magasin` (
  `id_magasin` int(11) NOT NULL AUTO_INCREMENT,
  `nom_magasin` varchar(100) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `id_localisation_magasin` int(11) NOT NULL,
  PRIMARY KEY (`id_magasin`),
  KEY `id_localisation_magasin` (`id_localisation_magasin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `magasin`
--

INSERT INTO `magasin` (`id_magasin`, `nom_magasin`, `url`, `id_localisation_magasin`) VALUES
(1, 'Kiko', 'http://www.kikocosmetics.fr/', 1),
(2, 'Sephora', 'http://www.sephora.fr/', 1);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `lien_media` varchar(200) NOT NULL,
  `type` enum('video','photo') DEFAULT NULL,
  `description_media` varchar(300) NOT NULL,
  `date_creation` date DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_media`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id_media`, `lien_media`, `type`, `description_media`, `date_creation`, `id_user`) VALUES
(1, 'http://onglesdecoration.com/wp-content/uploads/2013/09/dessin-deco-ongles-nail-art-ourse-panda-simple.png', 'photo', 'PAnda Nails! :)', '2014-05-19', 3),
(2, 'http://1.1.1.5/bmi/media.meltyfashion.fr/article-1355416-ajust_930/a-chaque-ongle-son-sticker-rad-nail-pour.jpg', NULL, 'Boumchaka!!', '2014-05-13', 2);

-- --------------------------------------------------------

--
-- Structure de la table `prix`
--

CREATE TABLE IF NOT EXISTS `prix` (
  `id_prix` int(11) NOT NULL AUTO_INCREMENT,
  `valeur` float NOT NULL,
  `devise` enum('€','$') NOT NULL DEFAULT '€',
  PRIMARY KEY (`id_prix`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `prix`
--

INSERT INTO `prix` (`id_prix`, `valeur`, `devise`) VALUES
(1, 3.5, '€'),
(2, 4.5, '€');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `lien_photo` varchar(200) DEFAULT NULL,
  `description_user` varchar(300) DEFAULT NULL,
  `id_localisation_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_localisation_user` (`id_localisation_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom`, `prenom`, `pseudo`, `mot_de_passe`, `date_naissance`, `lien_photo`, `description_user`, `id_localisation_user`) VALUES
(1, 'RENAUDIE', 'Mathéa', 'Mathou', '', '1993-04-29', 'https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/t1.0-9/1545992_697240656993559_659707393_n.jpg', NULL, 1),
(2, 'Ruiz', 'Coralie', 'Coco', 'coco64', '1991-08-23', NULL, NULL, 1),
(3, 'Gourp', 'Clémentine', 'cliky', '123', '1991-09-30', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vernis`
--

CREATE TABLE IF NOT EXISTS `vernis` (
  `id_vernis` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(50) NOT NULL,
  `texture` varchar(50) NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `avis` varchar(300) NOT NULL,
  `lien_vernis` varchar(200) NOT NULL,
  `id_prix_vernis` int(11) NOT NULL,
  `id_magasin_vernis` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`id_vernis`),
  KEY `id_prix_vernis` (`id_prix_vernis`),
  KEY `id_magasin_vernis` (`id_magasin_vernis`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `vernis`
--

INSERT INTO `vernis` (`id_vernis`, `marque`, `texture`, `couleur`, `reference`, `avis`, `lien_vernis`, `id_prix_vernis`, `id_magasin_vernis`, `date_creation`) VALUES
(1, 'Kiko', 'Normale', 'Emeraude', '', '', 'http://img11.hostingpics.net/pics/728092vernisemeraude.png', 1, 1, '0000-00-00'),
(2, 'Kiko', 'Normale', 'Miror', '', '', 'http://img11.hostingpics.net/pics/359698vernismirror.png', 2, 1, '0000-00-00'),
(3, 'Kiko', 'Lacquer', 'Violet', '', '', 'http://img11.hostingpics.net/pics/476170verniskikonaillacquerviolet.png', 2, 1, '0000-00-00');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `collection_ibfk_1` FOREIGN KEY (`id_vernis`) REFERENCES `vernis` (`id_vernis`),
  ADD CONSTRAINT `contrainte_utilisateur_vernis` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `magasin`
--
ALTER TABLE `magasin`
  ADD CONSTRAINT `contrainte_magasin_localisation` FOREIGN KEY (`id_localisation_magasin`) REFERENCES `localisation` (`id_localisation`);

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `contrainte_utilisateur_localisation` FOREIGN KEY (`id_localisation_user`) REFERENCES `localisation` (`id_localisation`);

--
-- Contraintes pour la table `vernis`
--
ALTER TABLE `vernis`
  ADD CONSTRAINT `contrainte_magasin_vernis` FOREIGN KEY (`id_magasin_vernis`) REFERENCES `magasin` (`id_magasin`),
  ADD CONSTRAINT `contrainte_vernis_prix` FOREIGN KEY (`id_prix_vernis`) REFERENCES `prix` (`id_prix`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
