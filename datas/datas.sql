-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 22 Avril 2016 à 10:07
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `recette`
--

-- --------------------------------------------------------

--
-- Structure de la table `continent`
--

CREATE TABLE IF NOT EXISTS `continent` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lintitule` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lintitule_UNIQUE` (`lintitule`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `continent`
--

INSERT INTO `continent` (`id`, `lintitule`) VALUES
(4, 'Afrique'),
(5, 'Amérique'),
(2, 'Asie'),
(3, 'Europe'),
(1, 'Océanie');

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE IF NOT EXISTS `droit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lintitule` varchar(80) NOT NULL,
  `ecrit` tinyint(1) NOT NULL,
  `modif` tinyint(1) NOT NULL,
  `sup` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `droit`
--

INSERT INTO `droit` (`id`, `lintitule`, `ecrit`, `modif`, `sup`) VALUES
(1, 'admin', 1, 1, 1),
(2, 'modo', 1, 1, 0),
(3, 'redac', 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lintitule` varchar(100) NOT NULL,
  `ladesc` text NOT NULL,
  `continent_id` int(10) unsigned NOT NULL,
  `img` text,
  PRIMARY KEY (`id`),
  KEY `fk_sous-cat-pays_continent_idx` (`continent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id`, `lintitule`, `ladesc`, `continent_id`, `img`) VALUES
(1, 'Australie', 'Coucou', 1, NULL),
(2, 'Nouvelle Zélande', 'n importe', 1, NULL),
(3, 'Japon', 'ok', 2, NULL),
(4, 'Chine', 'Chien', 2, NULL),
(5, 'Belgique', 'pou', 3, NULL),
(6, 'Espagne', 'olé', 3, NULL),
(7, 'Maroc', 'bella', 4, NULL),
(8, 'Côte d''Ivoire', 'lunette', 4, NULL),
(9, 'Mexique', 'ld', 5, NULL),
(10, 'USA', 'ds', 5, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE IF NOT EXISTS `recette` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) NOT NULL,
  `ladesc` text NOT NULL,
  `ladate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(10) unsigned NOT NULL,
  `pays_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_user1_idx` (`user_id`),
  KEY `fk_recette_pays1_idx` (`pays_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `mdp` varchar(45) NOT NULL,
  `ladesc` text NOT NULL,
  `droit_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  KEY `fk_user_droit1_idx` (`droit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `mdp`, `ladesc`, `droit_id`) VALUES
(1, 'admin', 'admin', 'Super Kevin le gros, aime le chocolat', 1),
(2, 'modo', 'modo', 'petit modo ', 2),
(3, 'redac', 'redac', 'je sais rien faire', 3);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `fk_sous-cat-pays_continent` FOREIGN KEY (`continent_id`) REFERENCES `continent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `fk_article_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recette_pays1` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_droit1` FOREIGN KEY (`droit_id`) REFERENCES `droit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;