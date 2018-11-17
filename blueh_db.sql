-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sitodb
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

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
  `price` bigint(12) unsigned DEFAULT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `travels`
--

LOCK TABLES `travels` WRITE;
/*!40000 ALTER TABLE `travels` DISABLE KEYS */;
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
  `password` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2018-11-17 19:56:29
