# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.38)
# Database: chessSoc
# Generation Time: 2019-11-19 22:27:29 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Address`;

CREATE TABLE `Address` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `street` varchar(256) DEFAULT NULL,
  `postcode` varchar(256) NOT NULL DEFAULT '',
  `city` varchar(256) NOT NULL DEFAULT '',
  `county` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table EventParticipants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `EventParticipants`;

CREATE TABLE `EventParticipants` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `participant` int(11) unsigned NOT NULL,
  `event_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `participantInEvent` (`participant`),
  KEY `participatesInEvent` (`event_id`),
  CONSTRAINT `participantInEvent` FOREIGN KEY (`participant`) REFERENCES `Members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `participatesInEvent` FOREIGN KEY (`event_id`) REFERENCES `Events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Events`;

CREATE TABLE `Events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '',
  `location` int(11) unsigned NOT NULL,
  `event_date` datetime NOT NULL,
  `publish_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eventAddress` (`location`),
  CONSTRAINT `eventAddress` FOREIGN KEY (`location`) REFERENCES `Address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Match
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Match`;

CREATE TABLE `Match` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tournament_id` int(11) unsigned NOT NULL,
  `participant1` int(11) unsigned NOT NULL,
  `participant2` int(11) unsigned NOT NULL,
  `winner` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `participant1` (`participant1`),
  KEY `participant2` (`participant2`),
  KEY `tournament` (`tournament_id`),
  KEY `wins` (`winner`),
  CONSTRAINT `participant1` FOREIGN KEY (`participant1`) REFERENCES `Members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `participant2` FOREIGN KEY (`participant2`) REFERENCES `Members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tournament` FOREIGN KEY (`tournament_id`) REFERENCES `Tournamnets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `wins` FOREIGN KEY (`winner`) REFERENCES `Members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Members`;

CREATE TABLE `Members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(256) NOT NULL DEFAULT '',
  `last_name` varchar(256) NOT NULL DEFAULT '',
  `gender` varchar(256) DEFAULT '',
  `DOB` date DEFAULT NULL,
  `address_id` int(11) unsigned DEFAULT NULL,
  `phone_number` varchar(256) DEFAULT NULL,
  `membership` varchar(256) NOT NULL DEFAULT '',
  `elo_rating` varchar(256) DEFAULT NULL,
  `email` varchar(256) NOT NULL DEFAULT '',
  `username` varchar(256) NOT NULL DEFAULT '',
  `pass` varchar(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `address` (`address_id`),
  CONSTRAINT `address` FOREIGN KEY (`address_id`) REFERENCES `Adress` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Members` WRITE;
/*!40000 ALTER TABLE `Members` DISABLE KEYS */;

INSERT INTO `Members` (`id`, `first_name`, `last_name`, `gender`, `DOB`, `address_id`, `phone_number`, `membership`, `elo_rating`, `email`, `username`, `pass`)
VALUES
	(1,'Ivan','Ivanov','male','0000-00-00',NULL,'07534691465','officer','12332','ivan.h.ivanov99@gmail.com','ivan.ivanov','test123');

/*!40000 ALTER TABLE `Members` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table News
# ------------------------------------------------------------

DROP TABLE IF EXISTS `News`;

CREATE TABLE `News` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) unsigned NOT NULL,
  `heading` varchar(256) NOT NULL DEFAULT '',
  `article` mediumtext NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author_id`),
  CONSTRAINT `author` FOREIGN KEY (`author_id`) REFERENCES `Members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table TournamentOrganisers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `TournamentOrganisers`;

CREATE TABLE `TournamentOrganisers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tournament_id` int(11) unsigned NOT NULL,
  `organiser` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `organiser` (`organiser`),
  KEY `organises` (`tournament_id`),
  CONSTRAINT `organiser` FOREIGN KEY (`organiser`) REFERENCES `Members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `organises` FOREIGN KEY (`tournament_id`) REFERENCES `Tournaments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table TournamentParticipants
# ------------------------------------------------------------

DROP TABLE IF EXISTS `TournamentParticipants`;

CREATE TABLE `TournamentParticipants` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tournament_id` int(11) unsigned NOT NULL,
  `participant` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `participant` (`participant`),
  KEY `participatesIn` (`tournament_id`),
  CONSTRAINT `participant` FOREIGN KEY (`participant`) REFERENCES `Members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `participatesIn` FOREIGN KEY (`tournament_id`) REFERENCES `Tournaments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Tournaments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Tournaments`;

CREATE TABLE `Tournaments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `main_organiser_id` int(11) unsigned NOT NULL,
  `location` varchar(256) NOT NULL DEFAULT '',
  `tournament_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `main_organiser` (`main_organiser_id`),
  CONSTRAINT `main_organiser` FOREIGN KEY (`main_organiser_id`) REFERENCES `Members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
