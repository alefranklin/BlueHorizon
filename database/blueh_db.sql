-- MySQL dump 10.16  Distrib 10.1.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sitodb
-- ------------------------------------------------------
-- Server version	10.1.34-MariaDB-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cabin`
--

DROP TABLE IF EXISTS `cabin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cabin` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `seats` int(2) NOT NULL,
  `class` enum('Standard','Deluxe','SpaceClub') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `seats` (`seats`,`class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cabin`
--

LOCK TABLES `cabin` WRITE;
/*!40000 ALTER TABLE `cabin` DISABLE KEYS */;
/*!40000 ALTER TABLE `cabin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `path` varchar(30) NOT NULL,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`path`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_user` int(6) unsigned NOT NULL,
  `id_travel` int(6) unsigned NOT NULL,
  `id_rc` int(6) NOT NULL,
  `number_of_seat` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rc` (`id_rc`),
  KEY `id_travel` (`id_travel`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_rc`) REFERENCES `rocket_cabin` (`id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_travel`) REFERENCES `travels` (`id`),
  CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rocket_cabin`
--

DROP TABLE IF EXISTS `rocket_cabin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rocket_cabin` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_rocket` int(6) unsigned NOT NULL,
  `id_cabin` int(6) NOT NULL,
  `number_of_cabin` int(6) NOT NULL,
  `price` int(5) unsigned NOT NULL,
  `free` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_rocket` (`id_rocket`,`id_cabin`),
  KEY `id_cabin` (`id_cabin`),
  CONSTRAINT `rocket_cabin_ibfk_1` FOREIGN KEY (`id_rocket`) REFERENCES `rockets` (`id`),
  CONSTRAINT `rocket_cabin_ibfk_2` FOREIGN KEY (`id_cabin`) REFERENCES `cabin` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rocket_cabin`
--

LOCK TABLES `rocket_cabin` WRITE;
/*!40000 ALTER TABLE `rocket_cabin` DISABLE KEYS */;
/*!40000 ALTER TABLE `rocket_cabin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rocket_travel`
--

DROP TABLE IF EXISTS `rocket_travel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rocket_travel` (
  `id_travel` int(6) unsigned NOT NULL,
  `id_rocket` int(6) unsigned NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_travel`,`id_rocket`,`date`),
  KEY `id_rocket` (`id_rocket`),
  CONSTRAINT `rocket_travel_ibfk_1` FOREIGN KEY (`id_travel`) REFERENCES `travels` (`id`),
  CONSTRAINT `rocket_travel_ibfk_2` FOREIGN KEY (`id_rocket`) REFERENCES `rockets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rocket_travel`
--

LOCK TABLES `rocket_travel` WRITE;
/*!40000 ALTER TABLE `rocket_travel` DISABLE KEYS */;
INSERT INTO `rocket_travel` VALUES (1,1,'1975-01-21'),(2,2,'1977-08-16'),(3,3,'1978-08-09'),(4,1,'1983-06-07'),(5,2,'1984-04-27'),(6,3,'1990-03-18'),(7,1,'1994-04-14'),(8,2,'2004-01-27'),(9,3,'2004-12-31'),(10,1,'2008-12-05');
/*!40000 ALTER TABLE `rocket_travel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rockets`
--

DROP TABLE IF EXISTS `rockets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rockets` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(20) NOT NULL,
  `weight` int(6) unsigned NOT NULL,
  `height` int(6) unsigned NOT NULL,
  `nationality` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rockets`
--

LOCK TABLES `rockets` WRITE;
/*!40000 ALTER TABLE `rockets` DISABLE KEYS */;
/*!40000 ALTER TABLE `rockets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `travels`
--

DROP TABLE IF EXISTS `travels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `travels` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `departure` varchar(30) NOT NULL,
  `arrival` varchar(30) NOT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `travels`
--

LOCK TABLES `travels` WRITE;
/*!40000 ALTER TABLE `travels` DISABLE KEYS */;
INSERT INTO `travels` VALUES (1,' Pluto',' Mars','1983-06-07',''),(2,'Cape Canaveral',' Moon','2004-12-31',''),(3,'Cape Canaveral',' Pluto','1994-04-14',''),(4,' Mars',' Mars','2004-01-27',''),(5,'Cape Canaveral',' Pluto','1975-01-21',''),(6,' Pluto',' Mars','1978-08-09',''),(7,' Moon',' Moon','1977-08-16',''),(8,'Cape Canaveral',' Mars','1990-03-18',''),(9,' Moon',' Mars','1984-04-27',''),(10,'Cape Canaveral',' Pluto','2008-12-05','');
/*!40000 ALTER TABLE `travels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `sex` enum('M','F','N.D.') NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` char(64) NOT NULL,
  `username` varchar(20) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`email`,`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin','N.D.','admin@bluehorizon.com','879f17afda4a4620870ddd4cb9d665255b46054e4a4297f577d193da17cb7520','admin',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-03 17:52:49
