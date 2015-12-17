-- MySQL dump 10.13  Distrib 5.6.22, for Win32 (x86)
--
-- Host: localhost    Database: lesson
-- ------------------------------------------------------
-- Server version	5.6.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `lesson`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `lesson` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `lesson`;

--
-- Table structure for table `dep`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dep`
--

LOCK TABLES `dep` WRITE;
/*!40000 ALTER TABLE `dep` DISABLE KEYS */;
/*!40000 ALTER TABLE `dep` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perk`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perk`
--

LOCK TABLES `perk` WRITE;
/*!40000 ALTER TABLE `perk` DISABLE KEYS */;
/*!40000 ALTER TABLE `perk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `dep_id` int(11) NOT NULL,
  `img` tinytext,
  PRIMARY KEY (`id`),
  KEY `fk_worker_dep1_idx` (`dep_id`),
  CONSTRAINT `fk_worker_dep1` FOREIGN KEY (`dep_id`) REFERENCES `dep` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker`
--

LOCK TABLES `worker` WRITE;
/*!40000 ALTER TABLE `worker` DISABLE KEYS */;
/*!40000 ALTER TABLE `worker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker_has_perk`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worker_has_perk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` int(11) NOT NULL,
  `perk_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `worker_has_perk_idx1` (`worker_id`,`perk_id`),
  KEY `fk_worker_has_perk_perk1_idx` (`perk_id`),
  KEY `fk_worker_has_perk_worker1_idx` (`worker_id`),
  CONSTRAINT `fk_worker_has_perk_perk1` FOREIGN KEY (`perk_id`) REFERENCES `perk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_worker_has_perk_worker1` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker_has_perk`
--

LOCK TABLES `worker_has_perk` WRITE;
/*!40000 ALTER TABLE `worker_has_perk` DISABLE KEYS */;
/*!40000 ALTER TABLE `worker_has_perk` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-17  7:43:26
