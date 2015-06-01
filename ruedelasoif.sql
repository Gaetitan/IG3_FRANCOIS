-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Client: 127.8.194.2:3306
-- Généré le: Lun 01 Juin 2015 à 13:40
-- Version du serveur: 5.5.41
-- Version de PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ruedelasoif`
--

DELIMITER $$
--
-- Fonctions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `FC_NBINSCRITS`(`monBarathonId` INT) RETURNS int(11)
    NO SQL
BEGIN
	DECLARE nbPlacesBase INT;
	DECLARE nbPlacesRestantes INT;

	SELECT barathonnbplaces_base INTO nbPlacesBase FROM barathon WHERE barathonid=monBarathonId;
	SELECT barathonnbplaces INTO nbPlacesRestantes FROM barathon WHERE barathonid=monBarathonId;
	
	RETURN nbPlacesBase-nbPlacesRestantes;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `bar`
--

CREATE TABLE IF NOT EXISTS `bar` (
  `barid` int(6) NOT NULL AUTO_INCREMENT,
  `barnom` varchar(255) NOT NULL,
  `barnumadresse` int(4) NOT NULL,
  `barrueadresse` varchar(255) NOT NULL,
  `barvilleadresse` varchar(255) NOT NULL,
  `barcpadresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`barid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `bar`
--

INSERT INTO `bar` (`barid`, `barnom`, `barnumadresse`, `barrueadresse`, `barvilleadresse`, `barcpadresse`) VALUES
(1, 'Cubanito Café', 13, 'rue de Verdun', 'Montpellier', '34000'),
(2, 'Lavista', 4, 'rue de Verdun', 'Montpellier', '34000'),
(3, 'Rockstore', 20, 'rue de Verdun', 'Montpellier', '34000'),
(4, 'Le Zoo', 8, 'place Alexandre Laissac', 'Montpellier', '34000'),
(5, 'The Temple Bar', 24, 'rue Aristide Ollivier', 'Montpellier', '34000'),
(6, 'Lord John', 19, 'avenue du Général de Gaulle', 'Limoges', '87000'),
(7, 'L''Atelier', 3, 'rue du Maupas', 'Limoges', '87000'),
(8, 'L''Insolite', 27, 'cours Jourdan', 'Limoges', '87000'),
(9, 'L''Irlandais', 2, 'rue Haute Cité', 'Limoges', '87000'),
(10, 'O''Brien', 6, 'cours Jourdan', 'Limoges', '87000'),
(11, 'Bar à Théon', 2, 'place de la Tour Foudroyée', 'Winterfell', 'WIS51'),
(12, 'Littlefinger''s Tavern', 15, 'rue du Temple', 'King''s Landing', 'GOT23'),
(13, 'Dragon''s Gate', 15, 'cours du Feu', 'King''s Landing', 'GOT23'),
(14, 'Summer Is Leaving', 56, 'boulevard du Port', 'King''s Landing', 'GOT23');

-- --------------------------------------------------------

--
-- Structure de la table `barathon`
--

CREATE TABLE IF NOT EXISTS `barathon` (
  `barathonid` int(6) NOT NULL AUTO_INCREMENT,
  `barathonnom` varchar(255) NOT NULL,
  `barathonville` varchar(255) NOT NULL,
  `barathonnbplaces_base` int(3) NOT NULL,
  `barathonnbplaces` int(3) NOT NULL,
  `barathonprix` decimal(5,2) NOT NULL,
  `barathondate` datetime NOT NULL,
  `orgaid` int(6) NOT NULL,
  PRIMARY KEY (`barathonid`),
  UNIQUE KEY `barathonid` (`barathonid`),
  KEY `orgaid` (`orgaid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `barathon`
--

INSERT INTO `barathon` (`barathonid`, `barathonnom`, `barathonville`, `barathonnbplaces_base`, `barathonnbplaces`, `barathonprix`, `barathondate`, `orgaid`) VALUES
(1, 'Barathech', 'Montpellier', 200, 199, '15.00', '2015-06-12 20:00:00', 1),
(2, 'La nuit de l''ingénieur', 'Montpellier', 300, 299, '12.00', '2015-06-04 21:00:00', 2),
(3, 'Le retour du Roi', 'Limoges', 15, 14, '20.00', '2015-06-19 20:00:00', 3),
(4, 'Bois et après on en parle', 'Montpellier', 60, 60, '10.00', '2015-06-12 19:00:00', 4),
(6, 'Robert Barathon', 'King''s Landing', 20, 14, '15.50', '2015-06-06 20:00:00', 5),
(7, 'Chez Jeannot', 'Limoges', 30, 29, '12.00', '2015-06-03 18:50:00', 6);

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

