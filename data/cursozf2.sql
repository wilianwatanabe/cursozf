# MySQL-Front 5.1  (Build 4.2)

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;


# Host: localhost    Database: cursozf2
# ------------------------------------------------------
# Server version 5.6.17

CREATE DATABASE `cursozf2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cursozf2`;

#
# Source for table category
#

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Dumping data for table category
#

INSERT INTO `category` VALUES (3,'eletroni');
INSERT INTO `category` VALUES (4,'teste');

#
# Source for table post
#

CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(80) NOT NULL DEFAULT '',
  `descricao` varchar(150) DEFAULT NULL,
  `texto` longtext,
  `cadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `alterado` datetime DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table post
#


#
#  Foreign keys for table post
#

ALTER TABLE `post`
ADD CONSTRAINT `fk_category` FOREIGN KEY (`category`) REFERENCES `category` (`id`);


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
