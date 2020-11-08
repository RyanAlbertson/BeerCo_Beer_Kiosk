CREATE DATABASE IF NOT EXISTS beerco_db;

CREATE TABLE `beerco_db`.`members` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) AUTO_INCREMENT = 1;

