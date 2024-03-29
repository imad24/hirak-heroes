-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2019 at 05:27 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hirak`
--
CREATE DATABASE IF NOT EXISTS `hirak` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hirak`;

-- --------------------------------------------------------

--
-- Table structure for table `heroes`
--



CREATE TABLE IF NOT EXISTS `heroes` (
  `special` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `occupation` varchar(255) NOT NULL DEFAULT 'ACTIVISTE',
  `arrested_date` date DEFAULT NULL,
  `released_date` date DEFAULT NULL,
  `released` tinyint(4) NOT NULL DEFAULT '0',
  `sentence` varchar(255) DEFAULT NULL,
  `wilaya` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `court` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;
COMMIT;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS new_heroes (
  special int(11) NOT NULL DEFAULT '0',
  name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  birthdate date DEFAULT NULL,
  occupation varchar(255) DEFAULT 'ACTIVISTE',
  arrested_date date DEFAULT NULL,
  released_date date DEFAULT NULL,
  released tinyint(4) NOT NULL DEFAULT '0',
  sentence varchar(255) DEFAULT NULL,
  wilaya varchar(255) DEFAULT NULL,
  reason varchar(255) DEFAULT NULL,
  court varchar(255) DEFAULT NULL,
  id int(11) NOT NULL AUTO_INCREMENT,
  comment text,
  validated tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;



DELIMITER $$
CREATE TRIGGER validate_new_hero
AFTER UPDATE
ON new_heroes FOR EACH ROW
BEGIN
    IF OLD.validated=0 AND new.validated=1 THEN
        INSERT INTO heroes(name,last_name,birthdate,occupation,arrested_date,released_date,released,sentence,wilaya,reason,court,comment)
        VALUES(old.name,old.last_name,old.birthdate,old.occupation,old.arrested_date,old.released_date,old.released,old.sentence,old.wilaya,old.reason,old.court,old.comment);
    END IF;
END$$
DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
