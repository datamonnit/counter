CREATE DATABASE `countdown_db` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `countdown_db`;

CREATE TABLE `counters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `count_to` datetime NOT NULL,
  `topic` varchar(45) NOT NULL,
  `finished_line` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
SELECT * FROM countdown_db.counters;