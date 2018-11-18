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
  `price` bigint(12) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rockets`
--

LOCK TABLES `rockets` WRITE;
/*!40000 ALTER TABLE `rockets` DISABLE KEYS */;
INSERT INTO `rockets` VALUES (1,' Space Shuttle',780009176),(2,' Falcon Heavy',696735153),(3,'Falcon 9',410476496);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `travels`
--

LOCK TABLES `travels` WRITE;
/*!40000 ALTER TABLE `travels` DISABLE KEYS */;
INSERT INTO `travels` VALUES (1,' Pluto',' Mars','1983-06-07'),(2,'Cape Canaveral',' Moon','2004-12-31'),(3,'Cape Canaveral',' Pluto','1994-04-14'),(4,' Mars',' Mars','2004-01-27'),(5,'Cape Canaveral',' Pluto','1975-01-21'),(6,' Pluto',' Mars','1978-08-09'),(7,' Moon',' Moon','1977-08-16'),(8,'Cape Canaveral',' Mars','1990-03-18'),(9,' Moon',' Mars','1984-04-27'),(10,'Cape Canaveral',' Pluto','2008-12-05');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Zelma','Treutel','N.D.','conrad92@example.org','3e44fe44'),(2,'Jodie','Gleichner','M','amira12@example.com','c611cc0c'),(3,'Margarette','Quigley','F','dking@example.org','6450f4ed'),(4,'Twila','Hodkiewicz','N.D.','ekeeling@example.org','dd54d377'),(5,'Sonny','Gutkowski','N.D.','dicki.natasha@example.org','9a072b5d'),(6,'Dennis','Casper','F','anabelle.reichert@example.net','04b67e1b'),(7,'Guadalupe','Botsford','N.D.','adele.smitham@example.org','5b446224'),(8,'Eduardo','Altenwerth','M','freddie34@example.com','3254bd29'),(9,'Ralph','Mueller','N.D.','taryn87@example.net','20d05139'),(10,'Idella','Orn','F','ldare@example.org','11f42e4b');
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

-- Dump completed on 2018-11-18  1:49:48
