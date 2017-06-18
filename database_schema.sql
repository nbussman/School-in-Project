SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `instanz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bogenname` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `teilnehmeranzahl` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `projekte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` text CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `beschreibung` text CHARACTER SET utf8 NOT NULL,
  `maxAnzahl` int(11) NOT NULL,
  `akutelleAnzahl` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2825 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `teilnehmer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` text NOT NULL,
  `wahl1` int(11) NOT NULL,
  `wahl2` int(11) NOT NULL,
  `wahl3` int(11) NOT NULL,
  `projektZugewiesen` int(11) NOT NULL,
  `aktiv` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33653 DEFAULT CHARSET=latin1;
