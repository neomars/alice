-- MariaDB dump 10.19  Distrib 10.6.16-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: whisper
-- ------------------------------------------------------
-- Server version	10.6.16-MariaDB-0ubuntu0.22.04.1

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
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `highlightwords`
--

DROP TABLE IF EXISTS `highlightwords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `highlightwords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valeur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `highlightwords`
--

LOCK TABLES `highlightwords` WRITE;
/*!40000 ALTER TABLE `highlightwords` DISABLE KEYS */;
INSERT INTO `highlightwords` VALUES (1,'False'),(2,'True');
/*!40000 ALTER TABLE `highlightwords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES (59,'en'),(60,'zh'),(61,'de'),(62,'es'),(63,'ru'),(64,'ko'),(65,'fr'),(66,'ja'),(67,'pt'),(68,'tr'),(69,'pl'),(70,'ca'),(71,'nl'),(72,'ar'),(73,'sv'),(74,'it'),(75,'id'),(76,'hi'),(77,'fi'),(78,'vi'),(79,'he'),(80,'uk'),(81,'el'),(82,'ms'),(83,'cs'),(84,'ro'),(85,'da'),(86,'hu'),(87,'ta'),(88,'no'),(89,'th'),(90,'ur'),(91,'hr'),(92,'bg'),(93,'lt'),(94,'la'),(95,'mi'),(96,'ml'),(97,'cy'),(98,'sk'),(99,'te'),(100,'fa'),(101,'lv'),(102,'bn'),(103,'sr'),(104,'az'),(105,'sl'),(106,'kn'),(107,'et'),(108,'mk'),(109,'br'),(110,'eu'),(111,'is'),(112,'hy'),(113,'ne'),(114,'mn'),(115,'bs'),(116,'kk'),(117,'sq'),(118,'sw'),(119,'gl'),(120,'mr'),(121,'pa'),(122,'si'),(123,'km'),(124,'sn'),(125,'yo'),(126,'so'),(127,'af'),(128,'oc'),(129,'ka'),(130,'be'),(131,'tg'),(132,'sd'),(133,'gu'),(134,'am'),(135,'yi'),(136,'lo'),(137,'uz'),(138,'fo'),(139,'ht'),(140,'ps'),(141,'tk'),(142,'nn'),(143,'mt'),(144,'sa'),(145,'lb'),(146,'my'),(147,'bo'),(148,'tl'),(149,'mg'),(150,'as'),(151,'tt'),(152,'haw'),(153,'ln'),(154,'ha'),(155,'ba'),(156,'jw'),(157,'su'),(158,'yue');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locuteur`
--

DROP TABLE IF EXISTS `locuteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locuteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locuteur`
--

LOCK TABLES `locuteur` WRITE;
/*!40000 ALTER TABLE `locuteur` DISABLE KEYS */;
INSERT INTO `locuteur` VALUES (1,'1'),(2,'2'),(3,'3'),(4,'4'),(5,'5'),(6,'6'),(7,'7'),(8,'8'),(9,'9'),(10,'10');
/*!40000 ALTER TABLE `locuteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `command` varchar(2000) NOT NULL,
  `size` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `executiontime` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model`
--

LOCK TABLES `model` WRITE;
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` VALUES (1,'tiny.en'),(2,'tiny'),(3,'base.en'),(4,'base'),(5,'small.en'),(6,'small'),(7,'medium.en'),(8,'medium'),(9,'large-v1'),(10,'large-v2'),(11,'large');
/*!40000 ALTER TABLE `model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outputformat`
--

DROP TABLE IF EXISTS `outputformat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outputformat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outputformat`
--

LOCK TABLES `outputformat` WRITE;
/*!40000 ALTER TABLE `outputformat` DISABLE KEYS */;
INSERT INTO `outputformat` VALUES (1,'txt'),(2,'vtt'),(3,'srt'),(4,'tsv'),(5,'json');
/*!40000 ALTER TABLE `outputformat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resume`
--

DROP TABLE IF EXISTS `resume`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prompt` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resume`
--

LOCK TABLES `resume` WRITE;
/*!40000 ALTER TABLE `resume` DISABLE KEYS */;
INSERT INTO `resume` VALUES (1,'Résume en 5 lignes le texte');
/*!40000 ALTER TABLE `resume` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` VALUES (3,'transcribe'),(4,'translate');
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D64935C246D5` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `whisper`
--

DROP TABLE IF EXISTS `whisper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `whisper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audio_name` varchar(255) NOT NULL,
  `audio_size` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `task_id` int(11) NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `locuteur_id` int(11) NOT NULL,
  `highlightwords_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4FDC41008DB60186` (`task_id`),
  KEY `IDX_4FDC410082F1BAF4` (`language_id`),
  KEY `IDX_4FDC41007975B7E7` (`model_id`),
  KEY `IDX_4FDC4100B9E1B920` (`locuteur_id`),
  KEY `IDX_4FDC4100F8001BDA` (`highlightwords_id`),
  CONSTRAINT `FK_4FDC41007975B7E7` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
  CONSTRAINT `FK_4FDC410082F1BAF4` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`),
  CONSTRAINT `FK_4FDC41008DB60186` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`),
  CONSTRAINT `FK_4FDC4100B9E1B920` FOREIGN KEY (`locuteur_id`) REFERENCES `locuteur` (`id`),
  CONSTRAINT `FK_4FDC4100F8001BDA` FOREIGN KEY (`highlightwords_id`) REFERENCES `highlightwords` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whisper`
--

LOCK TABLES `whisper` WRITE;
/*!40000 ALTER TABLE `whisper` DISABLE KEYS */;
/*!40000 ALTER TABLE `whisper` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-02 16:26:33