CREATE TABLE IF NOT EXISTS `concerner` (
  `barathonid` int(6) NOT NULL,
  `barid` int(6) NOT NULL,
  PRIMARY KEY (`barathonid`,`barid`),
  KEY `FK_BARID` (`barid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `concerner`
--

INSERT INTO `concerner` (`barathonid`, `barid`) VALUES
(1, 1),
(2, 1),
(4, 1),
(1, 2),
(2, 2),
(4, 2),
(2, 3),
(4, 3),
(2, 4),
(4, 4),
(1, 5),
(2, 5),
(4, 5),
(3, 6),
(7, 6),
(3, 7),
(3, 8),
(7, 9),
(3, 10),
(7, 10),
(6, 12),
(6, 13),
(6, 14);

-- --------------------------------------------------------

--
-- Structure de la table `organisateur`
--

CREATE TABLE IF NOT EXISTS `organisateur` (
  `orgaid` int(6) NOT NULL AUTO_INCREMENT,
  `organom` varchar(255) NOT NULL,
  `orgaemail` varchar(255) NOT NULL,
  `orgamdp` varchar(255) NOT NULL,
  `orgacookie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`orgaid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `organisateur`
--

INSERT INTO `organisateur` (`orgaid`, `organom`, `orgaemail`, `orgamdp`, `orgacookie`) VALUES
(1, 'BDE Polytech Montpellier', 'bdepolytechmontpellier@polytech.fr', 'add9c6d171bc4cacdfa51a3fd5cffe3d', NULL),
(2, 'BREI Languedoc-Roussillon', 'contact@breilr.fr', '2a037276ffd2cffa24fa6e39de5c2443', NULL),
(3, 'Gaëtan FRANÇOIS', 'gaetitan@gmail.com', '29c08e3361d8d6f623e941ab5a84864e', NULL),
(4, 'Al bachir OUAADOUD', 'albach@gmail.com', '68a6c09b74c1da5c22d92216850add4d', NULL),
(5, 'Roi Tommen', 'king@kingslanding.we', 'ca85179ecddf9eccb1c9a213f9c088fb', NULL),
(6, 'Jeannot', 'jeannot@lebar.fr', '82e33ea6be84b0d128da6acba89b3d88', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
  `partid` int(6) NOT NULL AUTO_INCREMENT,
  `partnom` varchar(255) NOT NULL,
  `partprenom` varchar(255) NOT NULL,
  `partemail` varchar(255) NOT NULL,
  `partmdp` varchar(255) NOT NULL,
  `partcookie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`partid`),
  UNIQUE KEY `partemail` (`partemail`),
  UNIQUE KEY `partid` (`partid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `participant`
--

INSERT INTO `participant` (`partid`, `partnom`, `partprenom`, `partemail`, `partmdp`, `partcookie`) VALUES
(1, 'FRANÇOIS', 'Gaëtan', 'gaetitan@gmail.com', '29c08e3361d8d6f623e941ab5a84864e', NULL),
(2, 'LANNISTER', 'Tyrion', 'dwarf@lannister.com', '9a439ba0158ca64544836322298735e7', NULL),
(3, 'LANNISTER', 'Cersei', 'cersei@lannister.com', 'ac894bc0017118ceb286a251f883fd53', NULL),
(4, 'LANNISTER', 'Jamie', 'jamie@lannister.com', 'e4fb5c23dc20c8a7b57ab749c2f6b9f4', NULL),
(5, 'TARGARYEN', 'Daenerys', 'motherofdragons@targaryen.com', '8e2e44199c3c09cf1af099aa633fadc4', NULL),
(6, 'SNOW', 'Jon', 'lordcommander@nightwatch.com', 'dd2e5cf9b1b84c399df2229b447b59b9', NULL),
(7, 'POTTER', 'Harry', 'hpotter@poudlard.com', '2351ca870e3f369427ab6a0e7edd5e0b', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE IF NOT EXISTS `participer` (
  `barathonid` int(6) NOT NULL,
  `partid` int(6) NOT NULL,
  PRIMARY KEY (`barathonid`,`partid`),
  KEY `FK_PARTID` (`partid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participer`
--

INSERT INTO `participer` (`barathonid`, `partid`) VALUES
(1, 1),
(2, 1),
(3, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7);

--
-- Déclencheurs `participer`
--
DROP TRIGGER IF EXISTS `TR_INSCRIPTIONBARATHON`;
DELIMITER //
CREATE TRIGGER `TR_INSCRIPTIONBARATHON` BEFORE INSERT ON `participer`
 FOR EACH ROW BEGIN
	DECLARE nbPlaces INT;

	SELECT barathonnbplaces INTO nbPlaces FROM barathon WHERE barathon.barathonid=NEW.barathonid;

	IF nbPlaces <=0 THEN
		SIGNAL SQLSTATE '45000'
		SET MESSAGE_TEXT = 'INSCRIPTION IMPOSSIBLE';
	ELSE
		UPDATE barathon SET barathonnbplaces=nbPlaces-1 WHERE barathonid=NEW.barathonid;
	END IF;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `TR_SUPPRESSIONINSCRIPTION`;
DELIMITER //
CREATE TRIGGER `TR_SUPPRESSIONINSCRIPTION` BEFORE DELETE ON `participer`
 FOR EACH ROW BEGIN
	DECLARE nbPlaces INT;

	SELECT barathonnbplaces INTO nbPlaces FROM barathon WHERE barathon.barathonid=OLD.barathonid;

	UPDATE barathon SET barathonnbplaces=nbPlaces+1 WHERE barathonid=OLD.barathonid;

END
//
DELIMITER ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `barathon`
--
ALTER TABLE `barathon`
  ADD CONSTRAINT `FK_ORGAID` FOREIGN KEY (`orgaid`) REFERENCES `organisateur` (`orgaid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD CONSTRAINT `FK_BARATHONID2` FOREIGN KEY (`barathonid`) REFERENCES `barathon` (`barathonid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_BARID` FOREIGN KEY (`barid`) REFERENCES `bar` (`barid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `FK_BARATHONID` FOREIGN KEY (`barathonid`) REFERENCES `barathon` (`barathonid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_PARTID` FOREIGN KEY (`partid`) REFERENCES `participant` (`partid`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
