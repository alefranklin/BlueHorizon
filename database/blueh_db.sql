-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sitodb
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB-0+deb9u1

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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_user` int(6) NOT NULL,
  `id_travel` int(6) NOT NULL,
  `id_rc` int(6) NOT NULL,
  `number_of_seats` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_id_user` (`id_user`),
  KEY `fk_orders_id_travel` (`id_travel`),
  KEY `fk_orders_id_rc` (`id_rc`),
  CONSTRAINT `fk_orders_id_rc` FOREIGN KEY (`id_rc`) REFERENCES `rocket_cabin` (`id`),
  CONSTRAINT `fk_orders_id_travel` FOREIGN KEY (`id_travel`) REFERENCES `travels` (`id`),
  CONSTRAINT `fk_orders_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
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
  `id` int(6) NOT NULL,
  `id_rocket` int(6) NOT NULL,
  `id_cabin` int(6) NOT NULL,
  `number_of_cabin` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_rocket` (`id_rocket`,`id_cabin`),
  KEY `fk_rocket_cabin_id_cabin` (`id_cabin`),
  CONSTRAINT `fk_rocket_cabin_id_cabin` FOREIGN KEY (`id_cabin`) REFERENCES `cabin` (`id`),
  CONSTRAINT `fk_rocket_cabin_id_rocket` FOREIGN KEY (`id_rocket`) REFERENCES `rockets` (`id`)
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
  `id_travel` int(6) NOT NULL,
  `id_rocket` int(6) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_travel`,`id_rocket`,`date`),
  KEY `fk_rocket_travel_id_rocket` (`id_rocket`),
  CONSTRAINT `fk_rocket_travel_id_rocket` FOREIGN KEY (`id_rocket`) REFERENCES `rockets` (`id`),
  CONSTRAINT `fk_rocket_travel_id_travel` FOREIGN KEY (`id_travel`) REFERENCES `travels` (`id`)
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
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `model` varchar(20) NOT NULL,
  `price` bigint(12) DEFAULT NULL,
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
  `id` int(6) NOT NULL AUTO_INCREMENT,
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
  `id` int(6) NOT NULL AUTO_INCREMENT,
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

-- Dump completed on 2018-11-21 19:47:37
