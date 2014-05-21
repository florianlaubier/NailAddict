-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 21 Mai 2014 à 20:44
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `nail`
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
(2, 1),
(4, 1),
(4, 2),
(4, 3),
(4, 1),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 12),
(1, 13);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `magasin`
--

INSERT INTO `magasin` (`id_magasin`, `nom_magasin`, `url`, `id_localisation_magasin`) VALUES
(1, 'Kiko', 'http://www.kikocosmetics.fr/', 1),
(2, 'Sephora', 'http://www.sephora.fr/', 1),
(3, 'Beauty Success', 'www.beautysuccess.fr/', 1),
(5, 'Yves Rocher', 'www.yves-rocher.fr/', 1);

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
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_media`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id_media`, `lien_media`, `type`, `description_media`, `date_creation`, `id_user`, `valide`) VALUES
(1, 'http://onglesdecoration.com/wp-content/uploads/2013/09/dessin-deco-ongles-nail-art-ourse-panda-simple.png', 'photo', 'PAnda Nails! :)', '2014-05-19', 3, 1),
(3, 'http://www.coupay.com/topoften/wp-content/uploads/2013/05/Nail-art-16.jpg', 'photo', 'Trop fort', '2014-05-20', 4, 1),
(4, 'https://lh6.ggpht.com/DO1Xz4IwbmbsPJDJyy6m5fBBXwewYh0NFYkozu8YWWAUiiUPUYEoI5ISDiMDd_d8VWE=w300', 'photo', 'petit test', '2014-05-13', 4, 1),
(7, 'http://auto.img.v4.skyrock.net/6844/84536844/pics/3178856363_1_2_Wdm1dXY8.jpg', 'photo', 'Inspiration jeu du Tic Tac Toe', '2014-05-21', 1, 1),
(8, 'http://s4.noelshack.com/uploads/images/7012712658600_22021e.png', 'photo', 'Petit nail art zebrÃ© parfait pour rugir !', '2014-05-21', 1, 1),
(9, 'http://data2.whicdn.com/images/24314970/thumb.jpg', 'photo', 'Il est oÃ¹ le Marsupilami ? Il est lÃ Ã Ã Ã  !', '2014-05-21', 1, 1),
(10, 'http://3.bp.blogspot.com/-ljJK4Ii0FYU/TjUP49BqbBI/AAAAAAAABX4/X1r7F-o9t0A/s1600/african+sunrise+nail+art.jpg', 'photo', 'Comme une envie de plage, de sable fin et de soleil !!! ', '2014-05-21', 1, 0),
(11, 'http://nailartelo.n.a.pic.centerblog.net/d1c4b9d1.JPG', 'photo', 'French bleutÃ©e :)', '2014-05-21', 1, 1),
(12, 'http://31.media.tumblr.com/tumblr_lf1y8ypjkO1qcwi3co1_500.png', 'photo', 'Remake de Black Swann â™¥', '2014-05-21', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `prix`
--

CREATE TABLE IF NOT EXISTS `prix` (
  `id_prix` int(11) NOT NULL AUTO_INCREMENT,
  `valeur` double NOT NULL,
  `devise` enum('€','$') NOT NULL DEFAULT '€',
  PRIMARY KEY (`id_prix`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `prix`
--

INSERT INTO `prix` (`id_prix`, `valeur`, `devise`) VALUES
(1, 3.5, '€'),
(2, 4.5, '€'),
(3, 4.900000095367432, '€'),
(4, 2.5, '€'),
(5, 1.5, '€'),
(6, 3, '€'),
(7, 1, '€');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom`, `prenom`, `pseudo`, `mot_de_passe`, `date_naissance`, `lien_photo`, `description_user`, `id_localisation_user`) VALUES
(1, 'RENAUDIE', 'Mathéa', 'Mathou', 'ingesup', '1993-04-29', 'https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn1/t1.0-9/1545992_697240656993559_659707393_n.jpg', NULL, 1),
(2, 'Ruiz', 'Coralie', 'Coco', 'coco64', '1991-08-23', NULL, NULL, 1),
(3, 'Gourp', 'Clémentine', 'cliky', '123', '1991-09-30', NULL, NULL, NULL),
(4, 'Laubier', 'Doudou', 'flo', 'flo', '1991-05-30', '', 'coupe coupe', 1),
(5, 'Prosper', 'Xavier', 'Graukaka', 'graukaka', '1995-05-09', '', 'j''aime le graukakakipu', 1);

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
  `avis` varchar(300) DEFAULT NULL,
  `lien_vernis` varchar(200) NOT NULL,
  `id_prix_vernis` int(11) NOT NULL,
  `id_magasin_vernis` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_vernis`),
  KEY `id_prix_vernis` (`id_prix_vernis`),
  KEY `id_magasin_vernis` (`id_magasin_vernis`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `vernis`
--

INSERT INTO `vernis` (`id_vernis`, `marque`, `texture`, `couleur`, `reference`, `avis`, `lien_vernis`, `id_prix_vernis`, `id_magasin_vernis`, `date_creation`, `valide`) VALUES
(1, 'Kiko', 'Normale', 'Emeraude', '344', '', 'http://img11.hostingpics.net/pics/728092vernisemeraude.png', 1, 1, '0000-00-00', 1),
(2, 'Kiko', 'Normale', 'Miror', '616', '', 'http://img11.hostingpics.net/pics/359698vernismirror.png', 2, 1, '0000-00-00', 0),
(3, 'Kiko', 'Lacquer', 'Violet', '302', '', 'http://img11.hostingpics.net/pics/476170verniskikonaillacquerviolet.png', 2, 1, '0000-00-00', 1),
(5, 'Kiko', 'Sun Pearl', 'Vernis anis', '427', '', 'https://lh5.googleusercontent.com/7agi7cYRbtyIrlWx8lp9nhRVRPEZD1hD09fivw8zSIxxmnBzlwFLq813z5UeqNqWqg=s309', 4, 1, '2014-05-21', 1),
(6, 'Kiko', 'Lacquer', 'Rose', '209', '', 'https://lh4.googleusercontent.com/isdOjKQC5sdXtCC6EQQbAJ9IjVNa_kUDrMYc1KYpa2z4hPlSvqNaDtaY9q2cfk83UQ=w230-h212', 5, 1, '2014-05-21', 1),
(7, 'Yves Rocher', 'Lacquer', 'Marron', 'Sween Brun', '', 'https://lh4.googleusercontent.com/nb1mySNX-jK2o83JdWEShXQonrlUG3pwNQ5C-2N-MMX3y-aJK7y3bxDPXjaO9Vyb1A=w230-h212', 6, 5, '2014-05-21', 1),
(8, 'Yves Rocher', 'Lacquer', 'Rose', 'Esmalte - Nagellack', '', 'https://lh4.googleusercontent.com/gP1FwKNqh-m4YWZXYVaWGksH0ghuHKb-1FUT7ReaV3t_2zhEVUiIiX2Q4Lcb6HiqpA=w230-h212', 7, 5, '2014-05-21', 1),
(12, 'Sephora', 'Lacquer', 'Blanc', 'Coco', '', 'https://lh6.googleusercontent.com/FI9yEtnoQ2MMdAg4OZN0lvDSp_dyZkA1E6eiy597C3_oD49mxTkTYt7r_p6kecMVdQ=w230-h212', 4, 2, '2014-05-21', 1),
(13, 'Sephora', 'Lacquer', 'Vert', 'Picnic in the park', '', 'https://lh4.googleusercontent.com/Ikyf3gTUurLb-KnHMPZo_Oio5Pq95NbFIdbji4XThTNtO0Du20zYPZNAvlDUC_0G5Q=w230-h212', 4, 2, '2014-05-21', 1);

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
  ADD CONSTRAINT `vernis_ibfk_1` FOREIGN KEY (`id_prix_vernis`) REFERENCES `prix` (`id_prix`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrainte_magasin_vernis` FOREIGN KEY (`id_magasin_vernis`) REFERENCES `magasin` (`id_magasin`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
